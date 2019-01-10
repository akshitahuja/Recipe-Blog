<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!is_logged_in()) {
			redirect(base_url() . BACKEND);
		}
		$this->load->model('backend/Postmodel','pm');
		$this->load->model('backend/Categorymodel','cm');
		date_default_timezone_set("Asia/Kolkata");
	}

	/* function to open add post page */
	public function add_post() {
		try {
			$data['tab']='AddPost';
			$data['bcum']='Add Post';
			$data['main']='post';
			$data['mode']='add';

			$datas['categories'] = $this->cm->get_all_categories();

			$this->load->view('backend/header', $data);
			$this->load->view('backend/add-post', $datas);
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to add post */
	public function insert_post() {
		try{
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('permalink', 'Permalink', 'trim|required|is_unique[post.post_permalink]', array('is_unique' => 'Duplicate Permalink'));
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
                $data['tab']='AddPost';
				$data['bcum']='Add Post';
				$data['main']='post';
				$data['mode']='add';
				
				$datas['categories'] = $this->cm->get_all_categories();

				$this->load->view('backend/header', $data);
				$this->load->view('backend/add-post', $datas);
				$this->load->view('backend/footer');
            }
            else {
                $title = htmlspecialchars(strip_tags(trim($this->input->post('title'))));
                $permalink = htmlspecialchars(strip_tags(trim($this->input->post('permalink'))));
                $content = trim($this->input->post('content'));
				$categories = $this->input->post('category');

				if (!empty($categories)) {
					if (!empty($_FILES['featured_image']['name'])) {
						$config['upload_path'] = './post-image/';
						$config['allowed_types'] = 'gif|jpg|bmp|jpeg';
						$config['encrypt_name'] = TRUE;
						/* $config['max_size'] = 100;
						$config['max_width'] = 1024;
						$config['max_height'] = 768; */
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('featured_image')) {
							$this->session->set_userdata('msg', $this->upload->display_errors());
							$this->session->set_userdata('status', 'fail');
							redirect(base_url() . ADD_POST);
						}
						else {
							$datas = array('upload_data' => $this->upload->data());
							$data = array(
								'post_title' => $title,
								'post_permalink' => $permalink,
								'post_content' => $content,
								'post_featured_image' => $datas['upload_data']['file_name'],
								'post_date_time' => date('Y-m-d H:i:s', time())
							);

							if (isset($_POST['featured'])) {
								$data['post_featured'] = 1;
							}

							$res = $this->pm->insert_post($data, $categories);

							if ($res) {
								$pathToImages = $config['upload_path'];
								$pathToThumbs = $config['upload_path'] . 'thumbs/';
								$thumbWidth = 150;
								$fname = $datas['upload_data']['file_name'];
								$dir = opendir($pathToImages);
							    // parse path for the extension
						    	$info = pathinfo($pathToImages . $fname);
							    // continue only if this is a JPEG image
							    
						      	echo "Creating thumbnail for {$fname} <br />";

						      	// load image and get image size
						      	$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
						      	$width = imagesx( $img );
						      	$height = imagesy( $img );

						      	// calculate thumbnail size
						      	$new_width = $thumbWidth;
					     	 	//$new_height = floor( $height * ( $thumbWidth / $width ) );
						      	$new_height = 125;

						      	// create a new temporary image
						      	$tmp_img = imagecreatetruecolor( $new_width, $new_height );

						      	// copy and resize old image into new image 
						      	imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

						      	// save thumbnail into a file
						      	imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
								  // close the directory
							  	closedir( $dir );

								$this->session->set_userdata('msg', 'Post Added Successfully');
								$this->session->set_userdata('status', 'success');
								redirect(base_url() . VIEW_POST);
							}
							else {
								$this->session->set_userdata('msg', 'Could not add post');
								$this->session->set_userdata('status', 'fail');
								redirect(base_url() . ADD_POST);
							}
						}
					}
					else {
						$data = array(
							'post_title' => $title,
							'post_permalink' => $permalink,
							'post_content' => $content,
							'post_featured_image' => 'recipebowl.jpg',
							'post_date_time' => date('Y-m-d H:i:s', time())
						);

						if (isset($_POST['featured'])) {
							$data['post_featured'] = 1;
						}

						$res = $this->pm->insert_post($data, $categories);

						if ($res) {
							$this->session->set_userdata('msg', 'Post Added Successfully');
							$this->session->set_userdata('status', 'success');
							redirect(base_url() . VIEW_POST);
						}
						else {
							$this->session->set_userdata('msg', 'Could not add post');
							$this->session->set_userdata('status', 'fail');
							redirect(base_url() . ADD_POST);
						}
					}
				}
				else {
					$this->session->set_userdata('msg', 'Please fill all the required fields');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . ADD_POST);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}

	/* function to open view post page */
	public function view_post() {
		try {
			$data['tab']='ViewPost';
			$data['bcum']='View Posts';
			$data['main']='post';
			$data['mode']='view';	

			$datas['posts'] = $this->pm->get_all_posts();

			$this->load->view('backend/header', $data);
			$this->load->view('backend/view-post', $datas);
			$this->load->view('backend/footer');
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to open edit post page */
	public function edit_post() {
		try {
			$data['tab']='AddPost';
			$data['bcum']='Edit Post';
			$data['main']='post';
			$data['mode']='edit';

			$datas['categories'] = $this->cm->get_all_categories();
			$id = base64_decode(htmlspecialchars(strip_tags(trim($this->uri->segment(4)))));

			if ($datas['post'] = $this->pm->get_post_by_id($id)) {
				$this->load->view('backend/header', $data);
				$this->load->view('backend/add-post', $datas);
				$this->load->view('backend/footer');
			}
			else {
				$this->session->set_userdata('msg', 'Something went wrong');
				$this->session->set_userdata('status', 'fail');
				redirect(base_url() . VIEW_POST);
			}
		}
		catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	/* function to update post */
	public function update_post() {
		try{
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('permalink', 'Permalink', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            if($this->form_validation->run()===FALSE){
				$data['tab']='AddPost';
				$data['bcum']='Add Post';
				$data['main']='post';
				$data['mode']='add';

				$datas['categories'] = $this->cm->get_all_categories();
				$editid = htmlspecialchars(strip_tags(trim($this->input->post('editid'))));

				if ($datas['post'] = $this->pm->get_post_by_id($editid)) {
					$this->load->view('backend/header', $data);
					$this->load->view('backend/add-post', $datas);
					$this->load->view('backend/footer');
				}
				else {
					$this->session->set_userdata('msg', 'Something went wrong');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . VIEW_POST);
				}
            }
            else{
				$editid = htmlspecialchars(strip_tags(trim($this->input->post('editid'))));
                $title = htmlspecialchars(strip_tags(trim($this->input->post('title'))));
                $permalink = htmlspecialchars(strip_tags(trim($this->input->post('permalink'))));
                $old_featured_image = htmlspecialchars(strip_tags(trim($this->input->post('old_featured_image'))));
                $content = trim($this->input->post('content'));
				$categories = $this->input->post('category');

				if (!empty($categories)) {
					if (!empty($_FILES['featured_image']['name'])) {
						$config['upload_path'] = './post-image/';
						$config['allowed_types'] = 'gif|jpg|bmp|jpeg';
						$config['encrypt_name'] = TRUE;

						/* $config['max_size'] = 100;

						$config['max_width'] = 1024;

						$config['max_height'] = 768; */

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('featured_image')) {
							$this->session->set_userdata('msg', $this->upload->display_errors());
							$this->session->set_userdata('status', 'fail');
							redirect(base_url() . ADD_POST);
						}
						else {
							if ($old_featured_image != 'recipebowl.jpg') {
								unlink('./post-image/'.$old_featured_image);
								unlink('./post-image/thumbs/'.$old_featured_image);
							}
							$datas = array('upload_data' => $this->upload->data());
							$data = array(
								'post_title' => $title,
								'post_permalink' => $permalink,
								'post_content' => $content,
								'post_featured_image' => $datas['upload_data']['file_name']
							);

							if (isset($_POST['featured'])) {
								$data['post_featured'] = 1;
							}
							else {
								$data['post_featured'] = 0;
							}

							$res = $this->pm->update_post($data, $categories, $editid);

							if ($res) {
								$pathToImages = $config['upload_path'];
								$pathToThumbs = $config['upload_path'] . 'thumbs/';
								$thumbWidth = 150;
								$fname = $datas['upload_data']['file_name'];

								$dir = opendir($pathToImages);
							  	
							    // parse path for the extension
						    	$info = pathinfo($pathToImages . $fname);
							    // continue only if this is a JPEG image
							    
						      	echo "Creating thumbnail for {$fname} <br />";

						      	// load image and get image size
						      	$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
						      	$width = imagesx( $img );
						      	$height = imagesy( $img );

						      	// calculate thumbnail size
						      	$new_width = $thumbWidth;
					     	 	//$new_height = floor( $height * ( $thumbWidth / $width ) );
						      	$new_height = 125;

						      	// create a new temporary image
						      	$tmp_img = imagecreatetruecolor( $new_width, $new_height );

						      	// copy and resize old image into new image 
						      	imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

						      	// save thumbnail into a file
						      	imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
								  // close the directory
							  	closedir( $dir );

								$this->session->set_userdata('msg', 'Post Updated Successfully');
								$this->session->set_userdata('status', 'success');
								redirect(base_url() . VIEW_POST);
							}
							else {
								$this->session->set_userdata('msg', 'Could not update post');
								$this->session->set_userdata('status', 'fail');
								redirect(base_url() . VIEW_POST);
							}
						}
					}
					else {
						$data = array(
							'post_title' => $title,
							'post_permalink' => $permalink,
							'post_content' => $content,
						);

						if (isset($_POST['featured'])) {
							$data['post_featured'] = 1;
						}
						else {
							$data['post_featured'] = 0;
						}

						$res = $this->pm->update_post($data, $categories, $editid);

						if ($res) {
							$this->session->set_userdata('msg', 'Post Updated Successfully');
							$this->session->set_userdata('status', 'success');
							redirect(base_url() . VIEW_POST);
						}
						else {
							$this->session->set_userdata('msg', 'Could not update post');
							$this->session->set_userdata('status', 'fail');
							redirect(base_url() . VIEW_POST);
						}
					}
				}
				else {
					$this->session->set_userdata('msg', 'Please fill all the required fields');
					$this->session->set_userdata('status', 'fail');
					redirect(base_url() . VIEW_POST);
				}
            }
        } 
		catch (Exception $ex) {
            echo $ex->getMessage();
        }
	}

	/* function to delete post */
	public function delete_post() {
		try {
			$id = base64_decode(htmlspecialchars(strip_tags(trim($this->uri->segment(4)))));

			if ($id) {
				$res = $this->pm->delete_post($id);

				if ($res) {
					$this->session->set_userdata('msg', 'Post Deleted Successfully');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_POST);
				}
				else {
					$this->session->set_userdata('msg', 'Could not delete post');
					$this->session->set_userdata('status', 'success');
					redirect(base_url() . VIEW_POST);
				}
			}
			else {
				$this->session->set_userdata('msg', 'Something went wrong');
				$this->session->set_userdata('status', 'fail');
				redirect(base_url() . VIEW_POST);
			}
		}
		catch (Exception $ex) {
			$ex->getMessage();
		}
	}
}