<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Model {

    /** 
     * Fungsi untuk insert data
     */

    public function insert_new_department($data)
    {
        $this->db->insert('MsDepartment', $data);
    }

    public function insert_new_jobposition($data)
    {
        $this->db->insert('MsJobPosition', $data);
    }

    public function insert_new_holiday($data)
    {
        $this->db->insert('MsHoliday', $data);
    }


    /** 
     * Fungsi untuk update data
     */

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

    public function update_holiday($id, $data)
    {
        $this->db->where('HolidayId', $id);
        $this->db->update('MsHoliday', $data);
    }


    /** 
     * Fungsi untuk select data
     */

    public function get_all_department()
    {
        return $this->db->get('MsDepartment')->result();
    }

    public function get_all_jobposition()
    {
        return $this->db->get('MsJobPosition')->result();
    }

    public function get_all_holiday()
    {
        return $this->db->get('MsHoliday')->result();
    }

}

/* End of file MasterData.php */
/* Location: ./application/models/MasterData.php */