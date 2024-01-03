<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_model extends CI_Model {

	public function select_all() {
		$this->db->select('*');
		$this->db->from('penyewaan AS lp ');
		// $this->db->join('user AS us ', 'lp.id_user = us.id_user');		
		// $this->db->join('dokter AS dk ', 'lp.id_dokter = dk.id_dokter');	
		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('Penyewaan_id',$id);
		$data = $this->db->get("penyewaan");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'tanggal_sewa' => $data['Tanggal_sewa'],
			'tanggal_kembali' => $data['Tanggal_kembali'],
			'harga_sewa' => $data['Harga_sewa'],
			'denda' => $data['Denda'],
            'jaminan' => $data['Jaminan']
            
		);
		$this->db->insert('penyewaan', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('penyewaan', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'tanggal_sewa' => $data['Tanggal_sewa'],
			'tanggal_kembali' => $data['Tanggal_kembali'],
			'harga_sewa' => $data['Harga_sewa'],
			'denda' => $data['Denda'],
            'jaminan' => $data['Jaminan']
		);
		$this->db->where('Penyewaan_id',$data['Penyewaan_id']);
		$this->db->update('penyewaan', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('Penyewaan_id', $id);
		$this->db->delete('penyewaan');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Penyewaan_id', $nama);
		$data = $this->db->get('penyewaan');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('penyewaan');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */