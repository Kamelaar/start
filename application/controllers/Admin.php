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
		if($game == "Roulette_Art")
		{
			$artistic_movement 		= $this->admin_model->get_roulette_art_card() -> artistic_movement;
			$movement_definition	= $this->admin_model->get_roulette_art_card() -> movement_definition;
			$game_pictures 			= $this->admin_model->get_game_pictures('Roulette_Art');
			$title = $this->admin_model->get_game_name($game) -> game_name;
			$subtitle = "Courant artistique du jeu";
			$game_link = str_replace(" ","_", $title);

			$data = array
			(
				'title'					=> $title,
				'subtitle'				=> $subtitle,
				'game_link'				=> $game_link,
				'game_pictures'			=> $game_pictures,
				'artistic_movement'		=> $artistic_movement,
				'movement_definition'	=> $movement_definition,
			);
		}
		else
		{
			$game_pictures = $this->admin_model->get_game_pictures($game);
			$title = $this->admin_model->get_game_name($game) -> game_name;
			$subtitle = "Oeuvres du jeu";
			$game_link = str_replace(" ","_", $title);

			$data = array
			(
				'title'					=> $title,
				'subtitle'				=> $subtitle,
				'game_link'				=> $game_link,
				'game_pictures'			=> $game_pictures,
			);
		}

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
			}

			$this->admin_model->insert_image($image);
			$this->session->set_flashdata('success','Image ajoutée avec succès!');

			redirect('admin/picture/'.$game_link);
		}
	}

	// add image from form
	public function update_roulette_picture()
	{
		// CI form validation
		$this->form_validation->set_rules('work_of_art', 'Nom', 'required');
//		$this->form_validation->set_rules('description', 'Description', 'required');
//		$this->form_validation->set_rules('artist', 'Artiste', 'required');
//		$this->form_validation->set_rules('art_type', 'Type d\'art', 'required');
//		$this->form_validation->set_rules('dimensions', 'DimensionS', 'required');
//		$this->form_validation->set_rules('period', 'Periode', 'required');
//		$this->form_validation->set_rules('creation_date', 'Date de créaion', 'required');
//		$this->form_validation->set_rules('expo_place', 'Lieu d\'exposition', 'required');

		$game_link = $this->input->post('game_link');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('admin/picture/'.$game_link);
			echo 'error';
		}
		else
		{

			// body of if clause will be executed when image uploading is failed
			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				// This image is uploaded by deafult if the selected image in not uploaded
				$image = "";
				echo 'error';
			}
			// body of else clause will be executed when image uploading is succeeded
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$file_name_1 = $this->input->post('img_url_1');
				$file_name_2 = $this->input->post('img_url_2');


				if (isset($file_name_1) and !empty($file_name_1))
				{
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);

					$path = $_FILES['userfile']['name'];
					$tmp_path = $_FILES['userfile']['tmp_name'];
					unlink('./assets/img/'.$file_name_1.'.png');

					$image = $file_name_1.".".pathinfo($path, PATHINFO_EXTENSION);

					$config['file_name'] = $image;
					$config['encrypt_name'] = false;
					move_uploaded_file($tmp_path, "./assets/img/".$image);

					$this->admin_model->update_roulette_image($image, "");
					$this->session->set_flashdata('success','Mise à jour réussie!');
				}

				if (isset($file_name_2) and !empty($file_name_2))
				{
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);

					$path = $_FILES['userfile2']['name'];
					$tmp_path2 = $_FILES['userfile2']['tmp_name'];
					unlink('./assets/img/'.$file_name_2.'.png');

					$right_image = $file_name_2.".".pathinfo($path, PATHINFO_EXTENSION);

					$config['file_name'] = $right_image;
					$config['encrypt_name'] = false;
					move_uploaded_file($tmp_path2, "./assets/img/".$right_image);

					$this->admin_model->update_roulette_image("", $right_image);
					$this->session->set_flashdata('success','Mise à jour réussie!');
				}
			}

			redirect('admin/picture/'.$game_link);
		}
	}

	// add image from form
	public function update_picture()
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

		$game_link = $this->input->post('game_link');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('admin/picture/'.$game_link);
			echo 'error';
		}
		else
		{

			// body of if clause will be executed when image uploading is failed
			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				// This image is uploaded by deafult if the selected image in not uploaded
				$this->session->set_flashdata('dangers','Votre image est vide ou ne respecte pas les caractéristiques requises!');

				redirect('admin/picture/'.$game_link);
			}
			// body of else clause will be executed when image uploading is succeeded
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image = $_FILES['userfile']['name']; //name must be userfile
			}

			$this->admin_model->update_image($image);
			$this->session->set_flashdata('success','Mise à jour réussie!');

			redirect('admin/picture/'.$game_link);
		}
	}

	// Delete image
	public function delete_picture()
	{
		$id = $this->input->post('id');
		$img_file = $this->input->post('img_file');
		$game_link = $this->input->post('game_link');

		$path			= "./assets/img/";
		$file 			= $path . $img_file;

		if (is_readable($file) && unlink($file))
		{
			$this->admin_model->delete_image($id);
			$this->session->set_flashdata('success','Suppression réussie!');
			redirect('admin/picture/'.$game_link);
		}
		else
		{
			$this->session->set_flashdata('danger','Suppression échouée!');
			redirect('admin/picture/'.$game_link);
		}


	}

	public function update_roulette_art_card()
	{
		$this->admin_model->update_roulette_art_card();
		$this->session->set_flashdata('success','Mise à jour réussie!');
		redirect('admin/picture/Roulette_Art');

	}

}
