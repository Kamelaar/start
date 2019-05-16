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
		$this->load->view('games/clean_art');
		$timeCl = $this->input->post('time');	
	}
	public function roulette_art()
	{
		$this->load->view('games/roulette_art');
		$timeRo = $this->input->post('time');
	}

	public function color_art()
	{
		$this->load->view('games/color_art');
		$timeCo = $this->input->post('time');
		$pointsCo = $this->input->post('points');
	}
  
	public function puzzle_art()
	{
		$this->load->view('games/puzzle_art');
		$timePu = $this->input->post('time');	
	}

	public function emotion_art()
	{
		$this->load->view('games/emotion_art');
		$timeEm = $this->input->post('time');
	}

	public function score_final()
	{
		$score = $timeCl + $timeRo + $timeCo + $timePu + $timeEm;
		$this->load->view('games/score_final',$score);
	}
}
