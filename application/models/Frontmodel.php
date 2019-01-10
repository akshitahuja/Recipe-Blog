<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Frontmodel extends CI_Model {
	
	public function get_all_categories() {
		try {
			$this->db->order_by('cat_position ASC');
			$this->db->limit(14);
			$qr = $this->db->get('category');
			$res = $qr->result_array();
			
			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}	

	public function get_visitor_count() {
		try {
			$qr = $this->db->get('counter');
			$res = $qr->row();
			
			$new_count = $res->count + 1;
			
			$this->db->set(array('count' => $new_count));
			$this->db->update('counter');
			
			return $new_count;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_latest_recipies() {
		try {
			$this->db->order_by('post_date_time DESC');
			$this->db->limit(15);
			$this->db->join('post_cat', 'post.post_id=post_cat.pc_post_id');
			$this->db->join('category', 'post_cat.pc_cat_id=category.cat_id');
			$this->db->group_by('post_cat.pc_post_id');
			$this->db->select('post.post_id, post.post_title, post.post_content, post.post_permalink, post.post_featured_image, post.post_date_time, category.cat_name as post_cat_name, category.cat_permalink as post_cat_permalink');
			$qr = $this->db->get('post');
			$res = $qr->result_array();

			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_recent_posts($per_page) {
		try {
			$this->db->order_by('post_date_time DESC');
			$this->db->limit(15);
			$this->db->join('post_cat', 'post.post_id=post_cat.pc_post_id');
			$this->db->join('category', 'post_cat.pc_cat_id=category.cat_id');
			$this->db->group_by('post_cat.pc_post_id');
			$this->db->select('post.post_id, post.post_title, post.post_content, post.post_permalink, post.post_featured_image, post.post_date_time, category.cat_name as post_cat_name, category.cat_permalink as post_cat_permalink');
			$qr = $this->db->get('post', $per_page, $this->uri->segment(4));
			$res = $qr->result_array();

			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_breakfast_recipies() {
		try {
			$this->db->order_by('pc_post_id DESC');
			$this->db->limit(4);
			$this->db->where('pc_cat_id', 3);
			$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
			$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
			$qr = $this->db->get('post_cat');
			$res = $qr->result_array();
			
			$a=0;
			$breakfast = array();
			foreach ($res as $row) {
				$this->db->where('post_id', $row['pc_post_id']);
				$qr2 = $this->db->get('post');
				$res2 = $qr2->row();
				
				$breakfast[$a]['post_id'] = $res2->post_id;
				$breakfast[$a]['post_title'] = $res2->post_title;
				$breakfast[$a]['post_featured_image'] = $res2->post_featured_image;
				$breakfast[$a]['post_cat_name'] = $row['cat_name'];
				$breakfast[$a]['post_cat_permalink'] = $row['cat_permalink'];
				$breakfast[$a]['post_permalink'] = $res2->post_permalink;
				$breakfast[$a]['post_date_time'] = $res2->post_date_time;
				$a++;
			}
			
			return $breakfast;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_lunch_recipies() {
		try {
			$this->db->order_by('pc_post_id DESC');
			$this->db->limit(4);
			$this->db->where('pc_cat_id', 4);
			$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
			$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
			$qr = $this->db->get('post_cat');
			$res = $qr->result_array();
			
			$a=0;
			$lunch = array();
			foreach ($res as $row) {
				$this->db->where('post_id', $row['pc_post_id']);
				$qr2 = $this->db->get('post');
				$res2 = $qr2->row();
				
				$lunch[$a]['post_id'] = $res2->post_id;
				$lunch[$a]['post_title'] = $res2->post_title;
				$lunch[$a]['post_featured_image'] = $res2->post_featured_image;
				$lunch[$a]['post_cat_name'] = $row['cat_name'];
				$lunch[$a]['post_cat_permalink'] = $row['cat_permalink'];
				$lunch[$a]['post_permalink'] = $res2->post_permalink;
				$lunch[$a]['post_date_time'] = $res2->post_date_time;
				$a++;
			}
			
			return $lunch;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_chinese_recipies() {
		try {
			$this->db->order_by('pc_post_id DESC');
			$this->db->limit(7);
			$this->db->where('pc_cat_id', 6);
			$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
			$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
			$qr = $this->db->get('post_cat');
			$res = $qr->result_array();
			
			$a=0;
			$chinese = array();
			foreach ($res as $row) {
				$this->db->where('post_id', $row['pc_post_id']);
				$qr2 = $this->db->get('post');
				$res2 = $qr2->row();
				
				$chinese[$a]['post_id'] = $res2->post_id;
				$chinese[$a]['post_title'] = $res2->post_title;
				$chinese[$a]['post_featured_image'] = $res2->post_featured_image;
				$chinese[$a]['post_cat_name'] = $row['cat_name'];
				$chinese[$a]['post_cat_permalink'] = $row['cat_permalink'];
				$chinese[$a]['post_permalink'] = $res2->post_permalink;
				$chinese[$a]['post_date_time'] = $res2->post_date_time;
				$a++;
			}
			
			return $chinese;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_sweets_recipies() {
		try {
			$this->db->order_by('pc_post_id DESC');
			$this->db->limit(5);
			$this->db->where('pc_cat_id', 2);
			$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
			$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
			$qr = $this->db->get('post_cat');
			$res = $qr->result_array();
			
			$a=0;
			$sweets = array();
			foreach ($res as $row) {
				$this->db->where('post_id', $row['pc_post_id']);
				$qr2 = $this->db->get('post');
				$res2 = $qr2->row();
				
				$sweets[$a]['post_id'] = $res2->post_id;
				$sweets[$a]['post_title'] = $res2->post_title;
				$sweets[$a]['post_featured_image'] = $res2->post_featured_image;
				$sweets[$a]['post_cat_name'] = $row['cat_name'];
				$sweets[$a]['post_cat_permalink'] = $row['cat_permalink'];
				$sweets[$a]['post_permalink'] = $res2->post_permalink;
				$sweets[$a]['post_date_time'] = $res2->post_date_time;
				$a++;
			}
			
			return $sweets;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_dinner_recipies() {
		try {
			$this->db->order_by('pc_post_id DESC');
			$this->db->limit(3);
			$this->db->where('pc_cat_id', 5);
			$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
			$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
			$qr = $this->db->get('post_cat');
			$res = $qr->result_array();
			
			$a=0;
			$dinner = array();
			foreach ($res as $row) {
				$this->db->where('post_id', $row['pc_post_id']);
				$qr2 = $this->db->get('post');
				$res2 = $qr2->row();
				
				$dinner[$a]['post_id'] = $res2->post_id;
				$dinner[$a]['post_title'] = $res2->post_title;
				$dinner[$a]['post_featured_image'] = $res2->post_featured_image;
				$dinner[$a]['post_cat_name'] = $row['cat_name'];
				$dinner[$a]['post_cat_permalink'] = $row['cat_permalink'];
				$dinner[$a]['post_permalink'] = $res2->post_permalink;
				$dinner[$a]['post_date_time'] = $res2->post_date_time;
				$a++;
			}
			
			return $dinner;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_popular_posts() {
		try {
			$this->db->order_by('post_views DESC');
			$this->db->limit(8);
			$qr = $this->db->get('post');
			$res = $qr->result_array();
			
			$a=0;
			$popular = array();
			foreach ($res as $row) {
				$popular[$a]['post_id'] = $row['post_id'];
				$popular[$a]['post_title'] = $row['post_title'];
				$popular[$a]['post_featured_image'] = $row['post_featured_image'];
				$popular[$a]['post_permalink'] = $row['post_permalink'];
				$popular[$a]['post_date_time'] = $row['post_date_time'];
				$a++;
			}
			
			return $popular;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_category_posts($cat_permalink, $per_page) {
		try {
			$this->db->where('cat_permalink', $cat_permalink);
			$qr = $this->db->get('category');
			$cqr = $qr->num_rows();

			if ($cqr != 0) {
				$res = $qr->row();

				$this->db->order_by('pc_post_id DESC');
				$this->db->where('pc_cat_id', $res->cat_id);
				$this->db->select('pc_post_id,category.cat_name,category.cat_permalink');
				$this->db->join('category', 'category.cat_id=post_cat.pc_cat_id');
				if ($per_page == 'none') {
					$qr2 = $this->db->get('post_cat');
				}
				else {
					$qr2 = $this->db->get('post_cat', $per_page, $this->uri->segment(5));
				}
				
				$res2 = $qr2->result_array();
				
				$a=0;
				$posts = array();
				foreach ($res2 as $row2) {
					$this->db->where('post_id', $row2['pc_post_id']);
					$qr3 = $this->db->get('post');
					$res3 = $qr3->row();
					
					$posts[$a]['post_id'] = $res3->post_id;
					$posts[$a]['post_title'] = $res3->post_title;
					$posts[$a]['post_content'] = $res3->post_content;
					$posts[$a]['post_featured_image'] = $res3->post_featured_image;
					$posts[$a]['post_cat_name'] = $row2['cat_name'];
					$posts[$a]['post_cat_permalink'] = $row2['cat_permalink'];
					$posts[$a]['post_permalink'] = $res3->post_permalink;
					$posts[$a]['post_date_time'] = $res3->post_date_time;
					$a++;
				}
				
				return $posts;
			}
			else {
				return false;
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_all_featured_posts() {
		try {
			$this->db->order_by('post_date_time DESC');
			$this->db->where('post_featured', 1);
			$this->db->limit(4);
			$qr = $this->db->get('post');
			$res = $qr->result_array();

			return $res;
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function get_post($post_permalink) {
		try {
			$this->db->where('post_permalink', $post_permalink);
			$this->db->select('post.*, category.cat_name, category.cat_permalink');
			$this->db->join('post_cat', 'post.post_id=post_cat.pc_post_id');
			$this->db->join('category', 'post_cat.pc_cat_id=category.cat_id');
			$qr = $this->db->get('post');
			$cqr = $qr->num_rows();

			if ($cqr != 0) {
				$res = $qr->result_array();

				$post = array();

				$post[0]['post_id'] = $res[0]['post_id'];
				$post[0]['post_title'] = $res[0]['post_title'];
				$post[0]['post_permalink'] = $res[0]['post_permalink'];
				$post[0]['post_featured_image'] = $res[0]['post_featured_image'];
				$post[0]['post_content'] = $res[0]['post_content'];
				$post[0]['post_featured'] = $res[0]['post_featured'];
				$post[0]['post_views'] = $res[0]['post_views'] + 1;
				$post[0]['post_date_time'] = $res[0]['post_date_time'];

				$a=0;
				foreach ($res as $row) {
					$post[0]['post_categories'][$a]['post_cat_name'] = $row['cat_name'];
					$post[0]['post_categories'][$a]['post_cat_permalink'] = $row['cat_permalink'];
					$a++;
				}

				$this->db->set('post_views', $res[0]['post_views'] + 1);
				$this->db->where('post_permalink', $post_permalink);
				$this->db->update('post');

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

	public function get_all_related_posts($post_permalink) {
		try {
			$this->db->where('post_permalink', $post_permalink);
			$this->db->select('post.post_id, post_cat.pc_cat_id');
			$this->db->join('post_cat', 'post.post_id=post_cat.pc_post_id');
			$this->db->join('category', 'post_cat.pc_cat_id=category.cat_id');
			$this->db->group_by('post_cat.pc_post_id');
			$qr = $this->db->get('post');
			$cqr = $qr->num_rows();

			if ($cqr != 0) {
				$res = $qr->row();
				$this->db->where('pc_post_id !=', $res->post_id);
				$this->db->where('pc_cat_id', $res->pc_cat_id);
				$this->db->limit(3);
				$this->db->select('pc_post_id');
				$qr2 = $this->db->get('post_cat');
				$cqr2 = $qr2->num_rows();

				if ($cqr2 != 0) {
					$res2 = $qr2->result_array();

					$related_posts = array();

					$a=0;
					foreach ($res2 as $row2) {
						$this->db->where('post_id', $row2['pc_post_id']);
						$qr3 = $this->db->get('post');
						$res3 = $qr3->row();

						$related_posts[$a]['post_id'] = $res3->post_id;
						$related_posts[$a]['post_title'] = $res3->post_title;
						$related_posts[$a]['post_permalink'] = $res3->post_permalink;
						$related_posts[$a]['post_featured_image'] = $res3->post_featured_image;
						$a++;
					}

					return $related_posts;
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
}
?>