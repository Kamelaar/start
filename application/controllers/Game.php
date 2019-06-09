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
		$this->load->view('welcome_message');
	}
	
	public function clean_art()
	{
		$data = array
		(
			'rand_img'	=> $this->image_model->rand_image('Clean_Art')->img_file,
		);

		// Retrieving the name of player
		$player_name = $this->input->post('player_name');

		// Saving the name of the player in session
		$this->session->set_userdata('player_name', $player_name);

		$this->load->view('games/clean_art',$data);
	}

	public function puzzle_art()
	{
		// Retrieving the score of clean_art game
		$score = $this->input->post('time');

		// Saving the score of clean_art game in session
		$this->session->set_userdata('score', $score);

		$data = array
		(
			'rand_img'		=> $this->image_model->rand_image('Puzzle_Art')->img_file,
		);

		$this->load->view('games/puzzle_art',$data);
	}

	public function roulette_art()
	{
		// Retrieving the score of puzzle_art game
		$score = $this->input->post('time');

		// Saving the score of puzzle_art game in session
		$this->session->set_userdata('score', $this->session->userdata('score') + $score);

		$img_tab = $this->image_model->rand_image('Roulette_Art');

		$data = array
		(
			'img_left_1' 	=> $img_tab[0]->img_file,
			'img_right_1' 	=> $img_tab[0]->img_file_right,
			'img_left_2' 	=> $img_tab[1]->img_file,
			'img_right_2' 	=> $img_tab[1]->img_file_right,
			'img_left_3' 	=> $img_tab[2]->img_file,
			'img_right_3'	=> $img_tab[2]->img_file_right,
			'img_left_4' 	=> $img_tab[3]->img_file,
			'img_right_4' 	=> $img_tab[3]->img_file_right,
		);

		$this->load->view('games/roulette_art',$data);
	}

	public function emotion_art()
	{
		// Retrieving the score of roulette_art game
		$score = $this->input->post('time');

		// Saving the score of roulette_art game in session
		$this->session->set_userdata('score', $this->session->userdata('score') + $score);

		$data = array
		(
			'rand_img'		=> $this->image_model->rand_image('Emotion_Art')->img_file,
		);

		$this->load->view('games/emotion_art',$data);
	}

	public function color_art()
	{
		// Retrieving the score of emotion_art game
		$score = $this->input->post('time');

		// Saving the score of emotion_art game in session
		$this->session->set_userdata('score', $this->session->userdata('score') + $score);

		$data = array
		(
			'rand_img' => $this->image_model->rand_image('Color_Art')->img_file,
		);

		$this->load->view('games/color_art',$data);
	}

	public function score_final()
	{
		// Retrieving the score of color_art game
		$score = $this->input->post('time');

		// Saving the score of color_art game in session
		$this->session->set_userdata('score', $this->session->userdata('score') + $score);

		// Storing the player game session in database
		$this->game_model->insert_player_session($this->session->userdata('player_name'), $this->session->userdata('score'));

		// Getting the global ranking of the game
		$ranking = $this->game_model->get_ranking();
		
		$data = array
		(
			'score'		=> $this->session->userdata('score'),
			'ranking'	=> $ranking,
		);

		$this->load->view('games/score_final',$data);
	}
	public function card_clean_art()
	{
		$this->load->view('pages/clean_art_card');
	}

	public function logout()
	{
		$this->load->view('logout.php');
	}
	
}

