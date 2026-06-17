<?php
class Model_KategoriFAQ extends CI_Model
{
    var $table = 'tbl_kategori_faq';
    var $column_order = array(null, 'nama_kategori', 'keterangan', null);
    var $column_search = array('nama_kategori', 'keterangan');
    var $order = array(
        'nama_kategori' => 'ASC',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START DATATABLE

    private function _get_datatables_query()
    {
        $this->db->select('*')
            ->from('tbl_kategori_faq');
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

    function simpanKategoriFAQ($nama_kategori, $keterangan)
    {
        $query = $this->db->query("INSERT INTO tbl_kategori_faq (`nama_kategori`, `keterangan`)
            VALUES ('$nama_kategori', '$keterangan')");
        return $query;
    }

    function hapusKategoriFAQ($id_kategori)
    {
        $query = $this->db->query("DELETE FROM tbl_kategori_faq WHERE id_kategori = '$id_kategori'");
        return $query;
    }

    function ambilKategoriFAQ($id_kategori)
    {
        $query = $this->db->query("SELECT * FROM tbl_kategori_faq WHERE id_kategori = '$id_kategori'");
        return $query;
    }

    function ubahKategoriFAQ($id_kategori, $nama_kategori, $keterangan)
    {
        $query = $this->db->query("UPDATE tbl_kategori_faq SET nama_kategori = '$nama_kategori', keterangan = '$keterangan'
            WHERE id_kategori = '$id_kategori'");
        return $query;
    }
	
	function getAll()
    {
        $query = $this->db->query("SELECT * FROM tbl_kategori_faq ORDER BY nama_kategori");
        return $query;
    }
}
