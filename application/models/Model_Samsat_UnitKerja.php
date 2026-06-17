<?php
class Model_Samsat_UnitKerja extends CI_Model
{
    var $table = 'samsat_unit';
    var $column_order = array(null, 'unit', 'link_unit', 'deskripsi', null, null);
    var $column_search = array('unit', 'link_unit', 'deskripsi');
    var $order = array(
        'unit' => 'ASC',
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
        $this->db->select('*')
            ->from('samsat_unit')
            ->where('samsat_unit.kantor_id', $this->kantor_id);

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

    function getID($id)
    {
        $query = $this->db->query("SELECT * FROM samsat_unit 
            WHERE id = '$id'");
        return $query;
    }

    function getUnit($unit)
    {
        $query = $this->db->query("SELECT * FROM samsat_unit 
            WHERE unit = '$unit'");
        return $query;
    }

    function delete($id)
    {
        $query = $this->db->query("DELETE FROM samsat_unit WHERE id = '$id'");
        return $query;
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }
}
