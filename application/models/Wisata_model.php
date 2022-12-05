<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {
   
   
	public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id_wisata', $data['id_wisata']);
        $this->db->update($table, $data);  
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function count_wisata(){
		$hasil=$this->db->query("select * from wisata");
		return $hasil;
	}

	function get_wisata($offset,$limit){
		$hasil=$this->db->query("select * from wisata order by id_wisata DESC limit $offset,$limit");
		return $hasil;
	}
	function SimpanWisata($nama_wisata,$deskripsi,$gambar){
		$hasil=$this->db->query("INSERT INTO wisata(nama_wisata,deskripsi,gambar) VALUES ('$nama_wisata','$deskripsi','$gambar')");
		return $hasil;
	}
	function tampil_wisata(){
		$hasil=$this->db->query("select * from wisata order by id_wisata DESC");
		return $hasil;
	}
	function getwisata($kode){
		$hasil=$this->db->query("select * from wisata where id_wisata='$kode'");
		return $hasil;
	}
	function update_wisata_with_img($kode,$nama_wisata,$deskripsi,$gambar){
		$hasil=$this->db->query("UPDATE wisata SET nama_wisata='$nama_wisata',deskripsi='$deskripsi',gambar='$gambar' WHERE id_wisata='$kode'");
		return $hasil;
	}
	function update_wisata_no_img($kode,$nama_wisata,$deskripsi){
		$hasil=$this->db->query("UPDATE wisata SET nama_wisata='$nama_wisata',deskripsi='$deskripsi' WHERE id_wisata='$kode'");
		return $hasil;
	}
	function hapus_wisata($id){
		$hasil=$this->db->query("delete from wisata where id_wisata='$id'");
		return $hasil;
	}
	
}