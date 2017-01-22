<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TobaHRM extends CI_Controller {

    public function index()
    {
        if ( !$this->session->has_userdata('user_session') ) {
            // load user_model untuk tarik data
            $data['page_title'] = "Toba HRM Admin";
            $this->load->view('include/login', $data);
        } else {

            $present = array();

            $temp = array(
                'line' => 1,
                'name' => 'Alvin Oktavianus',
                'checkin' => '09:00',
                'checkout' => '-',
                'location' => 'Jl. H. Kelik Srengseng, Kembangan',
            );
            array_push($present, $temp);

            $temp = array(
                'line' => 2,
                'name' => 'Albert Kurniadinata',
                'checkin' => '08:53',
                'checkout' => '-',
                'location' => 'Jl. H. Kelik Srengseng, Kembangan',
            );
            array_push($present, $temp);

            $temp = array(
                'line' => 3,
                'name' => 'Anindia Rifara',
                'checkin' => '09:10',
                'checkout' => '-',
                'location' => 'Jl. H. Kelik Srengseng, Kembangan',
            );
            array_push($present, $temp);

            $absence = array();

            $temp = array(
                'line' => 1,
                'name' => "Stephan Christianus",
                'leavestart' => "23 Jan 2017",
                'leaveend' => "23 Jan 2017",
                'duration' => 1,
                'reason' => "Urusan keluarga"
            );
            array_push($absence, $temp);

            $data['presents'] = $present;
            $data['absences'] = $absence;
            
            $data['page_title'] = "Home | Toba HRM";
            $data['page'] = 'home';
            $this->load->view('include/mainloggedin', $data);
        }        
    }

}

/* End of file TobaHRM.php */
/* Location: ./application/controllers/TobaHRM.php */