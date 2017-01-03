<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPosition extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('masterdata');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['jobpositions'] = $this->masterdata->get_all_jobposition();
            $data['page_title'] = "Job Position Master Data";
            $data['page'] = 'jobposition';
            $this->load->view('include/mainloggedin', $data);

        } else {
            $this->load->view('errors/index.html');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $jobname = $this->input->post('jobname');

            $data = array(
                'IsActive' => 'Y',
                'Description' => $jobname,
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->masterdata->insert_new_jobposition($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new job position');
            redirect('/jobposition','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

    public function update()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null ) {

        } else {
            $this->load->view('errors/index.html');
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
            $this->masterdata->update_jobposition($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/jobposition','refresh');
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
            $this->masterdata->update_jobposition($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/jobposition','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file JobPosition.php */
/* Location: ./application/controllers/JobPosition.php */