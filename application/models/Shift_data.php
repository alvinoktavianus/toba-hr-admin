<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_data extends CI_Model {

    public function get_all_shift()
    {
        return $this->db->get('StpShift')->result();
    }

    public function insert_new_shift($object)
    {
        $this->db->insert('StpShift', $object);
    }

    public function update_shift($id, $object)
    {
        $this->db->where('ShiftId', $id);
        $this->db->update('StpShift', $object);
    }

}

/* End of file Shift_data.php */
/* Location: ./application/models/Shift_data.php */