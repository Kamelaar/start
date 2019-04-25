<?php

class Game extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

	}

	public function clean_art()
	{
		$data = array('title' => 'Clean Art');
		$this->load->view('games/clean_art', $data);	
	}

	public function roulette_art()
	{
		$data = array('title' => 'Roulette Art');
		$this->load->view('games/roulette_art', $data);
	}

	public function color_art()
	{
		$data = array('title' => 'color_art');
		$this->load->view('games/color_art', $data);
	}
  
	public function puzzle_art()
	{
		$data = array('title' => 'Puzzle Art');
		$this->load->view('games/puzzle_art', $data);
	}
	public function emotion_art()
	{
		$data = array('title' => 'Emotion Art');
		$this->load->view('games/emotion_art', $data);
	}
}
