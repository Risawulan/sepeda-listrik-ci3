<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk_model extends CI_Model {
    public function get_sepeda() {
        $query = $this->db->get('produk');
        return $query->result_array();
    }	

    public function get_sepeda_by_id($id = null)
    {
       if ($id) {
                $this->db->where('id', $id);
        }
        return $this->db->get('produk')->result_array();
    }
}

