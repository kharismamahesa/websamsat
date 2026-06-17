<?php
class Model_Survei extends CI_Model
{
    function getAllSurvei()
    {
        $result = $this->db->query("SELECT * FROM tbl_survei_skm 
            WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> ''
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
            AND kantor_pelayanan <> ''
            ORDER BY `created_date`");
        return $result;
    }

    function getSurveiByFil($fil)
    {
        $result = $this->db->query("SELECT * FROM tbl_survei_skm 
            WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> ''
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
            AND kantor_pelayanan <> ''
            $fil 
            ORDER BY `created_date`");
        return $result;
    }

    function getRespondenbyBobot($u_nya, $bobot, $fil, $fil2)
    {
        $result = $this->db->query("SELECT COUNT($u_nya) AS jumlah FROM tbl_survei_skm 
            WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
            AND kantor_pelayanan <> ''
            AND $u_nya = '$bobot'
            $fil $fil2");
        return $result;
    }

    function getDSKelamin($fil)
    {
        $result = $this->db->query("SELECT COUNT(id_survei) AS jumlah, jenis_kelamin 
            FROM tbl_survei_skm
			WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
			AND kantor_pelayanan <> ''
            $fil
            GROUP BY jenis_kelamin
            ORDER BY jenis_kelamin = 'L' ASC,
                jenis_kelamin = 'P' ASC");
        return $result;
    }

    function getDSPendidikan($fil)
    {
        $result = $this->db->query("SELECT COUNT(id_survei) AS jumlah, pendidikan 
            FROM tbl_survei_skm 
            -- WHERE (pendidikan != '' || pendidikan != NULL) 
    		WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
    		AND kantor_pelayanan <> ''
            $fil
            GROUP BY pendidikan
            ORDER BY pendidikan = 'SD' ASC,
                pendidikan = 'SLTP/SMP' ASC,
                pendidikan = 'SLTA/SMA' ASC,
                pendidikan = 'D1/D2/D3' ASC,
                pendidikan = 'S1' ASC,
                pendidikan = 'S2/S3' ASC");
        return $result;
    }

    function getDSPekerjaan($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, pekerjaan 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        $fil
        GROUP BY pekerjaan
        ORDER BY pekerjaan = 'LAINNYA' ASC,
            pekerjaan = 'MAHASISWA' ASC,
            pekerjaan = 'PEGAWAI SWASTA' ASC,
            pekerjaan = 'PNS/TNI/POLRI' ASC,
            pekerjaan = 'SWASTA' ASC,
            pekerjaan = 'WIRASWASTA' ASC"
        );
        return $result;
    }

    function getDSUmur1SD25($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, '1-25' AS usia 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        AND usia <= 25
        $fil"
        );
        return $result;
    }

    function getDSUmur26SD35($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, '26-35' AS usia 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        AND usia >= 26 and usia <= 35
        $fil"
        );
        return $result;
    }

    function getDSUmur36SD45($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, '36-45' AS usia 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        AND usia >= 36 and usia <= 45
        $fil"
        );
        return $result;
    }

    function getDSUmur46SD55($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, '46-55' AS usia 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        AND usia >= 46 and usia <= 55
        $fil"
        );
        return $result;
    }

    function getDSUmur56Atas($fil)
    {
        $result = $this->db->query(
            "SELECT COUNT(id_survei) AS jumlah, '56 >' AS usia 
        FROM tbl_survei_skm 
        -- WHERE (pendidikan != '' || pendidikan != NULL) 
        WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan <> ''
        AND usia >= 56
        $fil"
        );
        return $result;
    }

    // function getSurveiByUPTUP($kantor_pelayanan)
    // {
    //     $result = $this->db->query("SELECT COUNT(id_survei) as jumlahresponden
    //         FROM tbl_survei_skm 
    //         WHERE kantor_pelayanan = '$kantor_pelayanan'
    //         AND tanya1 <> ''
    //         AND tanya2 <> ''
    //         AND tanya3 <> ''
    //         AND tanya4 <> ''
    //         AND tanya5 <> ''
    //         AND tanya6 <> ''
    //         AND tanya7 <> ''
    //         AND tanya8 <> ''
    //         AND tanya9 <> ''
    //         AND tanya21 <> ''
    //         AND tanya22 <> ''
    //         AND tanya23 <> ''
    //         AND tanya24 <> ''
    //         AND tanya25 <> ''");
    //     return $result;
    // }
}
