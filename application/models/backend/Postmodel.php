<?php

defined('BASEPATH') OR exit('No direct scripting allowed');

class Postmodel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function insert_post($data, $categories) {
		try {
			$this->db->trans_off();
			$this->db->trans_begin();	

			$this->db->set($data);
			$qr = $this->db->insert('post');
			$res = $this->db->affected_rows();

			if ($res) {
				$post_id = $this->db->insert_id();
				
				$flag=1;
				foreach ($categories as $category) {
					if ($category) {
						$category = htmlspecialchars(strip_tags(trim($category)));
						$data = array(
							'pc_post_id' => $post_id,
							'pc_cat_id' => $category
						);	

						$this->db->set($data);
						$qr2 = $this->db->insert('post_cat');
						$res2 = $this->db->affected_rows();

						if (!$res2) {
							$flag=0;
						}
					}
					else {
						continue;
					}
				}

				if ($flag == 1) {
					$this->db->trans_commit();
					return true;
				}
				else {
					$this->db->trans_rollback();
					return false;
				}
			}
			else {
				$this->db->trans_rollback();
				return false;
			}
			$this->db->trans_complete();
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
	

	public function get_all_posts() {
		try {
			$this->db->order_by('post_date_time DESC');
			$qr = $this->db->get('post');
			$res = $qr->result_array();

			$posts = array();
			$a=0;
			foreach ($res as $row) {
				$this->db->where('pc_post_id', $row['post_id']);
				$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
				$this->db->select('category.cat_name');
				$qr2 = $this->db->get('post_cat');
				$res2 = $qr2->result_array();	

				$categories = '';
				foreach ($res2 as $row2) {
					if ($categories) {
						$categories .= ", ".$row2['cat_name'];
					}
					else {
						$categories .= $row2['cat_name'];
					}
				}

				$posts[$a]['post_id'] = $row['post_id'];
				$posts[$a]['post_title'] = $row['post_title'];
				$posts[$a]['post_date_time'] = $row['post_date_time'];
				$posts[$a]['post_categories'] = $categories;
				$a++;
			}

			return $posts;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_post_by_id($id) {
		try {
			$this->db->where('post_id', $id);
			$qr = $this->db->get('post');
			$cqr = $qr->num_rows();

			if ($cqr != 0) {
				$res = $qr->result_array();

				$a=0;
				$post = array();
				foreach ($res as $row) {
					$this->db->where('pc_post_id', $row['post_id']);
					$qr2 = $this->db->get('post_cat');
					$res2 = $qr2->result_array();	

					$categories = array();
					$b=0;
					foreach ($res2 as $row2) {
						$categories[$b] = $row2['pc_cat_id'];
						$b++;
					}

					$post[$a]['post_id'] = $row['post_id'];
					$post[$a]['post_title'] = $row['post_title'];
					$post[$a]['post_permalink'] = $row['post_permalink'];
					$post[$a]['post_featured_image'] = $row['post_featured_image'];
					$post[$a]['post_content'] = $row['post_content'];
					$post[$a]['post_featured'] = $row['post_featured'];
					$post[$a]['post_categories'] = $categories;
					$a++;
				}

				return $post;
			}
			else {
				return false;
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function update_post($data, $categories, $editid) {
		try {
			$this->db->trans_off();
			$this->db->trans_begin();

			$this->db->where('post_permalink', $data['post_permalink']);
			$this->db->where('post_id !=', $editid);
			$qr = $this->db->get('post');
			$cqr = $qr->num_rows();

			if ($cqr == 0) {
				$this->db->set($data);
				$this->db->where('post_id', $editid);
				$qr = $this->db->update('post');
				$res = $this->db->affected_rows();

				$post_id = $editid;
				$this->db->where('pc_post_id', $post_id);
				$this->db->delete('post_cat');

				$flag=1;
				foreach ($categories as $category) {
					if ($category) {
						$category = htmlspecialchars(strip_tags(trim($category)));

						$data = array(
							'pc_post_id' => $post_id,
							'pc_cat_id' => $category
						);	

						$this->db->set($data);
						$qr2 = $this->db->insert('post_cat');
						$res2 = $this->db->affected_rows();

						if (!$res2) {
							$flag=0;
						}
					}
					else {
						continue;
					}
				}

				if ($flag == 1) {
					$this->db->trans_commit();
					return true;
				}
				else {
					$this->db->trans_rollback();
					return false;
				}
			}
			else {
				$this->db->trans_rollback();
				return false;
			}
			$this->db->trans_complete();
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function delete_post($id) {
		try {
			$this->db->where('post_id', $id);
			$this->db->select('post_featured_image');
			$qr = $this->db->get('post');
			$res = $qr->row();
			if ($res->post_featured_image != 'recipebowl.jpg') {
				unlink('./post-image/'.$res->post_featured_image);
				unlink('./post-image/thumbs/'.$res->post_featured_image);
			}
			$this->db->where('post_id', $id);
			$this->db->delete('post');

			$this->db->where('pc_post_id', $id);
			$this->db->delete('post_cat');

			return true;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
}
?>