<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

    public function get_users_by_email($email)
    {
        $this->db->where('Email', $email);
        return $this->db->get('MsEmployee')->result();
    }

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */