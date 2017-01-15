<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkDay_data extends CI_Model {

    public function get_all_workday()
    {
        $this->db->select('*');
        $this->db->join('StpTimeRule', 'StpTimeRule.TimeRuleId = StpWorkDay.TimeRuleId');
        return $this->db->get('StpWorkDay')->result();
    }

    public function get_workday_hdr()
    {
        return $this->db->get('StpWorkDay')->result();
    }

    public function get_all_time_rule()
    {
        $dropdown[''] = "";
        $results = $this->db->get('StpTimeRule')->result();
        foreach ($results as $result) {
            $dropdown[$result->TimeRuleId] = $result->Description;
        }
        return $dropdown;
    }

    public function insert_workday($object)
    {
        $this->db->insert('StpWorkDay', $object);
    }

    public function update_workday($id, $object)
    {
        $this->db->where('WorkDayId', $id);
        $this->db->update('StpWorkDay', $object);
    }

}

/* End of file WorkDay_data.php */
/* Location: ./application/models/WorkDay_data.php */