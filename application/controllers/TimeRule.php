<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeRule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('time_rule');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $timerule = $this->time_rule->get_all_time_rule();
            $overtime = $this->time_rule->get_overtime_hdr();
            $rounding = $this->time_rule->get_rounding_hdr();

            $generated = array();
            for ($i=0; $i < count($timerule); $i++) { 
                $temp = array();
                $temp['id'] = $timerule[$i]->TimeRuleId;
                $temp['line'] = $i+1;
                $temp['description'] = $timerule[$i]->Description;
                $temp['overtimebasedon'] = $timerule[$i]->OvertimeBasedOn;
                $temp['overtimetype'] = $timerule[$i]->OvertimeType;
                $temp['isactive'] = $timerule[$i]->IsActive;

                for ($j=0; $j < count($overtime); $j++) { 
                    if ( $timerule[$i]->OvertimeIndexId == $overtime[$j]->OvertimeIndexId ) {
                        $temp['overtime'] = $overtime[$j]->Description;
                    }
                }
                for ($j=0; $j < count($rounding); $j++) { 
                    if ( $timerule[$i]->RoundingId == $rounding[$j]->RoundingId ) {
                        $temp['rounding'] = $rounding[$j]->Description;
                    }
                }

                array_push($generated, $temp);

            }

            $data['results'] = $generated;
            $data['page_title'] = "Time Rule";
            $data['page'] = 'timerule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['overtimes'] = $this->time_rule->get_overtime_dropdown();
            $data['roundings'] = $this->time_rule->get_rounding_dropdown();
            $data['page_title'] = "Add Time Rule";
            $data['page'] = 'addtimerule';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data = array(
                'OvertimeIndexId' => $this->input->post('overtimeindex'),
                'RoundingId' => $this->input->post('rounding'),
                'Description' => $this->input->post('description'),
                'OvertimeBasedOn' => $this->input->post('basedon'),
                'OvertimeType' => $this->input->post('overtimetype'),
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->time_rule->insert_time_rule($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new time rule');
            redirect('/timerule','refresh');

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
            $this->time_rule->update_time_rule($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/timerule','refresh');

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
            $this->time_rule->update_time_rule($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/timerule','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file TimeRule.php */
/* Location: ./application/controllers/TimeRule.php */