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

    public function get_holiday_schedule()
    {
        $this->db->select('*');
        $this->db->from('StpHolidaySchedule');
        $this->db->join('StpDtlHolidaySchedule', 'StpHolidaySchedule.HolidayScheduleId = StpDtlHolidaySchedule.HolidayScheduleId');
        $this->db->join('MsHoliday', 'StpDtlHolidaySchedule.HolidayId = MsHoliday.HolidayId');
        return $this->db->get()->result();
    }

    public function get_holiday_hdr()
    {
        return $this->db->get('StpHolidaySchedule')->result();
    }

    public function update_holiday_schedule($id, $object)
    {
        $this->db->where('HolidayScheduleId', $id);
        $this->db->update('StpHolidaySchedule', $object);
    }

}

/* End of file Holiday_schedule.php */
/* Location: ./application/models/Holiday_schedule.php */