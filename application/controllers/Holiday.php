<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            // $data['holidays'] = $this->masterdata->get_all_department();
            $data['page_title'] = "Holiday Master Data";
            $data['page'] = 'holiday';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file Holiday.php */
/* Location: ./application/controllers/Holiday.php */