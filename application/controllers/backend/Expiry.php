<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Expiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!is_logged_in_super()) {
			redirect(base_url() . BACKEND);
		}
		$this->load->model('backend/Expirymodel','em');
	}

	/* function to open edit expiry page */
	public function edit_expiry() {
		try {
			$data['tab']='EditExpiry';
			$data['bcum']='Expiry';
			$data['main']='expiry';
			$data['mode']='edit';
			
			$datas['expiry'] = $this->em->get_expiry();
			
			$this->load->view('backend/header', $data);
			$this->load->view('backend/edit-expiry', $datas);
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
	
	/* function to update expiry */
	public function update_expiry() {
		try{
            $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $data['tab']='EditExpiry';
				$data['bcum']='Expiry';
				$data['main']='expiry';
				$data['mode']='edit';
				
				$datas['expiry'] = $this->em->get_expiry();
				
				$this->load->view('backend/header', $data);
				$this->load->view('backend/edit-expiry', $datas);
				$this->load->view('backend/footer');
            }
            else{
                $start_date = htmlspecialchars(strip_tags(trim($this->input->post('start_date'))));
                $end_date = htmlspecialchars(strip_tags(trim($this->input->post('end_date'))));
				
				$data = array(
					'start_date' => $start_date,
					'end_date' => $end_date,
				);
				
				$res = $this->em->update_expiry($data);
				
				if ($res) {
					$this->session->set_userdata('msg', 'Expiry Updated Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . EDIT_EXPIRY);
				}
				else {
					$this->session->set_userdata('msg', 'Wrong Credentials or your software is expired');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . EDIT_EXPIRY);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}
}
