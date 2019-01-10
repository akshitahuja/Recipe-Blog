<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Welcomemodel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login($data) {
		try {
			$this->db->where($data);
			$qr = $this->db->get('users');
			$cqr = $qr->num_rows();
			
			if ($cqr != 0) {
				$res = $qr->row();
				if ($res->usertype == 'SuperAdmin') {
					return $res;
				}
				else {
					$qr2 = $this->db->get('expiry');
					$res2 = $qr2->row();
					
					$end_str = strtotime($res2->end_date);
					$cur_date = date("Y-m-d");
					$cur_str = strtotime($cur_date);
					
					if ($cur_str <= $end_str){
						return $res;
					}
					else {
						return false;
					}
				}
			}
			else {
				return false;
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
	
	public function update_password($old_pass, $new_pass) {
		try {
			$login_id = $this->session->userdata['logged_in']['user_id'];
			$this->db->where('user_id', $login_id);
			$qr = $this->db->get('users');
			$res = $qr->row();
			
			if ($res->userpass === $old_pass) {
				$this->db->set(array('userpass'=>$new_pass));
				$this->db->where('user_id', $login_id);
				$this->db->update('users');
				
				return true;
			}
			else {
				return false;
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_category_count() {
		try {
			$qr = $this->db->get('category');
			$cqr = $qr->num_rows();

			return $cqr;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_post_count() {
		try {
			$qr = $this->db->get('post');
			$cqr = $qr->num_rows();

			return $cqr;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
}
?>