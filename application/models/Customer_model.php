<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
   
   
	public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,)
    {
        $this->db->insert('tbl_customer', $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id_customer', $data['id_customer']);
        $this->db->update($table, $data);  
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
	public function join_paket()
    {
        $this->db->select('nama_paket');
        $this->db->from('paket');
        $this->db->join('tbl_customer', 'paket.idpaket = tbl_customer.id_customer');
        return $this->db->get();

    }

    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        return $this->db->get();
    }
}