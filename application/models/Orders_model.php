<?php
class Orders_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    function cek_invoice($kode)
    {
        $hasil = $this->db->query("SELECT * FROM orders WHERE id_order='$kode'");
        return $hasil;
    }
    function simpan_testimoni($nama, $email, $msg)
    {
        $hasil = $this->db->query("INSERT INTO testimoni(nama,email,pesan,status,tgl_post) VALUES ('$nama','$email','$msg','0',curdate())");
        return $hasil;
    }
    function get_pembayaran()
    {
        $hasil = $this->db->query("SELECT id_bayar,tgl_bayar,metode,bank,order_id,SUM((hrg_dewasa*adult)+(hrg_anak*kids))AS total,jumlah,status,bukti_transfer,pengirim FROM pembayaran JOIN orders ON order_id=id_order JOIN metode_bayar ON metode_id_bayar=id_metode JOIN paket ON idpaket=paket_id_order WHERE status<>'LUNAS' GROUP BY order_id");
        return $hasil;
    }
    function get_orders()
    {
        $hasil = $this->db->query("SELECT id_order,tanggal,nama_paket,hrg_dewasa,hrg_anak,adult,kids,SUM(adult+kids)AS jml_berangkat,(hrg_dewasa*adult) AS sub_dewasa,(hrg_anak*kids)AS sub_anak,SUM((hrg_dewasa*adult)+(hrg_anak*kids))AS total,berangkat,kembali,metode,bank,norek,atasnama,nama,IF(jenkel='L','Laki-Laki','Perempuan')AS jenkel,alamat,notelp,email,keterangan,status FROM orders JOIN metode_bayar ON metode_id=id_metode JOIN paket ON paket_id_order=idpaket GROUP BY id_order order by tanggal desc");
        return $hasil;
    }
    function bayar_selesai($id)
    {
        $hasil = $this->db->query("UPDATE orders SET status='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }
    function edit_orders($kode, $dewasa, $anaks)
    {
        $hasil = $this->db->query("UPDATE orders SET adult='$dewasa',kids='$anaks' WHERE id_order='$kode'");
        return $hasil;
    }
    function hapus_orders($kode)
    {
        $hasil = $this->db->query("delete from orders WHERE id_order='$kode'");
        return $hasil;
    }
    function get_bank()
    {
        $hasil = $this->db->query("SELECT * FROM metode_bayar WHERE bank<>''");
        return $hasil;
    }
    function simpan_bukti($noinvoice, $nama, $bank, $tgl_bayar, $jumlah, $gambar)
    {
        $hasil = $this->db->query("INSERT INTO pembayaran(tgl_bayar,metode_id_bayar,order_id,jumlah,pengirim,bukti_transfer)VALUES('$tgl_bayar','$bank','$noinvoice','$jumlah','$nama','$gambar')");
        return $hasil;
    }
    function hapus_bayar($kode)
    {
        $hasil = $this->db->query("delete from pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }

    public function getOrdersWhere($where = null)
    {
        return $this->db->get_where('orders', $where);
    }

    public function income($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('tbl_penghasilan');
        return $this->db->get()->row($field);
    }

    
}
