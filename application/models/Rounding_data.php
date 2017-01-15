<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rounding_data extends CI_Model {

    public function get_all_rounding()
    {
        $this->db->select('*');
        $this->db->from('StpRounding');
        $this->db->join('StpDtlRounding', 'StpRounding.RoundingId = StpDtlRounding.RoundingId');
        return $this->db->get()->result();
    }

    public function insert_rounding_hdr($object)
    {
        $this->db->insert('StpRounding', $object);
    }

    public function get_rounding_hdr()
    {
        return $this->db->get('StpRounding')->result();
    }

    public function get_rounding_id()
    {
        $this->db->order_by('RoundingId', 'desc');
        return (int)$this->db->get('StpRounding', 1)->result()[0]->RoundingId;
    }

    public function insert_rounding_dtl($detail)
    {
        $this->db->insert('StpDtlRounding', $detail);
    }

    public function update_rounding($id, $object)
    {
        $this->db->where('RoundingId', $id);
        $this->db->update('StpRounding', $object);
    }

}

/* End of file Rounding_data.php */
/* Location: ./application/models/Rounding_data.php */