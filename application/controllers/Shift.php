<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shift_data');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['results'] = $this->shift_data->get_all_shift();
            $data['page_title'] = "Shift";
            $data['page'] = 'shift';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['page_title'] = "Add Shift";
            $data['page'] = 'addshift';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data = array(
                'Description' => $this->input->post('description'), 
                'EffectiveDate' => $this->input->post('effectivedate'),
                'ShiftType' => $this->input->post('shifttype'),
                'StartTime' => date("H:i", strtotime($this->input->post('startime'))),
                'StartTimeMin' => date("H:i", strtotime($this->input->post('starttimemin'))),
                'StartTimeMax' => date("H:i", strtotime($this->input->post('starttimemax'))),
                'EndTime' => date("H:i", strtotime($this->input->post('endtime'))),
                'EndTimeMin' => date("H:i", strtotime($this->input->post('endtimemin'))),
                'EndTimeMax' => date("H:i", strtotime($this->input->post('endtimemax'))),
                'ScheduleHours' => $this->input->post('schedulehours'),
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->shift_data->insert_new_shift($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new shift');
            redirect('/shift','refresh');

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
            $this->shift_data->update_shift($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/shift','refresh');

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
            $this->shift_data->update_shift($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/shift','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file Shift.php */
/* Location: ./application/controllers/Shift.php */