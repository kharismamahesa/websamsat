<?php
class Model_Samsat_Galeri extends CI_Model
{
    var $table = 'samsat_galeri';
    var $column_order = array(null, 'keterangan', null, null);
    var $column_search = array('keterangan');
    var $order = array(
        // 'kategori_unit' => 'ASC',
        // 'jenis_pajak' => 'ASC',
        'created_datetime' => 'DESC',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $id_user = $this->session->userdata['websamsat_id'];
        $getuserbyid = $this->model_samsat_user->getUserbyKode($id_user);
        if ($getuserbyid->num_rows() > 0) {
            $this->id = $getuserbyid->row()->id;
            $this->level = $getuserbyid->row()->level;
            $this->is_active = $getuserbyid->row()->is_active;
            $this->kantor_id = $getuserbyid->row()->id_uptup;
        } else {
            redirect(base_url("login"));
        }
    }

    // START DATATABLE

    private function _get_datatables_query()
    {
        // if ($this->level == 1) {
        //     $this->db->select('samsat_berita.id, samsat_berita.judul, samsat_berita.link, samsat_berita.berita, samsat_berita.cover, samsat_berita.author,
        // 			samsat_berita.created_date, samsat_berita.created_id, samsat_auth.nama, samsat_berita.kantor_id, samsat_berita.status')
        //         ->from('samsat_berita')
        //         ->join('samsat_auth', 'samsat_berita.created_id = samsat_auth.id', 'inner')
        //         ->where('samsat_berita.status', 1);
        // } else {
        $this->db->select('*')
            ->from('samsat_galeri')
            ->where('samsat_galeri.kantor_id', $this->kantor_id);
        // }


        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // END DATATABLE
    function save($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }

    // function ambilRealtime1($tanggal, $kategori_unit, $kantor_id)
    // {
    //     $query = $this->db->query("SELECT * FROM samsat_realtime 
    //         WHERE date(tanggal) = '$tanggal'
    //         AND kategori_unit = '$kategori_unit'
    //         AND kantor_id = '$kantor_id'");
    //     return $query;
    // }

    function get($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("tblwartawan");
    }

    // function hapusRealtime($id)
    // {
    //     $query = $this->db->query("DELETE FROM samsat_realtime WHERE id = '$id'");
    //     return $query;
    // }

    // function ubahRealtime($id, $data)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update($this->table, $data);
    //     return true;
    // }
}
