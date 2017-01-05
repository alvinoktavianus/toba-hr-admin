<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HolidaySchedule extends CI_Model {

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

}

/* End of file HolidaySchedule.php */
/* Location: ./application/models/HolidaySchedule.php */