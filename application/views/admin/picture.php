<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 28/04/2019
 * Time: 15:29
 */
?>

<div class="container">

	<section class="content-header">

		<h1>
			<?= $title ?>
			<small class="text-muted"> <?= $subtitle ?> </small>
		</h1>

	</section> <br />

	<h2 class = "text-center"> Ajouter une oeuvre </h2> <br />

	<!-- success message to display after uploading image -->
	<?php if ($this->session->flashdata('success')) { ?>

	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<?= $this->session->flashdata('success'); ?>
	</div>

	<?php  } ?>

	<!-- validation message to display after form is submitted -->
	<?= validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		 <span aria-hidden="true">&times;</span></button>','</div>');
	?>

	<!-- image upload form      -->
	<?= form_open_multipart('Image/add_image') ?>

	<div class="row">

		<div class="col">
			<label for = "image_name">Nom</label>
			<input type="text" class="form-control" id="image_name" name="image_name">
		</div>

		<div class="col">
			<label>Image</label>
			<input type="file" class="form-control-file" id="userfile" name="userfile">
		</div>

		<div class = "col">
			<input type="submit" class="btn btn-primary" value="Ajouter l'oeuvre">
		</div>

	</div>

	<?= form_close() ?> <br />

	<h2 class = "text-center"> Liste des oeuvres du jeu </h2> <br />

	<a href="<?= site_url('Image/view_images') ?>" class="btn btn-success" style="margin-left: 20px;">Voir les images</a>

</div>
