<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkRule extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['page_title'] = "Work Rule";
            $data['page'] = 'workrule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['page_title'] = "Add Work Rule";
            $data['page'] = 'addworkrule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file WorkRule.php */
/* Location: ./application/controllers/WorkRule.php */