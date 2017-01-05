<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HolidaySchedule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('holiday_schedule');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['page_title'] = "Holiday Schedule";
            $data['page'] = 'holidayschedule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['options'] = $this->holiday_schedule->get_all_holiday_dropdown();
            $data['page_title'] = "Add Holiday Schedule";
            $data['page'] = 'addholidayschedule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        $name = $this->input->post('holidayschedulename');
        if ( $this->session->has_userdata('user_session') && 
             $name != null && count($this->input->post('schedule')) > 0 ) {

            $header = array(
                'Description' => $name,
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->holiday_schedule->insert_new_header($header);
            $current = $this->holiday_schedule->get_header_id();

            $details = $this->input->post('schedule');
            foreach ($details as $detail) {
                $details = array();
                $details = array(
                    'HolidayScheduleId' => $current->HolidayScheduleId,
                    'HolidayId' => (int)$detail,
                    'CreatedBy' => (int)$this->session->userdata('user_session')['employeeid']
                );
                $this->holiday_schedule->insert_detail($details);
            }

            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new holiday schedule');
            redirect('/holidayschedule','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file HolidaySchedule.php */
/* Location: ./application/controllers/HolidaySchedule.php */