<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Model {

    public function get_all_department()
    {
        return $this->db->get('MsDepartment')->result();
    }

    public function insert_new_department($data)
    {
        $this->db->insert('MsDepartment', $data);
    }

}

/* End of file MasterData.php */
/* Location: ./application/models/MasterData.php */