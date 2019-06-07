<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ajout d'image</title>
	<!-- Bootstrap CSS link -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<section class="content-header">

		<h1>
			Clean Art
			<small class="text-muted">Ajout d'image</small>
		</h1> <br />

	</section>

	<br><br>
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<!-- success message to display after uploading image -->
			<?php if ($this->session->flashdata('success')) {?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php  } ?>
			<!-- validation message to display after form is submitted -->
			<?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>','</div>');
			?>

			<!-- image upload form      -->
			<?php echo form_open_multipart('Image/add_image') ?>
			<div class="form-group">
				<label>Nom de l'oeuvre</label>
				<input type="text" class="form-control" id="image_name" name="image_name">
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" id="userfile" name="userfile">
			</div>
			<input type="submit" class="btn btn-primary" value="Ajouter">
			<?php form_close() ?>

			<a href="<?php echo site_url('Image/view_images') ?>" class="btn btn-success" style="margin-left: 20px;">Voir les images</a>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>
<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- Bootstrap JS links -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
