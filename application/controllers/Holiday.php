<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('masterdata');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['holidays'] = $this->masterdata->get_all_holiday();
            $data['page_title'] = "Holiday Master Data";
            $data['page'] = 'holiday';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        $holidayname = $this->input->post('holidayname');
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $holidaytype = $this->input->post('holidaytype');

        if ( $this->session->has_userdata('user_session') &&
             $holidayname != null &&
             $startdate != null &&
             $enddate != null &&
             $holidaytype != null ) {

            $data = array(
                'Description' => $holidayname,
                'StartDate' => $startdate,
                'EndDate' => $enddate,
                'HolidayType' => $holidaytype,
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->masterdata->insert_new_holiday($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new holiday');
            redirect('/holiday','refresh');

        } else {
            $this->load->model('errors/index.html');
        }
    }

    public function deactivate()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null ) {
            $data = array(
                'IsActive' => 'N',
                'UpdatedBy' => $this->session->userdata('user_session')['employeeid'],
                'UpdatedAt' => date(DATE_W3C, now('Asia/Jakarta'))
            );

            $this->db->trans_begin();
            $this->masterdata->update_holiday($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/holiday','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

    public function activate()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null ) {
            $data = array(
                'IsActive' => 'Y',
                'UpdatedBy' => $this->session->userdata('user_session')['employeeid'],
                'UpdatedAt' => date(DATE_W3C, now('Asia/Jakarta'))
            );

            $this->db->trans_begin();
            $this->masterdata->update_holiday($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/holiday','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file Holiday.php */
/* Location: ./application/controllers/Holiday.php */