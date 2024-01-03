<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasepeda_model extends CI_Model
{

	public function select_all()
	{
	
		$data = $this->db->get("datasepeda");
		return $data->result();
	}
	
	public function select_by_id($id)
	{
		$this->db->where('sepeda_id', $id);
		$data = $this->db->get("datasepeda");
		return $data->row();
	}

	public function insert($data)
	{
		$insertData = array(
			'merk' => $data['Merk'],
			'model' => $data['Model'],
			'harga' => $data['Harga'],
			'stok' => $data['Stok']
		);

	// 	if (array_key_exists('Gambar', $data)) {
	// 		$insertData['gambar'] = $data['Gambar'];
	// 	}

	// 	$this->db->insert('datasepeda', $insertData);
	// 	return $this->db->affected_rows();
	// }

	public function insert_batch($data)
	{
		$this->db->insert_batch('datasepeda', $data);
		return $this->db->affected_rows();
	}

	public function update($data)
	{
		$updateData = array(
			'merk' => $data['Merk'],
			'model' => $data['Model'],
			'harga' => $data['Harga'],
			'stok' => $data['Stok']
		);

		// if (array_key_exists('gambar', $data)) {
		// 	$updateData['gambar'] = $data['Gambar'];
		// }

		$this->db->where('sepeda_id', $data['sepeda_id']);
		$this->db->update('datasepeda', $updateData);
		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->where('sepeda_id', $id);
		$this->db->delete('datasepeda');
		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('Merk', $nama);
		$data = $this->db->get('datasepeda');
		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('datasepeda');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */