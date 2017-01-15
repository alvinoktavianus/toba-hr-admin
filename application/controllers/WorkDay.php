<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkDay extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('workday_data');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $hdr = $this->workday_data->get_workday_hdr();
            $dtl = $this->workday_data->get_all_workday();

            $generated = array();
            for ($i=0; $i < count($hdr); $i++) { 
                $temp = array();
                $temp['id'] = $hdr[$i]->WorkDayId;
                $temp['line'] = $i+1;
                $temp['description'] = $hdr[$i]->Description;
                $temp['isactive'] = $hdr[$i]->IsActive;
                for ($j=0; $j < count($dtl); $j++) { 
                    if ( $hdr[$i]->TimeRuleId == $dtl[$j]->TimeRuleId ) {
                        $temp['timerule'] = $dtl[$j]->Description;
                    }
                }
                array_push($generated, $temp);
            }

            $data['results'] = $generated;
            $data['page_title'] = "Workday";
            $data['page'] = 'workday';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['options'] = $this->workday_data->get_all_time_rule();
            $data['page_title'] = "Workday";
            $data['page'] = 'addworkday';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->post('description') != null ) {

            $data = array('Description' => $this->input->post('description'), 'TimeRuleId' => $this->input->post('timerule'), );
            $this->db->trans_begin();
            $this->workday_data->insert_workday($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new workday');
            redirect('/workday','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }



}

/* End of file WorkDay.php */
/* Location: ./application/controllers/WorkDay.php */