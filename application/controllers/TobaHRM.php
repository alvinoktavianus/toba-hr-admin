<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TobaHRM extends CI_Controller {

    public function index()
    {
        if ( !$this->session->has_userdata('user_session') ) {
            // load user_model untuk tarik data
            $data['page_title'] = "Toba HRM Admin";
            $this->load->view('include/login', $data);
        } else {
            $data['page_title'] = "Home | Toba HRM";
            $data['page'] = 'home';
            $this->load->view('include/mainloggedin', $data);
        }        
    }

}

/* End of file TobaHRM.php */
/* Location: ./application/controllers/TobaHRM.php */