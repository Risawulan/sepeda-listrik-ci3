<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

    public function get_user_by_email($email) {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row_array(); 
    }
	
}

