<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Expirymodel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_expiry() {
		try {
			$qr = $this->db->get('expiry');
			$res = $qr->row();
			
			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
	
	public function update_expiry($data) {
		try {
			$this->db->where('id', '1');
			$this->db->set($data);
			$qr = $this->db->update('expiry');
			
			return true;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
}
?>