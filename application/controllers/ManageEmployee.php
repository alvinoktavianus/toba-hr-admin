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

            $data['departments'] = $this->employee->get_department_dropdown();
            $data['jobpositions'] = $this->employee->get_jobposition_dropdown();
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
            $gender = $this->input->post('gender');
            $imgurl = $this->input->post('imgurl');
            $department = $this->input->post('department');
            $jobposition = $this->input->post('jobposition');

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
                'CreatedAt' => date(DATE_W3C, now('Asia/Jakarta')),
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
                'Role' => $role,
                'Gender' => $gender,
                'ImgUrl' => $imgurl,
                'DepartmentID' => $department,
                'JobPositionID' => $jobposition,
            );

            $this->db->trans_begin();

            $this->db->insert('MsEmployee', $data);

            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new employee!');
            redirect('/manageemployee','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

    public function update()
    {
        if ( $this->session->has_userdata('user_session') && $this->input->get('id') != null ) {
            $data['current'] = $this->employee->get_employee_by_id($this->input->get('id'));
            $data['departments'] = $this->employee->get_department_dropdown();
            $data['jobpositions'] = $this->employee->get_jobposition_dropdown();
            $data['page_title'] = "Update Employee";
            $data['page'] = 'updateemployee';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
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
            $this->employee->update_employee($this->input->get('id'), $data);
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
            $this->employee->update_employee($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/department','refresh');
        } else {
            $this->load->view('errors/index.html');
        }
    }

}

/* End of file ManageEmployee.php */
/* Location: ./application/controllers/ManageEmployee.php */