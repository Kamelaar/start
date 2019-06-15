<?php
class Admin_model extends CI_Model{
	public function register($userInfo){
		$this->db->insert('user', $userInfo);
	}

	// Log user in
	public function login($name, $password){
		// Validate

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('name', $name);
		$query = $this->db->get();

		$userInfo = $query->row();

		if(!empty($userInfo)){
			if(password_verify($password, $userInfo->password)){
				return $userInfo;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}

	public function get_game_name($game)
	{
		$this->db->select('game_name');
		$this->db->where('game_link', $game);
		$query = $this->db->get('game_image');

		return $query->row();
	}

	public function get_game_pictures($game)
	{
		$this->db->select('*');
		$this->db->where('game_link', $game);
		$this->db->order_by('id');
		$query = $this->db->get('game_image');

		return $query->result();
	}

	public function insert_image($image, $right_image = " ")
	{

		if(!empty($right_image))
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file'			=> $image,
				'img_file_right'	=> $right_image,
				'game_link'			=> $this->input->post('game_link'),
				'game_name'			=> $this->input->post('game_name'),
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		else
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file'			=> $image,
				'game_link'			=> $this->input->post('game_link'),
				'game_name'			=> $this->input->post('game_name'),
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}


		//insert image to the database
		$this->db->insert('game_image', $data);
	}

	public function update_image($image, $right_image = " ")
	{
		if(!empty($image) and !empty($right_image))
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file'			=> $image,
				'img_file_right'	=> $right_image,
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		else if(empty($image) and empty($right_image))
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		else if(!empty($image) and empty($right_image))
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file'			=> $image,
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		else if(empty($image) and !empty($right_image))
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file_right'	=> $right_image,
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		else
		{
			// assign the data to an array
			$data = array
			(
				'work_of_art'		=> $this->input->post('work_of_art'),
				'img_file'			=> $image,
				'description'		=> $this->input->post('description'),
				'artist'			=> $this->input->post('artist'),
				'art_type'			=> $this->input->post('art_type'),
				'creation_date'		=> $this->input->post('creation_date'),
				'expo_place'		=> $this->input->post('expo_place'),
				'period'			=> $this->input->post('period'),
				'dimensions'		=> $this->input->post('dimensions'),
			);
		}
		//update image to the database
		$this->db->where('id', $this->input->post('picture_id'));
		$this->db->update('game_image', $data);
	}

	public function delete_image($id)
	{
	//update image to the database
	$this->db->where('id', $id);
	$this->db->delete('game_image');
	}

	public function get_card_content($game)
	{
		$this->db->select('*');
		$this->db->where('game_link', $game);
		$query = $this->db->get('game_card');

		return $query->row();
	}

	public function update_card($image)
	{
		// assign the data to an array
		$data = array(
			'card_title'	=> $this->input->post('title'),
			'card_picture'	=> $image,
			'card_content'	=> $this->input->post('content'),
		);

		//insert image to the database
		$this->db->where('game_link', $this->input->post('game_link'));
		$this->db->update('game_card', $data);
	}

}
