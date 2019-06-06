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

	public function game_manager($target)
	{
		switch ($target)
		{
			case 'clean_art' :

				$player_name = $this->security->xss_clean($this->input->post('player_name'));

				// Create session
				$user_data = array
				(
					'authorized'	=> 1,
					'player_name'	=> $player_name,
					'score'			=> 0,
				);
				$this->session->set_userdata($user_data);

				// Prepare variables
				$data = array
				(
					'title' 		=> 'Règles du jeu',
					'player_name' 	=> $player_name,
					'rand_img'		=> $this->image_model->rand_image('Clean_Art')->img_file,
				);

				// Load view and send variables
				$this->load->view('games/clean_art', $data);

			break;

			case 'clean_art_card' :

				$score = $this->input->post('time');

				// Prepare variables
				$data = array
				(
					'title' 	=> 'Découvres l\'art',
					'score' 	=> $score,
				);

				// Load view and send variables
				$this->load->view('pages/card', $data);

			break;

			case 'puzzle_art' :

			break;

			case 'puzzle_art_card' :

			break;

			case 'roulette_art' :

			break;

			case 'roulette_art_card' :

			break;

			case 'emotion_art' :

			break;

			case 'emotion_art_card' :

			break;

			case 'quizz_art' :

			break;

			case 'quizz_art_card' :

			break;

			case 'end_game' :

			break;

		}
	}
	
	public function game_instructions()
	{
		$data = array('title' => 'Règles du jeu');
		$this->load->view('games/instructions', $data);
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
	
	public function game_card()
	{
		$data = array('title' => 'Apprendre l\'art');
		$this->load->view('games/card', $data);
	}
}

