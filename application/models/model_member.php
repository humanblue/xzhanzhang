<?php
// 用户信息
class Model_Member extends MY_Model
{
    public function get_member_byid($id = 0, $field = '*'){
        $sql = "SELECT {$field} FROM " .TABLE_MEMBER. " WHERE id = {$id} LIMIT 1";
        $DB_Member = $this->load->database('member',TRUE);
        $query = $DB_Member->query($sql)->row_array();
        return $query;
    }

    public function insert_member($data = array()){
        $DB_Member = $this->load->database('member',TRUE);
        $query = $DB_Member->insert('member', $data);
        if ($query === true) {
            return $DB_Member->insert_id();
        } else {
            return false;
        }
    }

    public function get_member_byids($ids = array(), $field = '*'){
        if (empty($ids)) {
            return false;
        }
        $ids_string = implode(',', $ids);
        $sql = "SELECT {$field} FROM " .TABLE_MEMBER. " WHERE id IN ({$ids_string})";
        $DB_Member = $this->load->database('member',TRUE);
        $query = $DB_Member->query($sql)->result_array();
        return $query;
    }

}