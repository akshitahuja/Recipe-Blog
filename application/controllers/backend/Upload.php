<?php

defined('BASEPATH') OR exit('No direct scripting allowed');



class Upload extends CI_Controller {



	public function __construct() {

		parent::__construct();

		if (!is_logged_in()) {

			redirect(base_url() . BACKEND);

		}

	}



	/* function to open add upload page */

	public function add_upload() {

		try {

			$data['tab']='AddUpload';

			$data['bcum']='Upload Image';

			$data['main']='upload';

			$data['mode']='add';

			

			$this->load->view('backend/header', $data);

			$this->load->view('backend/add-upload');

			$this->load->view('backend/footer');

		}

		catch (Exception $ex) {

			echo $ex->getMessage();

		}

	}

	

	/* function to add upload */

	public function insert_upload() {

		try{
			if (!empty($_FILES['img']['name'])) {
				$config['upload_path'] = './upload-image/';
				$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
				/* $config['encrypt_name'] = TRUE;
				$config['max_size'] = 100;
				$config['max_width'] = 1024;
				$config['max_height'] = 768; */
				$this->load->library('upload', $config);

				$files_count = count($_FILES['img']['name']);

			    for($i=0; $i<$files_count; $i++) {           
			        $_FILES['imgs']['name'] = $_FILES['img']['name'][$i];
			        $_FILES['imgs']['type'] = $_FILES['img']['type'][$i];
			        $_FILES['imgs']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
			        $_FILES['imgs']['error'] = $_FILES['img']['error'][$i];
			        $_FILES['imgs']['size'] = $_FILES['img']['size'][$i];  

			        if ($_FILES['imgs']['name']) {
			        	if ($this->upload->do_upload('imgs')) {
			        		$dataInfo[] = $this->upload->data();
			        	}
			        	else {
			        		continue;
			        	}
			        }
			        else {
			        	continue;
			        }
			    }
			    
			    if ($dataInfo) {
		    		$this->session->set_userdata('msg', 'Images Upload Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . ADD_UPLOAD);
			    }
			    else {
		    		$this->session->set_userdata('msg', 'Please upload image');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . ADD_UPLOAD);
			    }
			}
			else {
				$this->session->set_userdata('msg', 'Please upload image');
				$this->session->set_userdata('status', 'fail');
				redirect(base_url() . ADD_UPLOAD);
			}
        } 

		catch (Exception $ex) {

            echo $ex->getMessage();

        }

	}

}

