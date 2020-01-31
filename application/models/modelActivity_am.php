<?php
    class modelActivity_am extends CI_Model
    {
        public const TABLE_NAME ='activity';
        
        public function search_blog($nama){
            $this->db->like('nama_customer', $nama , 'both');
            $this->db->order_by('nama_customer', 'ASC');
            $this->db->limit(10);
            return $this->db->get('customer')->result();
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
            if($where)
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

        public function getCustomer()
        {
            $this->db->select('activity.id_activity');
            $this->db->select('customer.nama_customer');
            $this->db->select('COUNT(activity.id_customer) AS n' );
            $this->db->from('activity');
            $this->db->join('customer','activity.id_customer = customer.id_customer');
            $this->db->group_by('activity.id_customer');
            $this->db->order_by('customer.nama_customer');
            $query=$this->db->get()->result();
            return $query;
            }

        public function addPlan($plan)
        {
                $this->db->insert($this::TABLE_NAME,$plan);          
        }

        public function updatePlan($plan)
        {   
            $this->db->update($this::TABLE_NAME,$plan, array('id_activity'=>$plan['id_activity']));
            
        }


    }
?>