<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 25/04/2019
 * Time: 10:58
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('image_upload');
	}

	// add image from form
	public function add_image()
	{
		// CI form validation
		$this->form_validation->set_rules('image_name', 'Image Name', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('image_upload');
		}
		else {
			// body of if clause will be executed when image uploading is failed
			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				// This image is uploaded by deafult if the selected image in not uploaded
				$image = 'no_image.png';
			}
			// body of else clause will be executed when image uploading is succeeded
			else{
				$data = array('upload_data' => $this->upload->data());
				$image = $_FILES['userfile']['name'];  //name must be userfile

			}
			$this->Image_model->insert_image($image);
			$this->session->set_flashdata('success','Image stored');
			redirect('Image');
		}
	}

	// view images fetched from database
	public function view_images()
	{
		$data['images'] = $this->Image_model->get_images();
		$this->load->view('image_view', $data);
	}
}

