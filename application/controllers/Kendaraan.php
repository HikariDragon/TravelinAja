<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kendaraan_model');
        $this->load->library('upload');
        cek_login();
    }

    function index()
    {
        $data['title'] = 'Kendaraan';
        $data['kendaraan'] = $this->kendaraan_model->tampil_kendaraan()->result();
        $data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kendaraan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $nama_kendaraan = $this->input->post('nama_kendaraan');
        $keterangan = $this->input->post('keterangan');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_kendaraan' => $nama_kendaraan,
            'keterangan' => $keterangan,
            'gambar' => $gambar
        );

        $this->kendaraan_model->tambah_kendaraan($data, 'tbl_kendaraan');
        redirect('kendaraan');
    }

    public function update($id)
    {

        $nama_kendaraan = $this->input->post('nama_kendaraan');
        $keterangan = $this->input->post('keterangan');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_kendaraan' => $nama_kendaraan,
            'keterangan' => $keterangan,
            'gambar' => $gambar
        );
        $where = array(
            'id_kendaraan' => $id
        );

        $this->kendaraan_model->update_kendaraan($where, $data, 'tbl_kendaraan');
        redirect('kendaraan');
    }

    public function hapus($id)
    {
        $where = array('id_kendaraan' => $id);

        $this->kendaraan_model->hapus_kendaraan($where, 'tbl_kendaraan');
        redirect('kendaraan');
    }
}
