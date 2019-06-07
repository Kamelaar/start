<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 30/04/2019
 * Time: 00:32
 */
?>

<div class="container">

	<section class="content-header">

		<h1>
			<?= $title ?>
			<small class="text-muted"> <?= $subtitle ?> </small>
		</h1>

	</section> <br />

	<h2 class = "text-center"> Fiche du jeu </h2> <br />

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
	<?= form_open_multipart('admin/update_card/'.$game_link) ?>

	<div class="row">

		<div class="col img-game-form">
			<label>Titre</label>
			<input type="text" class="form-control" id="title" name="title" value="<?= $card_title ?>">
		</div>

		<div class="col img-game-form">
			<label>Image</label>
			<input type="file" class="form-control-file" id="userfile" name="userfile">
		</div>

	</div> <br /> <br />

	<div class="row">

	<div class="col img-game-form">
		Image actuelle <br />
		<img src = "<?= base_url('assets/img/'. $card_picture) ?>" width = "300px" height = "200px" class="img-fluid">
	</div>

	<div class="col img-game-form">
		<label>Contenu</label>
		<textarea class="form-control" id="content" name="content" rows="8"><?= $card_content ?></textarea>
	</div>

	</div> <br />

	<div class = "submit-game-form">
		<input type="submit" class="btn btn-primary" value="Modifier la fiche">
	</div>

	<input type="hidden" class="form-control hidden" id="game_link" name="game_link" value = "<?= $game_link ?>">
	<input type="hidden" class="form-control hidden" id="game_name" name="game_name" value = "<?= $title ?>">

	<?= form_close() ?> <br />

