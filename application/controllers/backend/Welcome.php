<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('backend/Welcomemodel','wm');
	}

	/* function to open backend login page */
	public function index() {
		$this->load->view('backend/index');
	}
	
	/* function to login user in backend */
	public function login() {
		try{
            $this->form_validation->set_rules('users_name', 'Username', 'trim|required');
            $this->form_validation->set_rules('users_password', 'Password', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $this->load->view('backend/index');
            }
            else{
                $username = htmlspecialchars(strip_tags(trim($this->input->post('users_name'))));
                $password = sha1(htmlspecialchars(strip_tags(trim($this->input->post('users_password')))));
				
				$data = array(
					'username' => $username,
					'userpass' => $password,
				);
				
				$res = $this->wm->login($data);
				
				if ($res) {
					$sess_data = array(
						'user_id' => $res->user_id,
						'name' => $res->name,
						'username' => $res->username,
						'usertype' => $res->usertype
					);
					$this->session->set_userdata('logged_in', $sess_data);
					redirect(base_url() . DASHBOARD);
				}
				else {
					$this->session->set_userdata('msg', 'Wrong Credentials or your software is expired');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . BACKEND);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}
	
	/* function to open backend dashboard page */
	public function dashboard() {
		if (!is_logged_in()) {
			redirect(base_url() . BACKEND);
		}
		try {
			$data['tab']='dashboard';
			$data['bcum']='Dashboard';
			$data['main']='dashboard';

			$datas['category_count'] = $this->wm->get_category_count();
			$datas['post_count'] = $this->wm->get_post_count();
			
			$this->load->view('backend/header', $data);
			$this->load->view('backend/dashboard', $datas);
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
	
	/* function to logout from backend */
	public function logout() {
		try {
			$this->session->unset_userdata('logged_in');
			redirect(base_url() . BACKEND);
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
	
	/* function to open backend change password page */
	public function change_password() {
		if (!is_logged_in()) {
			redirect(base_url() . BACKEND);
		}
		try {
			$data['tab']='change_password';
			$data['bcum']='Change Password';
			$data['main']='change_password';
			
			$this->load->view('backend/header', $data);
			$this->load->view('backend/change-password');
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
	
	/* function to update password */
	public function update_password() {
		if (!is_logged_in()) {
			redirect(base_url() . BACKEND);
		}
		try{
            $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
            $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_new_pass', 'Confirm Password', 'trim|required|matches[new_pass]');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $data['tab']='change_password';
				$data['bcum']='Change Password';
				$data['main']='change_password';
				
				$this->load->view('backend/header', $data);
				$this->load->view('backend/change-password');
				$this->load->view('backend/footer');
            }
            else{
                $old_pass = sha1(htmlspecialchars(strip_tags(trim($this->input->post('old_pass')))));
                $new_pass = sha1(htmlspecialchars(strip_tags(trim($this->input->post('new_pass')))));
                $confirm_new_pass = sha1(htmlspecialchars(strip_tags(trim($this->input->post('confirm_new_pass')))));
				
				$res = $this->wm->update_password($old_pass, $new_pass);
				
				if ($res) {
					$this->session->set_userdata('msg', 'Password Updated Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . BACKEND_LOGOUT);
				}
				else {
					$this->session->set_userdata('msg', 'Old Password does not match');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . CHANGE_PASSWORD);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}
}
