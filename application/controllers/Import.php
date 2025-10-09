<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url','form','file']);
        $this->load->library(['session','upload']);
        $this->load->database();
        $this->load->model(['ImportJob_model']);
    }

    // Upload form
    public function index()
    {
        $data = [
            'title' => 'Import GI - Phase 1',
        ];
        $this->load->view('import/form', $data);
    }

    // Preview first 100 rows
    public function preview()
    {
        // Accept CSV or XLSX (for now CSV fallback; XLSX in next step)
        $config = [
            'upload_path'   => FCPATH . 'uploads/imports/',
            'allowed_types' => 'csv|xlsx',
            'max_size'      => 10240, // 10 MB
            'encrypt_name'  => TRUE,
        ];
        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            return redirect('import');
        }

        $fileData = $this->upload->data();
        $fullpath = $fileData['full_path'];

    // Ensure job schema exists then log job shell
    $this->ImportJob_model->ensure_schema();
        $job_id = $this->ImportJob_model->create_job([
            'target_table' => 'gi',
            'original_filename' => $fileData['client_name'],
            'stored_path' => 'uploads/imports/' . $fileData['file_name'],
            'file_size' => (int)$fileData['file_size'],
            'chunk_size' => 500,
            'duplicate_policy' => 'ask',
            'status' => 'preview',
        ]);

        // Read first 100 rows
        $rows = [];
        $headers = [];
        if (strtolower($fileData['file_ext']) === '.csv') {
            $fp = fopen($fullpath, 'r');
            if ($fp !== false) {
                // Try to detect separator ; or ,
                $firstLine = fgets($fp);
                $sep = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';' : ',';
                rewind($fp);
                $lineNo = 0;
                while (($data = fgetcsv($fp, 0, $sep)) !== false) {
                    if ($lineNo === 0) {
                        $headers = $data;
                    } else {
                        $rows[] = $data;
                        if (count($rows) >= 100) break;
                    }
                    $lineNo++;
                }
                fclose($fp);
            }
        } else {
            // XLSX support placeholder: will be added with PHPSpreadsheet
            $headers = ['INFO'];
            $rows = [['XLSX preview membutuhkan PHPSpreadsheet (akan diaktifkan di langkah berikutnya). Sementara, unggah CSV.']];
        }

        $data = [
            'title' => 'Preview Import GI',
            'job_id' => $job_id,
            'headers' => $headers,
            'rows' => $rows,
        ];
        $this->load->view('import/preview', $data);
    }

    // Process chunks into staging table
    public function process()
    {
        $job_id = (int)$this->input->post('job_id');
        $policy = $this->input->post('duplicate_policy'); // abort|skip|merge|replace (phase1 not used yet)
        $job = $this->ImportJob_model->get_job($job_id);
        if (!$job) return show_error('Job not found', 404);

        $stored_path = FCPATH . $job->stored_path;
        if (!is_file($stored_path)) return show_error('File not found', 404);

        // Ensure staging table exists
        $this->ImportJob_model->ensure_staging_for_gi();

        // Process CSV only for phase 1
        $inserted = 0; $failed = 0; $total = 0; $errors = [];
        $fp = fopen($stored_path, 'r');
        if ($fp === false) return show_error('Cannot open file', 500);
        $firstLine = fgets($fp);
        $sep = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';' : ',';
        $headers = str_getcsv(trim($firstLine), $sep);

        // Normalize headers
        $norm = function($s){ return strtolower(trim(preg_replace('/\s+/', ' ', $s))); };
        $headers = array_map($norm, $headers);

        // Map some expected aliases (simple for phase 1)
        $aliases = [
            'unit_layanan' => 'UNIT_LAYANAN',
            'gardu_induk'  => 'GARDU_INDUK',
            'longitudex'   => 'LONGITUDEX',
            'latitudey'    => 'LATITUDEY',
            'status_operasi' => 'STATUS_OPERASI',
            'ip_rtu' => 'IP_RTU',
            'ip_gateway' => 'IP_GATEWAY',
        ];

        $map = [];
        foreach ($headers as $i => $h) {
            $key = preg_replace('/[^a-z0-9_]/','', $h);
            if (isset($aliases[$key])) {
                $map[$i] = $aliases[$key];
            } else {
                $map[$i] = strtoupper($key);
            }
        }

        // Rewind and process
        rewind($fp);
        $lineNo = 0;
        $batch = [];
        $chunkSize = 500;
        while (($row = fgetcsv($fp, 0, $sep)) !== false) {
            $lineNo++;
            if ($lineNo === 1) continue; // header
            $total++;
            // Build assoc row
            $assoc = [];
            foreach ($row as $i => $val) {
                $col = isset($map[$i]) ? $map[$i] : ('COL'.$i);
                $assoc[$col] = is_string($val) ? trim($val) : $val;
            }
            $assoc['import_id'] = $job_id;
            $assoc['row_no'] = $lineNo - 1;
            $batch[] = $assoc;

            if (count($batch) >= $chunkSize) {
                $ok = $this->ImportJob_model->insert_staging_batch('gi', $batch);
                if (!$ok) { $failed += count($batch); } else { $inserted += count($batch); }
                $batch = [];
            }
        }
        if (count($batch) > 0) {
            $ok = $this->ImportJob_model->insert_staging_batch('gi', $batch);
            if (!$ok) { $failed += count($batch); } else { $inserted += count($batch); }
        }
        fclose($fp);

        $this->ImportJob_model->finish_job($job_id, [
            'total_rows' => $total,
            'inserted' => $inserted,
            'failed' => $failed,
            'status' => 'done'
        ]);

        $this->session->set_flashdata('success', 'Import selesai: total '.$total.', masuk '.$inserted.', gagal '.$failed);
        return redirect('import/status/'.$job_id);
    }

    public function status($job_id)
    {
        $job = $this->ImportJob_model->get_job((int)$job_id);
        if (!$job) return show_404();
        $data = [ 'title' => 'Status Import', 'job' => $job ];
        $this->load->view('import/status', $data);
    }

    public function download_error($job_id)
    {
        // Placeholder for Phase 2 (will generate XLSX error report)
        show_404();
    }

    // Move rows from staging table into the final target table (append-only)
    public function commit($job_id)
    {
        $job = $this->ImportJob_model->get_job((int)$job_id);
        if (!$job) return show_404();

        // Append-only to target table
        $inserted = $this->ImportJob_model->commit_staging_to_target($job->id, $job->target_table);
        if ($inserted === -1) {
            $this->session->set_flashdata('error', 'Tabel target tidak ditemukan: '.$job->target_table);
        } elseif ($inserted === -2) {
            $this->session->set_flashdata('error', 'Skema tabel target memiliki PRIMARY KEY yang bukan AUTO_INCREMENT. Ubah kolom PK menjadi AUTO_INCREMENT atau hapus PK sebelum commit (append-only).');
        } else {
            // Update job summary (we don't track updates/skips in phase 1)
            $this->ImportJob_model->finish_job($job->id, [
                'updated' => 0,
                'skipped' => 0,
                'status' => 'committed'
            ]);
            $this->session->set_flashdata('success', 'Berhasil commit ke tabel '.$job->target_table.': '.$inserted.' baris ditambahkan.');
        }
        return redirect('import/status/'.$job->id);
    }
}
