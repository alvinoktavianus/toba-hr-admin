<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Model {

    public function get_employee_by_email($email)
    {
        $this->db->where('Email', $email);
        return $this->db->get('MsEmployee')->result();
    }

    public function insert_new_employee($data)
    {
        $this->db->insert('MsEmployee', $data);
    }

    public function get_all_employee()
    {
        return $this->db->get('MsEmployee')->result();
    }

}

/* End of file Employee.php */
/* Location: ./application/models/Employee.php */