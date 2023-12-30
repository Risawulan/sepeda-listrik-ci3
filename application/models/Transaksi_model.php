<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_model extends CI_Model {
    public function simpan_data($nota, $waktu_sewa, $waktu_kembali, $total_harga, $nama, $nama_penanggung_jawab) {
        $data = array(
            'nota' => $nota,
            'waktu_sewa' => $waktu_sewa,
            'waktu_kembali' => $waktu_kembali,
            'total_harga' => $total_harga,
            'nama' => $nama,
            'nama_penanggung_jawab' => $nama_penanggung_jawab
        );
        $this->db->insert('transaksi', $data); 
    }

    public function get_detail_nota($nota)
    {
        return $this->db->get_where('transaksi', array('nota' => $nota))->row_array();
    }
}
