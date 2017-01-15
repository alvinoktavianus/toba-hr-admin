<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_data extends CI_Model {

    public function get_all_schedule()
    {
        
    }

    public function insert_new_schedule($object)
    {
        $this->db->insert('StpSchedule', $object);
    }

    public function get_workday_dropdown()
    {
        $dropdown[''] = '';
        $this->db->where('IsActive', 'Y');
        $results = $this->db->get('StpWorkDay')->result();
        foreach ($results as $result) {
            $dropdown[$result->WorkDayId] = $result->Description;
        }
        return $dropdown;
    }

    public function get_shift_dropdown()
    {
        $dropdown[''] = '';
        $this->db->where('IsActive', 'Y');
        $results = $this->db->get('StpShift')->result();
        foreach ($results as $result) {
            $dropdown[$result->ShiftId] = $result->Description;
        }
        return $dropdown;
    }

    public function get_schedule_hdr_id()
    {
        $this->db->order_by('ScheduleId', 'desc');
        return (int)$this->db->get('StpSchedule', 1)->result()[0]->ScheduleId;
    }

    public function insert_detail_rotation($object)
    {
        $this->db->insert('StpDtlRotation', $object);
    }

    public function insert_detail_shift($object)
    {
        $this->db->insert('StpShiftDetail', $object);
    }

    public function update_schedule($id, $object)
    {
        $this->db->where('ScheduleId', $id);
        $this->db->update('StpSchedule', $object);
    }

}

/* End of file Schedule_data.php */
/* Location: ./application/models/Schedule_data.php */