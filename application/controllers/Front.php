<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Frontmodel', 'fm');
	}

	public function index() {
		try {
			$data['page'] = 'index';
			$data['categories'] = $this->fm->get_all_categories();
			$data['latest_recipies'] = $this->fm->get_all_latest_recipies();
			$datas['breakfast_recipies'] = $this->fm->get_all_breakfast_recipies();
			$datas['lunch_recipies'] = $this->fm->get_all_lunch_recipies();
			$datas['chinese_recipies'] = $this->fm->get_all_chinese_recipies();
			$datas['sweets_recipies'] = $this->fm->get_all_sweets_recipies();
			$datas['dinner_recipies'] = $this->fm->get_all_dinner_recipies();
			$datas['popular_posts'] = $this->fm->get_all_popular_posts();

			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'front/index/pagination';
			$config['total_rows'] = $this->db->get('post')->num_rows();
			$config['next_link'] = '>>';
			$config['prev_link'] = '<<';
			$config['uri_segment'] = 4;
			$config['per_page'] = 8;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$datas['recent_posts'] = $this->fm->get_all_recent_posts($config['per_page']);

			$data2['featured_posts'] = $this->fm->get_all_featured_posts();
			$data2['visitor_count'] = $this->fm->get_visitor_count();

			$this->load->view('frontend/includes/header', $data);
			$this->load->view('frontend/index', $datas);
			$this->load->view('frontend/includes/footer', $data2);
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function category() {
		try {
			$data['page'] = 'category';
			$data['categories'] = $this->fm->get_all_categories();
			$data['latest_recipies'] = $this->fm->get_all_latest_recipies();
			$datas['sweets_recipies'] = $this->fm->get_all_sweets_recipies();

			$category_permalink = htmlspecialchars(trim(strip_tags($this->uri->segment(3))));
			$cat_posts = $this->fm->get_all_category_posts($category_permalink, 'none');

			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'front/category/'.$category_permalink.'/pagination';
			$config['total_rows'] = sizeof($cat_posts);
			$config['next_link'] = '>>';
			$config['prev_link'] = '<<';
			$config['uri_segment'] = 5;
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['cat_posts'] = $this->fm->get_all_category_posts($category_permalink, $config['per_page']);

			$data2['featured_posts'] = $this->fm->get_all_featured_posts();
			$data2['visitor_count'] = $this->fm->get_visitor_count();

			if ($data['cat_posts']) {
				$this->load->view('frontend/includes/header', $data);
				$this->load->view('frontend/category', $datas);
				$this->load->view('frontend/includes/footer', $data2);
			}
			else {
				redirect(base_url());
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function post() {
		try {
			$data['page'] = 'post';
			$data['categories'] = $this->fm->get_all_categories();
			$data['latest_recipies'] = $this->fm->get_all_latest_recipies();
			$datas['sweets_recipies'] = $this->fm->get_all_sweets_recipies();
			$datas['popular_posts'] = $this->fm->get_all_popular_posts();

			$permalink = htmlspecialchars(trim(strip_tags($this->uri->segment(3))));

			$datas['related_posts'] = $this->fm->get_all_related_posts($permalink);

			$data2['featured_posts'] = $this->fm->get_all_featured_posts();
			$data2['visitor_count'] = $this->fm->get_visitor_count();

			if ($data['post'] = $this->fm->get_post($permalink)) {
				$this->load->view('frontend/includes/header', $data);
				$this->load->view('frontend/post', $datas);
				$this->load->view('frontend/includes/footer', $data2);
			}
			else {
				redirect(base_url());
			}
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public function error404() {
		try {
			$data['page'] = 'error';
			$data['categories'] = $this->fm->get_all_categories();
			$data['latest_recipies'] = $this->fm->get_all_latest_recipies();
			$datas['sweets_recipies'] = $this->fm->get_all_sweets_recipies();

			$data2['featured_posts'] = $this->fm->get_all_featured_posts();
			$data2['visitor_count'] = $this->fm->get_visitor_count();

			$this->load->view('frontend/includes/header', $data);
			$this->load->view('frontend/error404', $datas);
			$this->load->view('frontend/includes/footer', $data2);
		}
		catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
}
?>