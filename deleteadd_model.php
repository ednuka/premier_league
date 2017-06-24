<?php
class DeleteAdd_model extends CI_Model {

    function _construct() {
        parent::_construct();
        $this->load->database();
    }

    function get_table($table_name) {
        $query = $this->db->get($table_name);
        return $query->result(); 
    }
    function delete($table_name, $id) {
        $this->db->where('id', $id);
        return $this->db->delete($table_name);
    }
     function insert($table_name, $data) {

        $ekle = $this->db->insert($table_name, $data);
        return $ekle;
    }
    function get_rows($table_name, $column, $value) {
        $query = $this->db->get_where($table_name, array($column => $value));
        return $query->result();
    }
    
    function get_rows_cond($table_name, $cond) {
        $query = $this->db->get_where($table_name, $cond);
        return $query->result();
    }
    function get_value($table_name, $cond_array, $get_column) {
        $query = $this->db->get_where($table_name, $cond_array);
        $results = $query->result();
        $value=0;
        foreach ($results as $rslt) {
            $value = $rslt->$get_column;
        }
        return $value;
    }
    public function update($table_name, $column, $value, $data) {


        $this->db->where($column, $value);
        $query = $this->db->update($table_name, $data);
        return $query;
    }

}