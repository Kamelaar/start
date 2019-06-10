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
		$this->form_validation->set_rules('image_name', 'Image Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

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

	// Check if username exists
	public function check_username_exists($username){
		$this->form_validation->set_message('check_email_exists', 'Ce nom d\'utilisateur est indisponible!');
		if($this->user_model->check_username_exists($username)){
			return true;
		} else {
			return false;
		}
	}

	// Check if email exists
	public function check_cuid_exists($cuid){
		$this->form_validation->set_message('check_cuid_exists', 'Un compte avec ce CUID existe déjà!');
		if($this->user_model->check_cuid_exists($cuid)){
			return true;
		} else {
			return false;
		}
	}

	public function profile(){
		$data['title'] = 'Mon profil';
		$data['subtitle'] = 'Voir / Editer / Supprimer';
		$data['userInfo'] = $this->user_model->get_profile($this->session->userdata('user_id'));

		$this->load->view('templates/header');
		$this->load->view('users/profile', $data);
		$this->load->view('templates/footer');
	}

	public function editMyProfile(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Mon profil';
		$data['userInfo'] = $this->user_model->get_profile($this->session->userdata('user_id'));

		$this->load->view('templates/header');
		$this->load->view('users/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update_profile(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->user_model->update_profile();

		// Set message
		$this->session->set_flashdata('profile_updated', 'Votre profil a été mis à jour');

		redirect('users/profile');
	}

	public function deleteMyProfile(){
		$this->user_model->delete_profile($this->session->userdata('user_id'));

		$this->session->unset_userdata('logged_in');

		// Set message
		$this->session->set_flashdata('profile_deleted', 'Votre compte a été supprimé!');

		redirect('home');
	}

	// Display all the members
	public function allMembers(){

		if(!$this->session->userdata('logged_in')){
			redirect('users/login');

		} else if (!$this->session->userdata('admin_role')){
			redirect('home'); 
		}

		$data['title']			= 'Membres';
		$data['subtitle']		= 'Gestion des membres';
		$data['all_members']	= $this->user_model->getMembers();

		$this->load->view('templates/header');
		$this->load->view('users/members', $data);
		$this->load->view('templates/footer');
	}

	// Display the member informations to edit them
	public function editMember($user_id){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');

		} else if (!$this->session->userdata('admin_role')){
			redirect('home'); 
		}

		$data['title']		= 'Gestion des membres';
		$data['subtitle']	= 'Modifier';
		$data['userInfo']	= $this->user_model->get_profile($user_id);

		$this->load->view('templates/header');
		$this->load->view('users/adminEdit', $data);
		$this->load->view('templates/footer');
	}

	// Update a member data
	public function updateOneMember(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');

		} else if (!$this->session->userdata('admin_role')){
			redirect('home'); 
		}

		$this->user_model->updateMember();

		// Set message
		$this->session->set_flashdata('member_updated', 'Les informations du membre ont été modifiées!');

		redirect('users/allMembers');
	}

	public function deleteAMember($user_id){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');

		} else if (!$this->session->userdata('admin_role')){
			redirect('home'); 
		}    

		$this->user_model->deleteMember($user_id);

		// Set message
		$this->session->set_flashdata('member_deleted', 'Le compte a été supprimé!');

		redirect('users/allMembers');
	}

	function getBrowserAgent(){
		
		$CI = get_instance();

		$agent = '';

		if ($CI->agent->is_browser())
		{
			$agent = $CI->agent->browser().' '.$CI->agent->version();
		}
		else if ($CI->agent->is_robot())
		{
			$agent = $CI->agent->robot();
		}
		else if ($CI->agent->is_mobile())
		{
			$agent = $CI->agent->mobile();
		}
		else
		{
			$agent = 'User Agent non identifié!';
		}

		return $agent;
	}

	public function loginHistory($user_id){

		if(!$this->session->userdata('logged_in')){
			redirect('users/login');

		} else if (!$this->session->userdata('admin_role')){
			redirect('home'); 
		}

		$data['userInfo']       = $this->user_model->get_profile($user_id);
		$data['title']          = 'Profil de '. $data['userInfo']->surname.' '. $data['userInfo']->name;

		$data['subtitle']       = 'Historique de connexion';

		$data['login_history']  = $this->user_model->getLoginHistory($user_id);

		$this->load->view('templates/header');
		$this->load->view('users/login_history', $data);
		$this->load->view('templates/footer');
	}
		
	
	public function validate($id){
		// Check login
		if(!$this->session->userdata('admin_role')){
			redirect('users/login');
		}
		
		$this->user_model->validateUser(1,$id);	
		// Set message
		$this->session->set_flashdata('user_validated', 'L\'utilisateur peut désormais utiliser le service!');
		redirect('users/allMembers');
	}
	
	 /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('logged_in');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			$this->load->view('templates/header');
            $this->load->view('users/forgot_password');
			$this->load->view('templates/footer');
        }
        else
        {
            redirect('sms/sms_send');
        }
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));
            
            if($this->user_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->user_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->user_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["surname"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Pour des raisons de sécurité, nous vous prions de créer un nouveau mot de passe";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Votre lien de régénération de mot passe vous a été envoyé, merci de consulter vos emails..");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Le lien de régénération de mot de passe n'a pu être envoyé, merci de rééssayer.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "Il semble que vos informations ne soient pas correctes, merci de les corriger.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "Cet email est inconnu de notre service.");
            }
            redirect('users/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->user_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('users/newPassword', $data);
        }
        else
        {
            redirect('users/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->user_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->user_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }
            
            setFlashData($status, $message);

            redirect("users/login");
        }
    }

}
