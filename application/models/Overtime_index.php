<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overtime_index extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_new_overtime_index_hdr($object)
    {
        $this->db->insert('StpHdrOvertimeIndex', $object);
    }

    public function get_header_id()
    {
        $this->db->select('OvertimeIndexId');
        $this->db->order_by('OvertimeIndexId', 'desc');
        return $this->db->get('StpHdrOvertimeIndex', 1)->result()[0]->OvertimeIndexId;
    }

    public function insert_new_detail($object)
    {
        $this->db->insert('StpDtlOvertimeIndex', $object);
    }

    public function get_all_overtime_index()
    {
        $this->db->select('*');
        $this->db->from('StpHdrOvertimeIndex');
        $this->db->join('StpDtlOvertimeIndex', 'StpHdrOvertimeIndex.OvertimeIndexId = StpDtlOvertimeIndex.OvertimeIndexId');
        $this->db->order_by('StpDtlOvertimeIndex.AccumIndex', 'asc');
        return $this->db->get()->result();
    }

    public function get_hdr()
    {
        return $this->db->get('StpHdrOvertimeIndex')->result();
    }

    public function update_overtime_index($id, $object)
    {
        $this->db->where('OvertimeIndexId', $id);
        $this->db->update('StpHdrOvertimeIndex', $object);
    }

}
