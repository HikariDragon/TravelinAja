<?php
class Kendaraan_model extends CI_Model{

    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function tampil_kendaraan(){
    return $this->db->get('tbl_kendaraan');
    }

    public function tambah_kendaraan($data,$table)
    {
        $this->db->insert($table, $data);
    }
    public function update_kendaraan($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_kendaraan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function tampil_kenda(){
		$hasil=$this->db->query("select * from tbl_kendaraan");
		return $hasil;
	}


}