<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rounding extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rounding_data');
    }

    public function index()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $hdr = $this->rounding_data->get_rounding_hdr();
            $dtl = $this->rounding_data->get_all_rounding();


            $result = array();
            $generate = array();

            for ( $i=0; $i<count($hdr); $i++ ) {
                $temp = array();
                $generate['id'] = $hdr[$i]->RoundingId;
                $generate['line'] = $i+1;
                $generate['description'] = $hdr[$i]->Description;
                $generate['isrounding'] = $hdr[$i]->IsRounding;
                $generate['isactive'] = $hdr[$i]->IsActive;

                $details = array();
                for ( $j=0; $j<count($dtl); $j++ ) {
                    if ( $hdr[$i]->RoundingId == $dtl[$j]->RoundingId ) {
                        $temp['line'] = $j+1;
                        $temp['minutesfrom'] = $dtl[$j]->MinutesFrom;
                        $temp['minutesto'] = $dtl[$j]->MinutesTo;
                        $temp['value'] = $dtl[$j]->RoundingValue;
                        array_push($details, $temp);
                    }
                }
                $generate['details'] = $details;
                array_push($result, $generate);

            }

            $data['results'] = $result;
            $data['page_title'] = "Rounding";
            $data['page'] = 'rounding';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['page_title'] = "Add Rounding";
            $data['page'] = 'addrounding';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function doadd()
    {
        if ( $this->session->has_userdata('user_session') && count($this->input->post('minutesfrom')) > 0) {

            $minutesfrom = $this->input->post('minutesfrom');
            $minutesto = $this->input->post('minutesto');
            $rounding = $this->input->post('rounding');

            $header = array(
                'Description' => $this->input->post('roundingname'),
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->rounding_data->insert_rounding_hdr($header);
            $current = $this->rounding_data->get_rounding_id();

            for ($i=0; $i < count($this->input->post('minutesfrom')); $i++) {
                $details = array();
                $details = array(
                    'RoundingId' => (int)$current,
                    'MinutesFrom' => $minutesfrom[$i],
                    'MinutesTo' => $minutesto[$i],
                    'RoundingValue' => $rounding[$i],
                    'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
                );
                $this->rounding_data->insert_rounding_dtl($details);
            }

            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new overtime index');
            redirect('/rounding','refresh');

        } else {

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
            $this->rounding_data->update_rounding($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/rounding','refresh');

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
            $this->rounding_data->update_rounding($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/rounding','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }


}

/* End of file Rounding.php */
/* Location: ./application/controllers/Rounding.php */