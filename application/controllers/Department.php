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
                'Description' => $departmentname
            );

            $this->db->trans_begin();
            $this->masterdata->insert_new_department($data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new department');
            redirect('/department','refresh');

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file Department.php */
/* Location: ./application/controllers/Department.php */