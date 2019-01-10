<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!is_logged_in()) {
			redirect(base_url() . BACKEND);
		}
		$this->load->model('backend/Categorymodel','cm');
		date_default_timezone_set("Asia/Kolkata");
	}

	/* function to open add category page */
	public function add_category() {
		try {
			$data['tab']='AddCategory';
			$data['bcum']='Add Category';
			$data['main']='category';
			$data['mode']='add';
			$this->load->view('backend/header', $data);
			$this->load->view('backend/add-category');
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to add category */
	public function insert_category() {
		try{
            $this->form_validation->set_rules('category', 'Category', 'trim|required');
            $this->form_validation->set_rules('permalink', 'Permalink', 'trim|required|is_unique[category.cat_permalink]');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $data['tab']='AddCategory';
				$data['bcum']='Add Category';
				$data['main']='category';
				$data['mode']='add';
				$this->load->view('backend/header', $data);
				$this->load->view('backend/add-category');
				$this->load->view('backend/footer');
            }
            else{
                $category = htmlspecialchars(strip_tags(trim($this->input->post('category'))));
                $permalink = htmlspecialchars(strip_tags(trim($this->input->post('permalink'))));
                $position = htmlspecialchars(strip_tags(trim($this->input->post('position'))));

				$data = array(
					'cat_name' => $category,
					'cat_permalink' => $permalink,
					'cat_position' => $position,
					'cat_date_time' => date('Y-m-d H:i:s', time())
				);

				$res = $this->cm->insert_category($data);

				if ($res) {
					$this->session->set_userdata('msg', 'Category Added Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_CATEGORY);
				}
				else {
					$this->session->set_userdata('msg', 'Could not add category');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . ADD_CATEGORY);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}

	/* function to open view category page */
	public function view_category() {
		try {
			$data['tab']='ViewCategory';
			$data['bcum']='View Categories';
			$data['main']='category';
			$data['mode']='view';	

			$datas['categories'] = $this->cm->get_all_categories();

			$this->load->view('backend/header', $data);
			$this->load->view('backend/view-category', $datas);
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to open edit category page */
	public function edit_category() {
		try {
			$data['tab']='AddCategory';
			$data['bcum']='Edit Category';
			$data['main']='category';
			$data['mode']='edit';

			$id = base64_decode(htmlspecialchars(strip_tags(trim($this->uri->segment(4)))));

			if ($datas['category'] = $this->cm->get_category_by_id($id)) {
				$this->load->view('backend/header', $data);
				$this->load->view('backend/add-category', $datas);
				$this->load->view('backend/footer');
			}
			else {
				$this->session->set_userdata('msg', 'Something went wrong');
				$this->session->set_userdata('status', 'fail');
				redirect(base_url() . VIEW_CATEGORY);
			}
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to update category */
	public function update_category() {
		try{
            $this->form_validation->set_rules('category', 'Category', 'trim|required');
            $this->form_validation->set_rules('permalink', 'Permalink', 'trim|required');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $data['tab']='AddCategory';
				$data['bcum']='Edit Category';
				$data['main']='category';
				$data['mode']='edit';

				$editid = htmlspecialchars(strip_tags(trim($this->input->post('editid'))));

				if ($datas['category'] = $this->cm->get_category_by_id($editid)) {
					$this->load->view('backend/header', $data);
					$this->load->view('backend/add-category', $datas);
					$this->load->view('backend/footer');
				}
				else {
					$this->session->set_userdata('msg', 'Something went wrong');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . VIEW_CATEGORY);
				}
            }
            else{
                $category = htmlspecialchars(strip_tags(trim($this->input->post('category'))));
                $permalink = htmlspecialchars(strip_tags(trim($this->input->post('permalink'))));
                $position = htmlspecialchars(strip_tags(trim($this->input->post('position'))));
				$editid = htmlspecialchars(strip_tags(trim($this->input->post('editid'))));

				$data = array(
					'cat_name' => $category,
					'cat_permalink' => $permalink,
					'cat_position' => $position
				);

				$res = $this->cm->update_category($data, $editid);

				if ($res) {
					$this->session->set_userdata('msg', 'Category Updated Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_CATEGORY);
				}
				else {
					$this->session->set_userdata('msg', 'Could not update category');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . VIEW_CATEGORY);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}

	/* function to delete category */
	public function delete_category() {
		try {
			$id = base64_decode(htmlspecialchars(strip_tags(trim($this->uri->segment(4)))));

			if ($id) {
				$res = $this->cm->delete_category($id);

				if ($res) {
					$this->session->set_userdata('msg', 'Category Deleted Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_CATEGORY);
				}
				else {
					$this->session->set_userdata('msg', 'Could not delete category');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_CATEGORY);
				}
			}
			else {
				$this->session->set_userdata('msg', 'Something went wrong');
				$this->session->set_userdata('status', 'fail');
				redirect(base_url() . VIEW_CATEGORY);
			}
		}
		catch (Exception $ex) {
			$ex->getMessage();
		}
	}
}