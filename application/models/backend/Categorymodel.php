<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Categorymodel extends CI_Model {

	public function insert_category($data) {
		try {
			$this->db->set($data);
			$qr = $this->db->insert('category');
			$res = $this->db->affected_rows();	

			if ($res) {
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

	public function get_all_categories() {
		try {
			$this->db->order_by('cat_position ASC');
			$qr = $this->db->get('category');
			$res = $qr->result_array();

			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_category_by_id($id) {
		try {
			$this->db->where('cat_id', $id);
			$qr = $this->db->get('category');
			$cqr = $qr->num_rows();

			if ($cqr != 0) {
				$res = $qr->result_array();
				return $res;
			}
			else {
				return false;
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function update_category($data, $editid) {
		try {
			$this->db->where('cat_permalink', $data['cat_permalink']);
			$this->db->where('cat_id !=', $editid);
			$qr = $this->db->get('category');
			$cqr = $qr->num_rows();

			if ($cqr == 0) {
				$this->db->where('cat_id', $editid);
				$this->db->set($data);
				$qr = $this->db->update('category');
				$res = $this->db->affected_rows();

				if ($res) {
					return true;
				}
				else {
					return false;
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

	public function delete_category($id) {
		try {
			$this->db->where('cat_id', $id);
			$qr = $this->db->delete('category');
			$res = $this->db->affected_rows();

			if ($res) {
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
}
?>