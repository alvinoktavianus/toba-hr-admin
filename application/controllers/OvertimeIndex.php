<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OvertimeIndex extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('overtime_index');
    }

    function index()
    {
        if ( $this->session->has_userdata('user_session') ) {

            $data = $this->overtime_index->get_all_overtime_index();
            $hdr = $this->overtime_index->get_hdr();

            $result = array();
            $generate = array();

            for ( $i=0; $i<count($hdr); $i++ ) {
                $temp = array();
                $generate['id'] = $hdr[$i]->OvertimeIndexId;
                $generate['line'] = $i+1;
                $generate['description'] = $hdr[$i]->Description;
                $generate['isactive'] = $hdr[$i]->IsActive;

                $details = array();
                for ( $j=0; $j<count($data); $j++ ) {
                    if ( $hdr[$i]->OvertimeIndexId == $data[$j]->OvertimeIndexId ) {
                        $temp['line'] = $j+1;
                        $temp['fromhour'] = $data[$j]->FromHour;
                        $temp['tohour'] = $data[$j]->ToHour;
                        $temp['index'] = $data[$j]->OvertimeIndex;
                        $temp['accumindex'] = $data[$j]->AccumIndex;
                        array_push($details, $temp);
                    }
                }
                $generate['details'] = $details;
                array_push($result, $generate);

            }

            $data['results'] = $result;
            $data['json'] = json_encode($generate);
            $data['page_title'] = "Overtime Index";
            $data['page'] = 'overtimeindex';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function add()
    {
        if ( $this->session->has_userdata('user_session') ) {
            $data['page_title'] = "Add Overtime Index";
            $data['page'] = 'addovertimeindex';
            $this->load->view('include/mainloggedin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function doadd() {
        if ( $this->session->has_userdata('user_session') && count($this->input->post('fromhour')) > 0) {

            $countrow = count($this->input->post('fromhour'));

            $header = array(
                'Description' => $this->input->post('overtimeindexname'),
                'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
            );

            $this->db->trans_begin();
            $this->overtime_index->insert_new_overtime_index_hdr($header);
            $current = $this->overtime_index->get_header_id();

            $fromhour = $this->input->post('fromhour');
            $tohour = $this->input->post('tohour');
            $index = $this->input->post('index');
            $accumindex = $this->input->post('accumindex');

            for ($i=0; $i < $countrow; $i++) {
                $details = array();
                $details = array(
                    'OvertimeIndexId' => (int)$current,
                    'FromHour' => $fromhour[$i],
                    'ToHour' => $tohour[$i],
                    'OvertimeIndex' => $index[$i],
                    'AccumIndex' => $accumindex[$i],
                    'CreatedBy' => $this->session->userdata('user_session')['employeeid'],
                );
                $this->overtime_index->insert_new_detail($details);
            }

            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull add new overtime index');
            redirect('/overtimeindex','refresh');

        } else {
            $this->load->view('errors/index.html', $data);
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
            $this->overtime_index->update_overtime_index($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull deactivate');
            redirect('/overtimeindex','refresh');

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
            $this->overtime_index->update_overtime_index($this->input->get('id'), $data);
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Successfull activate');
            redirect('/overtimeindex','refresh');

        } else {
            $this->load->view('errors/index.html');
        }
    }

}
