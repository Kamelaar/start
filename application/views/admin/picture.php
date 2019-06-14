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

	<?= form_open_multipart('admin/add_picture/'.$game_link) ?>

	<div class="row">

		<div class="col img-game-form">

			<label for = "work_of_art">Nom</label>
			<input type="text" class="form-control" id="work_of_art" name="work_of_art" required>

			<label for = "art_type">Type d'art</label>
			<input type="text" class="form-control" id="art_type" name="art_type" required>

			<label for = "dimensions">Dimensions</label>
			<input type="text" class="form-control" id="dimensions" name="dimensions" required>

			<label for = "period">Période</label>
			<input type="text" class="form-control" id="period" name="period" required>

		</div>

		<div class="col img-game-form">

			<label for = "artist">Auteur</label>
			<input type="text" class="form-control" id="artist" name="artist" required>

			<label for = "creation_date">Date de création</label>
			<input type="text" class="form-control" id="creation_date" name="creation_date" required>

			<label for = "expo_place">Lieu d'exposition</label>
			<input type="text" class="form-control" id="expo_place" name="expo_place" required>

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

	</div>

	<div class = "img-game-form">
		<label for ="description">Description</label>
		<textarea class="form-control" id="description" name="description" rows="6"></textarea>

		<input type="submit" class="btn btn-primary" value="Ajouter">
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

			<div class = "border border-dark rounded image-table img-modal">

				<a class="nav-link"  data-toggle="modal" data-target="#exampleModal" data-id="<?= $row -> work_of_art ?> ?>">

				<h4> <?= $row -> work_of_art ?> </h4>

				<img src = "<?= base_url('assets/img/'. $row -> img_file) ?>" width = "200px" height = "300px" class="img-fluid">

				</a>

			</div>

		</div>

		<?php
		$rowCount++;

		if($rowCount % $numOfCols == 0) :

			echo '</div> <br /> <div class="row">';

		endif;

	endforeach; ?>

</div> <br />

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content pseudo-modal p-3">
				<div class="modal-header">
					<h5 class="text-center" id="exampleModalLabel">Voir / Modifier l'oeuvre</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<!-- image upload form      -->
<!--				--><?//= form_open_multipart('admin/add_picture/'.$game_link) ?>

				<div class="row">

					<div class="col img-game-form">

						<label for = "image_name">Nom</label>
						<input type="text" class="form-control" id="image_name" name="image_name" value = "">

						<label for = "image_name">Type d'art</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

						<label for = "image_name">Dimensions</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

						<label for = "image_name">Période</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

					</div>

					<div class="col img-game-form">

						<label for = "image_name">Auteur</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

						<label for = "image_name">Date de création</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

						<label for = "image_name">Lieu d'exposition</label>
						<input type="text" class="form-control" id="image_name" name="image_name">

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

				</div>

				<div class = "img-game-form">
				<label for ="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="6"></textarea>
				</div>

				<div class = "row">
					<div class = "col img-game-form">
						<a class="btn btn-danger" href="#" role="button" >Supprimer</a>

					</div>
					<div class = "col img-game-form">
						<!--Empty just to let a space between the two buttons-->
					</div>
					<div class = "col img-game-form">
						<input type="submit" class="btn btn-primary" value="Mettre à jour">
					</div>

				</div>

				<input type="hidden" class="form-control hidden" id="game_link" name="game_link" value = "<?= $game_link ?>">
				<input type="hidden" class="form-control hidden" id="game_name" name="game_name" value = "<?= $title ?>">

				<?= form_close() ?> <br />
			</div>
		</div>
	</div>



