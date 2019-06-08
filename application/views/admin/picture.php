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

	<h2 class = "text-center"> Ajouter une image </h2> <br />

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
	<?= form_open_multipart('admin/add_picture/'.$game_link) ?>

	<div class="row">

		<div class="col img-game-form">
			<label for = "image_name">Nom de l'oeuvre</label>
			<input type="text" class="form-control" id="image_name" name="image_name">
		</div>

		<div class="col img-game-form">

			<?php if ($game_link == "Roulette_Art") { ?>

			<label>Image de gauche</label>

			<?php }  else {?>

			<label>Image</label>

			<?php } ?>

			<input type="file" class="form-control-file" id="userfile" name="userfile">

			<?php if ($game_link == "Roulette_Art") { ?>

				<br />
					<label>Image de droite</label>
					<input type="file" class="form-control-file" id="userfile" name="userfile2">

			<?php } ?>

		</div>

		<div class = "col submit-game-form">
			<input type="submit" class="btn btn-primary" value="Ajouter l'image">
		</div>

	</div>

	<input type="hidden" class="form-control hidden" id="game_link" name="game_link" value = "<?= $game_link ?>">
	<input type="hidden" class="form-control hidden" id="game_name" name="game_name" value = "<?= $title ?>">

	<?= form_close() ?> <br />

	<hr>

	<h2 class = "text-center"> Toutes les images </h2> <br />

<?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>

<div class="row">

	<?php foreach ($game_pictures as $row) : ?>

		<div class="col-md-<?php echo $bootstrapColWidth; ?>">

			<div class = "border border-dark rounded image-table">

				<h4> <?= $row -> work_of_art ?> </h4>

				<img src = "<?= base_url('assets/img/'. $row -> img_file) ?>" width = "200px" height = "300px" class="img-fluid">

			</div>

		</div>

		<?php
		$rowCount++;

		if($rowCount % $numOfCols == 0) :

			echo '</div> <br /> <div class="row">';

		endif;

	endforeach; ?>

</div> <br />


