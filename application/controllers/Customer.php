<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('paket_model');
        $this->load->model('kendaraan_model');
        admin();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Customer';
        $data['customer'] = $this->customer_model->get_data('tbl_customer')->result();
        $data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Customer';

        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['paket']  = $this->paket_model->tampil_paket()->result_array();
        $data['tbl_kendaraan']  = $this->kendaraan_model->tampil_kenda()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_customer');
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'nama_paket' => $this->input->post('nama_paket'),
                'adult' => $this->input->post('adult'),
                'kids' => $this->input->post('kids'),
                'berangkat' => $this->input->post('berangkat'),
                'kembali' => $this->input->post('kembali'),
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            );

            $this->customer_model->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Data Berhasi Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> </div>');
            redirect('customer');
        }
    }

    public function edit($id_customer)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_customer' => $id_customer,
                'nama_customer' => $this->input->post('nama_customer'),
                'nama_paket' => $this->input->post('nama_paket'),
                'adult' => $this->input->post('adult'),
                'kids' => $this->input->post('kids'),
                'berangkat' => $this->input->post('berangkat'),
                'kembali' => $this->input->post('kembali'),
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            );

            $this->customer_model->update_data($data, 'tbl_customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button> </div>');
            redirect('customer');
        }
    }

    public function print()
    {
        $data['customer'] = $this->customer_model->get_data('tbl_customer')->result();
        $this->load->view('print_customer', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['customer'] = $this->customer_model->get_data('tbl_customer')->result();
        $this->load->view('laporan_customer', $data);

        $paper_size = 'A4';
        $orientation  = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_customer.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required', array(
            'required' => '%s harus diisi !'
        ));
       
        $this->form_validation->set_rules('nama_kendaraan', 'Kendaraan', 'required', array(
            'required' => '%s harus diisi !'
        ));
    }
    public function delete($id)
    {
        $where = array('id_customer' => $id);

        $this->customer_model->delete($where, 'tbl_customer');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button> </div>');
        redirect('customer');
    }
}
