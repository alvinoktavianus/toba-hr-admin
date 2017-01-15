<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('schedule_data');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {


            // $data['results'] = $result;
            $data['page_title'] = "Schedule";
            $data['page'] = 'schedule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['workdays'] = $this->schedule_data->get_workday_dropdown();
            $data['shifts'] = $this->schedule_data->get_shift_dropdown();
            $data['page_title'] = "Add Schedule";
            $data['page'] = 'addschedule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->post('description') != null ) {

            var_dump($this->input->post('offshift'));

            $header = array(
                'Description' => $this->input->post('description'),
                'DayInSchedule' => $this->input->post('daysinschedule'),
            );

            $this->db->trans_begin();

            if ( $this->input->post('norotation') == 'Y' ) {

                    $header['IsRotatingSchedule'] = 'N';
                    $this->schedule_data->insert_new_schedule($header);

            } else {

                    $header['IsRotatingSchedule'] = 'Y';

                    $this->schedule_data->insert_new_schedule($header);
                    $id = $this->schedule_data->get_schedule_hdr_id();

                    $rotationname = $this->input->post('rotationname');
                    $relativeday = $this->input->post('relativeday');

                    for ($i=0; $i < count($rotationname); $i++) { 
                        $data = array();
                        $data = array(
                            'ScheduleId' => $id,
                            'Description' => $rotationname[$i],
                            'RelativeDay' => $relativeday[$i],
                            'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
                        );
                        $this->schedule_data->insert_detail_rotation($data);
                    }


            }

            $id = $this->schedule_data->get_schedule_hdr_id();
            $workday = $this->input->post('workday');
            $shift = $this->input->post('shift');
            $isoffshift = $this->input->post('offshift');

            for ($i=0; $i < count($workday); $i++) { 
                $data = array();
                $data = array(
                    'ScheduleId' => $id,
                    'ShiftId' => $shift[$i],
                    'WorkDayId' => $workday[$i],
                );

                if ( $isoffshift[$i] == 'Y' ) {
                    $data['IsOffShift'] = 'N';
                } else {
                    $data['IsOffShift'] = 'Y';
                }

                $this->schedule_data->insert_detail_shift($data);

            }

            $this->db->trans_commit();

            // $this->session->set_flashdata('success', 'Successfull add new schedule');
            // redirect('/schedule','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file Schedule.php */
/* Location: ./application/controllers/Schedule.php */