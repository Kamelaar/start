<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Start</title>
	  
	<!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" >

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" >

    <!-- Page level plugin CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>" >

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin.css'); ?>" >

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		
		<div class = "logo_text">

			<a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">

			  <h1>START</h1>

			</a>
			
		</div>

		<?php if($this->session->userdata('logged_in')) : ?>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ">
		  
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo base_url(); ?>admin/logout">
				<span class = "nav_links">Déconnexion</span>
			</a>
		</li>
		  
		<?php endif; ?>	
      </ul>

    </nav>

    <div id="wrapper">

		
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">	  
		  
		<?php if($this->session->userdata('logged_in')) : ?>
		  
		<li class="nav-item ">
			<p class = "welcome_message">
				Bonjour <?= $this->session->userdata('surname')." ". $this->session->userdata('name')?>
			</p>
        </li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-gamepad"></i>
					<span>Roulette Art</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/picture/Roulette_Art">Images du jeu</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/card/Roulette_Art">Fiche artiste</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-gamepad"></i>
					<span>Clean Art</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/picture/Clean_Art">Images du jeu</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/card/Clean_Art">Fiche artiste</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-gamepad"></i>
					<span>Quiz Art</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/picture/Quiz_Art">Images du jeu</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/card/Quiz_Art">Fiche artiste</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-gamepad"></i>
					<span>Color Art</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/picture/Color_Art">Images du jeu</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/card/Color_Art">Fiche artiste</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-gamepad"></i>
					<span>Puzzle Art</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/picture/Puzzle_Art">Images du jeu</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>admin/card/Puzzle_Art">Fiche artiste</a>
				</div>
			</li>
		  
		<?php endif; ?>
		  
		<?php if($this->session->userdata('admin_role')) : ?>    
		  
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i>
            <span>Gestion du site</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<a class="dropdown-item" href="<?php echo base_url(); ?>sms/index">Configuration SMS</a>  
            <a class="dropdown-item" href="<?php echo base_url(); ?>users/allmembers">Utilisateurs</a>
			<a class="dropdown-item" href="<?php echo base_url(); ?>pages/maintenance_check">Maintenance</a>  
          </div>
        </li>  
		  
		<?php endif; ?> 
		  
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
			
			
    <div class="container">
        <!-- Flash messages -->
		
	<?php if($this->session->flashdata('user_registered')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_created')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_created')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedin')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedout')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('profile_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_updated').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_allready_loggedIn')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_allready_loggedIn').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('member_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('member_updated').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('profile_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_deleted').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('member_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('member_deleted').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_allready_exists')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_allready_exists').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('maintenance_mode')): ?>
	<?php echo '<p class="alert alert-danger" align = "center">'.$this->session->flashdata('maintenance_mode').'</p>'; ?>
	<?php endif; ?>
		
	<?php if($this->session->flashdata('comment_validated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_validated').'</p>'; ?>
	<?php endif; ?>
		
	<?php if($this->session->flashdata('comment_unvalidated')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('comment_unvalidated').'</p>'; ?>
	<?php endif; ?>
	
	<?php if($this->session->flashdata('post_validated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_validated').'</p>'; ?>
	<?php endif; ?>
		
	<?php if($this->session->flashdata('comment_sent')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_sent').'</p>'; ?>
	<?php endif; ?>
		
	<?php if($this->session->flashdata('awaiting_registration')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('awaiting_registration').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('sender_email_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('sender_email_updated').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('recipient_email_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('recipient_email_updated').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('registration_pending')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('registration_pending').'</p>'; ?>
	<?php endif; ?>
		
	<?php if($this->session->flashdata('new_model_created')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('new_model_created').'</p>'; ?>
	<?php endif; ?>	
	
	<?php if($this->session->flashdata('model_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('model_deleted').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('user_validated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_validated').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('message_model_updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('message_model_updated').'</p>'; ?>
	<?php endif; ?>	
		
	<?php if($this->session->flashdata('sms_sent')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('sms_sent').'</p>'; ?>
	<?php endif; ?>	
		
		
	
	

		  
