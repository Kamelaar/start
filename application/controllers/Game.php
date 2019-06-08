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
		
		$data = array
				(
					'rand_img'		=> $this->image_model->rand_image('Clean_Art')->img_file,
				);

		$timeCleanArt = $this->input->post('time');

		$this->session->set_userdata('score', $timeCleanArt);

		$this->load->view('games/clean_art',$data);
	}

	public function roulette_art()
	{
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

		$timeRo = $this->input->post('time');

		$this->session->set_userdata('score', $timeRo + $this->session->userdata('score'));

		$this->load->view('games/roulette_art',$data);
	}

	public function color_art()
	{
		$data = array
		(
			'rand_img'		=> $this->image_model->rand_image('Color_Art')->img_file,
		);

		$timeCo = $this->input->post('time');

		$this->session->set_userdata('score', $timeCo + $this->session->userdata('score'));

		$this->load->view('games/color_art',$data);
	}
  
	public function puzzle_art()
	{
		$data = array
		(
			'rand_img'		=> $this->image_model->rand_image('Puzzle_Art')->img_file,
		);

		$timePu = $this->input->post('time');	

		$this->session->set_userdata('score', $timePu + $this->session->userdata('score'));

		$this->load->view('games/puzzle_art',$data);
	}

	public function emotion_art()
	{
		$data = array
		(
			'rand_img'		=> $this->image_model->rand_image('Emotion_Art')->img_file,
		);

		$timeEm = $this->input->post('time');

		$this->session->set_userdata('score', $timeEm + $this->session->userdata('score'));

		$this->load->view('games/emotion_art',$data);

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

