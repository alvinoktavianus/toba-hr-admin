<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonthlyReport extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['page_title'] = "Monthly Report";
            $data['page'] = 'monthlyreport';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file MonthlyReport.php */
/* Location: ./application/controllers/MonthlyReport.php */