<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Model {

    public function get_all_department()
    {
        return $this->db->get('MsDepartment')->result();
    }

    public function insert_new_department($data)
    {
        $this->db->where('IsActive', 'Y');
        $this->db->insert('MsDepartment', $data);
    }

    public function get_all_jobposition()
    {
        return $this->db->get('MsJobPosition')->result();
    }

    public function insert_new_jobposition($data)
    {
        $this->db->where('IsActive', 'Y');
        $this->db->insert('MsJobPosition', $data);
    }

    public function update_department($id, $data)
    {
        $this->db->where('DepartmentID', $id);
        $this->db->update('MsDepartment', $data);
    }

    public function update_jobposition($id, $data)
    {
        $this->db->where('JobPositionID', $id);
        $this->db->update('MsJobPosition', $data);
    }

}

/* End of file MasterData.php */
/* Location: ./application/models/MasterData.php */