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
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	public function index()
	{
		$this->load->view('welcome_message',$name);
		$name = $this->input->post('name');

	}

	public function clean_art()
	{
		$this->load->view('games/clean_art');
		$timeCleanArt = $this->input->post('time');

		$this->session->set_userdata('score', $timeCleanArt);
	}

	public function roulette_art()
	{
		$this->load->view('games/roulette_art');
		$timeRo = $this->input->post('time');

		$this->session->set_userdata('score', $timeRo + $this->session->userdata('score'));
	}

	public function color_art()
	{
		$this->load->view('games/color_art');
		$timeCo = $this->input->post('time');

		$this->session->set_userdata('score', $timeCo + $this->session->userdata('score'));
	}
  
	public function puzzle_art()
	{
		$this->load->view('games/puzzle_art');
		$timePu = $this->input->post('time');	

		$this->session->set_userdata('score', $timePu + $this->session->userdata('score'));
	}

	public function emotion_art()
	{
		$this->load->view('games/emotion_art');
		$timeEm = $this->input->post('time');

		$this->session->set_userdata('score', $timeEm + $this->session->userdata('score'));
	}

	public function score_final()
	{	
		
		$data = array
		(
			'score' => $this->session->userdata('score')
		);

		$this->load->view('games/score_final',$data);
	}

	public function logout()
	{
		$this->load->view('logout.php');
	}
}

