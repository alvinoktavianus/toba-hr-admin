<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_schedule extends CI_Model {

    public function get_all_holiday_dropdown()
    {
        $this->db->where('IsActive', 'Y');
        $results = $this->db->get('MsHoliday')->result();
        $dropdown = array('' => '');
        foreach ($results as $result) {
            $dropdown[$result->HolidayId] = $result->Description;
        }
        return $dropdown;
    }

    public function insert_new_header($object)
    {
        $this->db->insert('StpHolidaySchedule', $object);
    }

    public function get_header_id()
    {
        $this->db->select('HolidayScheduleId');
        $this->db->order_by('HolidayScheduleId', 'desc');
        return $this->db->get('StpHolidaySchedule', 1)->result()[0];
    }

    public function insert_detail($object)
    {
        $this->db->insert('StpDtlHolidaySchedule', $object);
    }

}

/* End of file Holiday_schedule.php */
/* Location: ./application/models/Holiday_schedule.php */