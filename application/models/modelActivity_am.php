<?php
    class modelActivity_am extends CI_Model
    {

        
        public function search_blog($nama){
            $this->db->like('nama_customer', $nama , 'both');
            $this->db->order_by('nama_customer', 'ASC');
            $this->db->limit(10);
            return $this->db->get('customer')->result();
        }
        public function search_type($type){
            $this->db->like('type', $type , 'both');
            $this->db->order_by('type', 'ASC');
            $this->db->limit(10);
            return $this->db->get('type_act')->result();
        }
        public function search_stage($stage){
            $this->db->like('stage', $stage , 'both');
            $this->db->order_by('stage', 'ASC');
            $this->db->limit(10);
            return $this->db->get('stage')->result();
        }
        function getJoinPlan($kolom, $table1, $table2, $table3, $table4, $syarat1,$syarat2,$syarat3,$syarat4)
        {
            $this->db->select($kolom);
            $this->db->from($table1);
            $this->db->join($table2,$syarat1);
            $this->db->join($table3,$syarat2);
            $this->db->join($table4,$syarat3);
            $this->db->where($syarat4);
            // $this->db->order_by('stage', 'DESC');
            $query=$this->db->get()->result();
            return $query;
    
        }
        function getJoinActivity($kolom, $table1, $table2, $table3, $table4, $syarat1,$syarat2,$syarat3,$syarat4)
        {
        //$this->db->group_by('time');
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2,$syarat1);
        $this->db->join($table3,$syarat2);
        $this->db->join($table4,$syarat3);
        $this->db->where($syarat4);
        //$this->db->order_by('time', 'ASC');
        $query=$this->db->get()->result();
        return $query;
        }
        public function getData($kolom,$table,$where=false)
        {
            if($where=true)
            {
                return $this->db
                    ->select($kolom)//function bawaan dari CI untuk akses databasenya
                    ->from($table)
                    ->where($where)
                    ->get()
                    ->row();
            }
            else
            {
                return $this->db
                    ->select($kolom)//function bawaan dari CI untuk akses databasenya
                    ->get($table)
                    ->result();//return object
            }
            
        }
        public function update($done)
        {
            $this->db->update('activity',$done, array('id_activity'=>$done['id_activity']));
        }
        function insertData($table,$value)//$table itu nama table, $value itu nilai yang dibawa
        {
        return $this->db //sudah bawaan dari CI
                    ->insert($table,$value);//function insert bawaan dari CI
        }
    }
?>