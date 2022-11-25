<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {
    public function __construct()
    {
        $this->tableName = 'tbl_galeri';
    }

    public function getRows($id_galeri = '')
    {
        $this->db->select('id_galeri,nama_galeri,tanggal');
        $this->db->from('tbl_galeri');

        if($id_galeri) {
            $this->db->where('id_galeri', $id_galeri);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('tanggal','desc');
            $query = $this->db->get();
            $result = $query->result_array();

        }

        return !empty($result)?$result:false;
    }

    public function insert($data = array()){
        $insert = $this->db->insert('tbl_galeri', $data);
        return $insert?true:false;
    }

}