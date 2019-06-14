<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
        
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/login');
		$this->load->view('templates/footer');
	}

	public function login()
	{
		// Redirecting if already logged
		if($this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('user_allready_loggedIn', 'Vous êtes déjà connecté!');

			redirect('admin/home');
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE)
		{
			redirect('admin/index');
		}
		else
		{
			// Xss clean to avoid script hacks
			$name		= $this->security->xss_clean($this->input->post('name'));
			$password	= $this->input->post('password');

			// Log in user
			$userInfo = $this->admin_model->login($name, $password);

			if($userInfo)
			{
				$name = $userInfo->name;

				// Create session
				$user_data = array
				(
					'name'		=> $name,
					'logged_in'	=> true,
				);

				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('user_loggedin', 'Connexion réussie!');

				redirect('admin/home');
			}
			 else
			{
				// Set message
				$this->session->set_flashdata('login_failed', 'Echec de connexion!');

				redirect('admin/index');
			}
		}
	}

	// Log user out
	public function logout(){
		$user_data = array
		(
			'name',
			'logged_in',
		);

		// Unset user data
		$this->session->unset_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Déconnexion réussie!');

		redirect('admin/login');
	}

	public function home()
	{
		$data['title']	= 'Panneau d\'administration';

		$this->load->view('templates/header');
		$this->load->view('admin/home', $data);
		$this->load->view('templates/footer');
	}

	public function picture($game)
	{
		$game_pictures = $this->admin_model->get_game_pictures($game);

		$title = $this->admin_model->get_game_name($game) -> game_name;
		$subtitle = "Oeuvres du jeu";
		$game_link = str_replace(" ","_", $title);

		$data = array
		(
			'title'				=> $title,
			'subtitle'			=> $subtitle,
			'game_link'			=> $game_link,
			'game_pictures'		=> $game_pictures,
		);

		$this->load->view('templates/header');
		$this->load->view('admin/picture', $data);
		$this->load->view('templates/footer');
	}

	// add image from form
	public function add_picture($game_link)
	{
		// CI form validation
		$this->form_validation->set_rules('work_of_art', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('artist', 'Artiste', 'required');
		$this->form_validation->set_rules('art_type', 'Type d\'art', 'required');
		$this->form_validation->set_rules('dimensions', 'DimensionS', 'required');
		$this->form_validation->set_rules('period', 'Periode', 'required');
		$this->form_validation->set_rules('creation_date', 'Date de créaion', 'required');
		$this->form_validation->set_rules('expo_place', 'Lieu d\'exposition', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('admin/picture/'.$game_link);
		}
		else
		{
			// body of if clause will be executed when image uploading is failed
			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				// This image is uploaded by deafult if the selected image in not uploaded
				$image = 'no_image.png';
			}
			// body of else clause will be executed when image uploading is succeeded
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image = $_FILES['userfile']['name']; //name must be userfile
				$right_image = $_FILES['userfile2']['name'];


			}
			$this->admin_model->insert_image($image, $right_image);
			$this->session->set_flashdata('success','Image ajoutée avec succès!');

			redirect('admin/picture/'.$game_link);
		}
	}

	public function card($game)
	{

		$title = $this->admin_model->get_game_name($game) -> game_name;
		$subtitle = "Fiche artiste";
		$game_link = str_replace(" ","_", $title);

		$data = array
		(
			'title'				=> $title,
			'subtitle'			=> $subtitle,
			'card_title'		=> $this->admin_model->get_card_content($game) -> card_title,
			'card_picture'		=> $this->admin_model->get_card_content($game) -> card_picture,
			'card_content'		=> $this->admin_model->get_card_content($game) -> card_content,
			'game_link'			=> $game_link,
		);

		$this->load->view('templates/header');
		$this->load->view('admin/card', $data);
		$this->load->view('templates/footer');
	}

// add image from form
	public function update_card($game_link)
	{
		// CI form validation
		$this->form_validation->set_rules('title', 'Titre', 'required');
		$this->form_validation->set_rules('content', 'Contenu', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('admin/card/'.$game_link);
		}
		else
		{
			// body of if clause will be executed when image uploading is failed
			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				// This image is uploaded by default if the selected image in not uploaded
				$image = 'no_image.png';
			}
			// body of else clause will be executed when image uploading is succeeded
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image = $_FILES['userfile']['name'];  //name must be userfile

			}
			$this->admin_model->update_card($image);
			$this->session->set_flashdata('success','Fiche artiste modifiée avec succès!');

			redirect('admin/card/'.$game_link);
		}
	}
}
