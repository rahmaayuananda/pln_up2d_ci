<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportJob_model extends CI_Model {
    private $jobs_table = 'import_jobs';
    private $errors_table = 'import_job_errors';
    private $staging_gi = 'gi_import_raw';

    public function __construct()
    {
        parent::__construct();
    }

    public function create_job($data)
    {
        $data['started_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->jobs_table, $data);
        return (int)$this->db->insert_id();
    }

    public function get_job($id)
    {
        return $this->db->get_where($this->jobs_table, ['id' => (int)$id])->row();
    }

    public function finish_job($id, $updates)
    {
        $updates['finished_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', (int)$id)->update($this->jobs_table, $updates);
    }

    public function ensure_schema()
    {
        // Create jobs and errors table if not exists (simple portable SQL)
        $this->db->query("CREATE TABLE IF NOT EXISTS `{$this->jobs_table}` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT NULL,
            `target_table` VARCHAR(64) NOT NULL,
            `staging_table` VARCHAR(64) NULL,
            `original_filename` VARCHAR(255) NOT NULL,
            `stored_path` VARCHAR(255) NOT NULL,
            `file_size` INT NULL,
            `chunk_size` INT NULL,
            `duplicate_policy` VARCHAR(16) DEFAULT 'ask',
            `chosen_unique_key` VARCHAR(255) NULL,
            `total_rows` INT DEFAULT 0,
            `inserted` INT DEFAULT 0,
            `updated` INT DEFAULT 0,
            `skipped` INT DEFAULT 0,
            `failed` INT DEFAULT 0,
            `status` VARCHAR(32) DEFAULT 'preview',
            `started_at` DATETIME NULL,
            `finished_at` DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

        $this->db->query("CREATE TABLE IF NOT EXISTS `{$this->errors_table}` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `job_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            `column_name` VARCHAR(128) NULL,
            `col_value` TEXT NULL,
            `error_code` VARCHAR(64) NULL,
            `error_message` TEXT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `job_id_idx` (`job_id`),
            CONSTRAINT `fk_job_err` FOREIGN KEY (`job_id`) REFERENCES `{$this->jobs_table}`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function ensure_staging_for_gi()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `{$this->staging_gi}` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            `UP3_2D` VARCHAR(512) NULL,
            `UNITNAME_UP3` VARCHAR(512) NULL,
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `ASSETCLASSHI` VARCHAR(512) NULL,
            `SADDRESSCODE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `PENYULANG` VARCHAR(512) NULL,
            `PARENT` VARCHAR(512) NULL,
            `PARENT_DESCRIPTION` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `ACTUALOPRDATE` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `FORMATTEDADDRESS` VARCHAR(512) NULL,
            `STREETADDRESS` VARCHAR(512) NULL,
            `CITY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function ensure_staging_for_gh()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `gh_import_raw` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            `UP3_2D` VARCHAR(512) NULL,
            `UNITNAME_UP3` VARCHAR(512) NULL,
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `ASSETCLASSHI` VARCHAR(512) NULL,
            `SADDRESSCODE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `PENYULANG` VARCHAR(512) NULL,
            `PARENT` VARCHAR(512) NULL,
            `PARENT_DESCRIPTION` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `ACTUALOPRDATE` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `FORMATTEDADDRESS` VARCHAR(512) NULL,
            `STREETADDRESS` VARCHAR(512) NULL,
            `CITY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            `EXTERNALREFID` VARCHAR(512) NULL,
            `JENIS_PELAYANAN` VARCHAR(512) NULL,
            `NO_SLO` VARCHAR(512) NULL,
            `OWNERSYSID` VARCHAR(512) NULL,
            `SLOACTIVEDATE` VARCHAR(512) NULL,
            `STATUS_RC` VARCHAR(512) NULL,
            `TYPE_GARDU` VARCHAR(512) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function insert_staging_batch($entity, $rows)
    {
        if ($entity === 'gi') {
            return $this->db->insert_batch($this->staging_gi, $rows) !== false;
        } elseif ($entity === 'gh') {
            return $this->db->insert_batch('gh_import_raw', $rows) !== false;
        } elseif ($entity === 'gi_cell') {
            return $this->db->insert_batch('gi_cell_import_raw', $rows) !== false;
        } elseif ($entity === 'gh_cell') {
            return $this->db->insert_batch('gh_cell_import_raw', $rows) !== false;
        } elseif ($entity === 'kit_cell') {
            return $this->db->insert_batch('kit_cell_import_raw', $rows) !== false;
        } elseif ($entity === 'lbs_recloser') {
            return $this->db->insert_batch('lbs_recloser_import_raw', $rows) !== false;
        }
        return false;
    }

    /**
     * Commit rows from staging table into the target table.
     * Strategy: append-only (no upsert). Only columns that exist in both tables are copied.
     * Returns number of rows inserted, or -1 if target table is missing, or 0 if no matching columns.
     */
    public function commit_staging_to_target($job_id, $target_table)
    {
        $job_id = (int)$job_id;
        // Ensure target exists
        if (!$this->db->table_exists($target_table)) {
            return -1;
        }

        // Determine staging table based on target table
        $staging_table = '';
        if ($target_table === 'gi') {
            $staging_table = $this->staging_gi;
        } elseif ($target_table === 'gh') {
            $staging_table = 'gh_import_raw';
        } elseif ($target_table === 'gi_cell') {
            $staging_table = 'gi_cell_import_raw';
        } elseif ($target_table === 'gh_cell') {
            $staging_table = 'gh_cell_import_raw';
        } elseif ($target_table === 'kit_cell') {
            $staging_table = 'kit_cell_import_raw';
        } elseif ($target_table === 'lbs_recloser') {
            $staging_table = 'lbs_recloser_import_raw';
        } else {
            return 0; // No staging table for this entity
        }

        // Read PK info; require either no PK or single AUTO_INCREMENT PK for append-only import
        $dbName = $this->db->database;
        $pkQuery = $this->db->query(
            "SELECT k.COLUMN_NAME, c.EXTRA FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS t\n".
            "JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE k ON t.CONSTRAINT_NAME=k.CONSTRAINT_NAME AND t.TABLE_SCHEMA=k.TABLE_SCHEMA AND t.TABLE_NAME=k.TABLE_NAME\n".
            "JOIN INFORMATION_SCHEMA.COLUMNS c ON c.TABLE_SCHEMA=k.TABLE_SCHEMA AND c.TABLE_NAME=k.TABLE_NAME AND c.COLUMN_NAME=k.COLUMN_NAME\n".
            "WHERE t.TABLE_SCHEMA=? AND t.TABLE_NAME=? AND t.CONSTRAINT_TYPE='PRIMARY KEY'",
            [$dbName, $target_table]
        );
        $pkCols = $pkQuery->result_array();
        if (count($pkCols) === 1) {
            $pkExtra = strtolower((string)$pkCols[0]['EXTRA']);
            $isAI = (strpos($pkExtra, 'auto_increment') !== false);
            if (!$isAI) {
                // Signal: PK exists but not auto-increment; recommend fixing schema
                return -2; // special code
            }
        }

        // Determine column intersection between staging and target
        $target_fields = $this->db->list_fields($target_table);
        $staging_fields = $this->db->list_fields($staging_table);
        $cols = array_values(array_intersect($staging_fields, $target_fields));
        if (empty($cols)) {
            return 0;
        }

        // Fetch rows from staging for this job
        $query = $this->db->select($cols)->from($staging_table)->where('import_id', $job_id)->get();
        $rows = $query->result_array();
        if (empty($rows)) return 0;

        // Batch insert in chunks
        $batchSize = 500;
        $inserted = 0;
        for ($i = 0; $i < count($rows); $i += $batchSize) {
            $batch = array_slice($rows, $i, $batchSize);
            $this->db->insert_batch($target_table, $batch);
            // affected_rows for insert_batch returns number of affected rows (driver dependent)
            $aff = $this->db->affected_rows();
            if ($aff > 0) $inserted += $aff;
        }

        return $inserted;
    }

    /**
     * Ensure staging table for GI Cell (33 columns: 20 base + 1 common + 7 CT + 5 MVCell)
     */
    public function ensure_staging_for_gi_cell()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `gi_cell_import_raw` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            -- Base columns (20)
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `ASSETNUM` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `VENDOR` VARCHAR(512) NULL,
            `MANUFACTURER` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `PRIORITY` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `CXPENYULANG` VARCHAR(512) NULL,
            `NAMA_LOCATION` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            -- Common (1)
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            -- CT-specific (7)
            `BURDEN` VARCHAR(512) NULL,
            `FAKTOR_KALI` VARCHAR(512) NULL,
            `JENIS_CT` VARCHAR(512) NULL,
            `KELAS_CT` VARCHAR(512) NULL,
            `KELAS_PROTEKSI` VARCHAR(512) NULL,
            `PRIMER_SEKUNDER` VARCHAR(512) NULL,
            `TIPE_CT` VARCHAR(512) NULL,
            -- MVCell-specific (5)
            `OWNERSYSID` VARCHAR(512) NULL,
            `ISOLASI_KUBIKEL` VARCHAR(512) NULL,
            `JENIS_MVCELL` VARCHAR(512) NULL,
            `TH_BUAT` VARCHAR(512) NULL,
            `TYPE_MVCELL` VARCHAR(512) NULL,
            -- Discriminator (1)
            `CELL_TYPE` VARCHAR(50) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    /**
     * Ensure staging table for GH Cell (33 columns)
     */
    public function ensure_staging_for_gh_cell()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `gh_cell_import_raw` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            -- Base columns (20)
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `ASSETNUM` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `VENDOR` VARCHAR(512) NULL,
            `MANUFACTURER` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `PRIORITY` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `CXPENYULANG` VARCHAR(512) NULL,
            `NAMA_LOCATION` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            -- Common (1)
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            -- CT-specific (7)
            `BURDEN` VARCHAR(512) NULL,
            `FAKTOR_KALI` VARCHAR(512) NULL,
            `JENIS_CT` VARCHAR(512) NULL,
            `KELAS_CT` VARCHAR(512) NULL,
            `KELAS_PROTEKSI` VARCHAR(512) NULL,
            `PRIMER_SEKUNDER` VARCHAR(512) NULL,
            `TIPE_CT` VARCHAR(512) NULL,
            -- MVCell-specific (5)
            `OWNERSYSID` VARCHAR(512) NULL,
            `ISOLASI_KUBIKEL` VARCHAR(512) NULL,
            `JENIS_MVCELL` VARCHAR(512) NULL,
            `TH_BUAT` VARCHAR(512) NULL,
            `TYPE_MVCELL` VARCHAR(512) NULL,
            -- Discriminator (1)
            `CELL_TYPE` VARCHAR(50) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    /**
     * Ensure staging table for Kit Cell (33 columns)
     */
    public function ensure_staging_for_kit_cell()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `kit_cell_import_raw` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            -- Base columns (20)
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `ASSETNUM` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `VENDOR` VARCHAR(512) NULL,
            `MANUFACTURER` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `PRIORITY` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `CXPENYULANG` VARCHAR(512) NULL,
            `NAMA_LOCATION` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            -- Common (1)
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            -- CT-specific (7)
            `BURDEN` VARCHAR(512) NULL,
            `FAKTOR_KALI` VARCHAR(512) NULL,
            `JENIS_CT` VARCHAR(512) NULL,
            `KELAS_CT` VARCHAR(512) NULL,
            `KELAS_PROTEKSI` VARCHAR(512) NULL,
            `PRIMER_SEKUNDER` VARCHAR(512) NULL,
            `TIPE_CT` VARCHAR(512) NULL,
            -- MVCell-specific (5)
            `OWNERSYSID` VARCHAR(512) NULL,
            `ISOLASI_KUBIKEL` VARCHAR(512) NULL,
            `JENIS_MVCELL` VARCHAR(512) NULL,
            `TH_BUAT` VARCHAR(512) NULL,
            `TYPE_MVCELL` VARCHAR(512) NULL,
            -- Discriminator (1)
            `CELL_TYPE` VARCHAR(50) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function ensure_staging_for_lbs_recloser()
    {
        $this->ensure_schema();
        $this->db->query("CREATE TABLE IF NOT EXISTS `lbs_recloser_import_raw` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `import_id` INT NOT NULL,
            `row_no` INT NOT NULL,
            -- Base columns (20)
            `CXUNIT` VARCHAR(512) NULL,
            `UNITNAME` VARCHAR(512) NULL,
            `UP3_2D` VARCHAR(512) NULL,
            `ASSETNUM` VARCHAR(512) NULL,
            `SSOTNUMBER` VARCHAR(512) NULL,
            `LOCATION` VARCHAR(512) NULL,
            `DESCRIPTION` VARCHAR(512) NULL,
            `VENDOR` VARCHAR(512) NULL,
            `MANUFACTURER` VARCHAR(512) NULL,
            `INSTALLDATE` VARCHAR(512) NULL,
            `PRIORITY` VARCHAR(512) NULL,
            `STATUS` VARCHAR(512) NULL,
            `TUJDNUMBER` VARCHAR(512) NULL,
            `CHANGEBY` VARCHAR(512) NULL,
            `CHANGEDATE` VARCHAR(512) NULL,
            `CXCLASSIFICATIONDESC` VARCHAR(512) NULL,
            `NAMA_LOCATION` VARCHAR(512) NULL,
            `LONGITUDEX` VARCHAR(512) NULL,
            `LATITUDEY` VARCHAR(512) NULL,
            `ISASSET` VARCHAR(512) NULL,
            -- Common (2)
            `PEREDAM` VARCHAR(512) NULL,
            `STATUS_KEPEMILIKAN` VARCHAR(512) NULL,
            -- LBS-specific (3)
            `CXPENYULANG` VARCHAR(512) NULL,
            `TH_BUAT` VARCHAR(512) NULL,
            `TYPE_LBS` VARCHAR(512) NULL,
            -- RECLOSER-specific (2)
            `MODE_OPERASI` VARCHAR(512) NULL,
            `TYPE_RECLOSER` VARCHAR(512) NULL,
            -- SECTIO-specific (3)
            `MODE_OPR` VARCHAR(512) NULL,
            `TYPE_OPERASI` VARCHAR(512) NULL,
            `TYPE_SECTIONALIZER` VARCHAR(512) NULL,
            -- Discriminator (1)
            `PEMUTUS_TYPE` VARCHAR(50) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            KEY `import_id_idx` (`import_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }
}
