<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('masterdata');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['departments'] = $this->masterdata->get_all_department();
            $data['page_title'] = "Department Master Data";
            $data['page'] = 'department';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->post('departmentname') != null ) {

            $departmentname = $this->input->post('departmentname');

            $data = array(
                'Description' => $departmentname,
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->masterdata->insert_new_department($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new department');
            redirect('/department','refresh');

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
            $this->masterdata->update_department($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/department','refresh');
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
            $this->masterdata->update_department($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/department','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file Department.php */
/* Location: ./application/controllers/Department.php */