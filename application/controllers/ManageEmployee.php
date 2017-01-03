<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageEmployee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['employees'] = $this->employee->get_all_employee();
            $data['page_title'] = "Manage Employee";
            $data['page'] = 'manageemployee';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data['page_title'] = "Add Employee";
            $data['page'] = 'addemployee';
            $this->load->view('include/mainloggedin', $data);

        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $idcardno = $this->input->post('idcardno');
            $birthlocation = $this->input->post('birthlocation');
            $birthdate = $this->input->post('birthdate');
            $bloodtype = $this->input->post('bloodtype');
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $phoneno = $this->input->post('phoneno');
            $address = $this->input->post('address');
            $postalcode = $this->input->post('postalcode');
            $role = $this->input->post('role');

            $data = array(
                'IdCardNo' => $idcardno,
                'FullName' => $fullname,
                'BirthLocation' => $birthlocation,
                'BirthDate' => $birthdate,
                'BloodType' => $bloodtype,
                'Email' => $email,
                'Password' => $this->bcrypt->hash_password($password),
                'PhoneNo' => $phoneno,
                'Address' => $address,
                'PostalCode' => $postalcode,
                'IsActive' => 'Y',
                'IsEmployee' => 'Y',
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
                'Role' => $role,
            );

            $this->db->trans_begin();

            $this->db->insert('MsEmployee', $data);

            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new employee!');
            redirect('/manageemployee/add','refresh');

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file ManageEmployee.php */
/* Location: ./application/controllers/ManageEmployee.php */