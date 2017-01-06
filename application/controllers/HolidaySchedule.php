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
            $schedule_dtl = $this->holiday_schedule->get_holiday_schedule();
            $schedule_hdr = $this->holiday_schedule->get_holiday_hdr();

            $schedule_generate = array();
            $result_schedule = array();

            for ($i=0; $i<count($schedule_hdr); $i++) {
                $schedule_temp = array();
                $schedule_generate['id'] = $schedule_hdr[$i]->HolidayScheduleId;
                $schedule_generate['description'] = $schedule_hdr[$i]->Description;
                $schedule_generate['isactive'] = $schedule_hdr[$i]->IsActive;

                $result_detail = array();
                for($j=0; $j<count($schedule_dtl); $j++) {
                    if ( $schedule_hdr[$i]->HolidayScheduleId == $schedule_dtl[$j]->HolidayScheduleId ) {
                        $schedule_temp['name'] = $schedule_dtl[$j]->Description;
                        $schedule_temp['startdate'] = $schedule_dtl[$j]->StartDate;
                        $schedule_temp['enddate'] = $schedule_dtl[$j]->EndDate;
                        $schedule_temp['holidaytype'] = $schedule_dtl[$j]->HolidayType;
                        array_push($result_detail, $schedule_temp);
                    }
                }

                $schedule_generate['details'] = $result_detail;
                array_push($result_schedule, $schedule_generate);
            }

            $data['schedules'] = $result_schedule;
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

    public function deactivate()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null) {

            $data = array(
                'IsActive' => 'N',
                'UpdatedBy' => $this->session->userdata('user_session')['employeeid'],
                'UpdatedAt' => date(DATE_W3C, now('Asia/Jakarta'))
            );

            $this->db->trans_begin();
            $this->holiday_schedule->update_holiday_schedule($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/holidayschedule','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

    public function activate()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null) {

            $data = array(
                'IsActive' => 'Y',
                'UpdatedBy' => $this->session->userdata('user_session')['employeeid'],
                'UpdatedAt' => date(DATE_W3C, now('Asia/Jakarta'))
            );

            $this->db->trans_begin();
            $this->holiday_schedule->update_holiday_schedule($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/holidayschedule','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file HolidaySchedule.php */
/* Location: ./application/controllers/HolidaySchedule.php */