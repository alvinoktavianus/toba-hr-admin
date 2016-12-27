<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoLogout extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $this->session->unset_userdata('user_session');
        }
        redirect('/','refresh');
    }

}

/* End of file DoLogout.php */
/* Location: ./application/controllers/DoLogout.php */