<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapembayaran_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("datapembayaran");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('pembayaran_id',$id);
		$data = $this->db->get("datapembayaran");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'pembayaran_id' => $data['Pembayaran_Id'],
			'metode_pembayaran' => $data['Metode_Pembayaran'],
            'total_pembayaran' => $data['Total_Pembayaran'],
            'tanggal_pembayaran' => $data['Tanggal_Pembayaran']
		);
		$this->db->insert('datapembayaran', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('datapembayaran', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'pembayaran_id' => $data['Pembayaran_id'],
			'metode_pembayaran' => $data['Metode_Pembayaran'],
            'total_pembayaran' => $data['Total_Pembayaran'],
            'tanggal_pembayaran' => $data['Tanggal_Pembayaran']
		);
		$this->db->where('pembayaran_id',$data['pembayaran_id']);
		$this->db->update('datapembayaran', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('pembayaran_id', $id);
		$this->db->delete('datapembayaran');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('metode_pembayaran', $nama);
		$data = $this->db->get('datapembayaran');
		return $data->num_rows();
	}

  
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */