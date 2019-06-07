<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 25/04/2019
 * Time: 15:01
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_model extends CI_Model {

	public function insert_image($image)
	{
		// assign the data to an array
		$data = array(
			'image_id' => $this->input->post('image_id'),
			'image_name' => $this->input->post('image_name'),
			'image' => $image
		);
		//insert image to the database
		$this->db->insert('image_data', $data);
	}

	//get images from database
	public function get_images()
	{
		$this->db->select('*');
		$this->db->order_by('image_id');
		$query = $this->db->get('image_data');
		return $query->result();
	}

	public function rand_image($game)
	{
		$this->db->select('img_file');
		$this->db->where('game_link', $game);
		$this->db->order_by('rand()');
//		$this->db->limit('1');
		$query = $this->db->get('game_image');

		return $query->row();
	}
}


