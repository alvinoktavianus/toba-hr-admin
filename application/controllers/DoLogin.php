<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoLogin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index()
    {

        if ( !$this->session->has_userdata('user_session') ) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $errors = validation_errors();
                $this->session->set_flashdata('errors', $errors);
            } else {

                $email = $this->input->post('username');
                $password = $this->input->post('password');

                $results = $this->users->get_users_by_email($email);

                if ( count($results) == 0 ) {
                    $this->session->set_flashdata('errors', "Wrong username or password!");
                } else {

                    if ( $results[0]->Email == $email && $this->bcrypt->check_password($password, $results[0]->Password) && $results[0]->Role == "adm" ) {
                        $array = array(
                            'email' => $results[0]->Email,
                            'role' => 'adm',
                            'isloggedin' => true,
                            'employeeid' => $results[0]->EmployeeID
                        );

                        $this->session->set_userdata( 'user_session', $array );
                    } else {
                        $this->session->set_flashdata('errors', "Wrong username or password!");
                    }
                }

            }
        }
        redirect('/','refresh');

    }

}

/* End of file DoLogin.php */
/* Location: ./application/controllers/DoLogin.php */