<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time_rule extends CI_Model {

    public function get_all_time_rule()
    {
        return $this->db->get('StpTimeRule')->result();
    }

    public function get_overtime_hdr()
    {
        $this->db->select('OvertimeIndexId, Description');
        return $this->db->get('StpHdrOvertimeIndex')->result();
    }

    public function get_rounding_hdr()
    {
        $this->db->select('RoundingId, Description');
        return $this->db->get('StpRounding')->result();
    }

    public function insert_time_rule($object)
    {
        $this->db->insert('StpTimeRule', $object);
    }

    public function get_overtime_dropdown()
    {
        $results = $this->db->get('StpHdrOvertimeIndex')->result();
        $dropdown[''] = '';
        foreach ($results as $result) {
            $dropdown[$result->OvertimeIndexId] = $result->Description;
        }
        return $dropdown;
    }

    public function get_rounding_dropdown()
    {
        $results = $this->db->get('StpRounding')->result();
        $dropdown[''] = '';
        foreach ($results as $result) {
            $dropdown[$result->RoundingId] = $result->Description;
        }
        return $dropdown;
    }

    public function update_time_rule($id, $object)
    {
        $this->db->where('TimeRuleId', $id);
        $this->db->update('StpTimeRule', $object);
    }

}

/* End of file Time_rule.php */
/* Location: ./application/models/Time_rule.php */