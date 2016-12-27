<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageEmployee extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['page_title'] = "Manage Employee";
            $data['page'] = 'manageemployee';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file ManageEmployee.php */
/* Location: ./application/controllers/ManageEmployee.php */