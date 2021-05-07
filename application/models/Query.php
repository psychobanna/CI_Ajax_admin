<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Model {
    
    
        public function get_row_count($table,$where)
        {
                $query = $this->db->get_where($table,$where);
                return $query->num_rows();
        }

        public function get_single_row($table,$where)
        {
                $query = $this->db->get_where($table,$where);
                return $query->result();
        }

        public function get_ten_data($table,$where,$limit)
        {
                $query = $this->db->get_where($table,$where,$limit);
                return $query->result();
        }

        public function get_data_start_last($table,$where,$start,$last)
        {
                $query = $this->db->get_where($table,$where,$last,$start);
                return $query->result();
        }
        
        public function get_data($table)
        {
                $query = $this->db->get($table);
                return $query->result();
        }

        public function insert_data($table,$data)
        {
                return $this->db->insert($table, $data);
        }

        public function update_data($table,$query,$where)
        {
                return $this->db->update($table, $query,$where);
        }

        public function delete_data($table,$where)
        {
                return $this->db->delete($table,$where);
        }

        public function delete_multidata($table,$column,$value)
        {       
                $this->db->where_in($column, $value);
                return $this->db->delete($table);
        }
}