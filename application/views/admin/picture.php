<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 28/04/2019
 * Time: 15:29
 */
?>

<?php
if(!$this->session->userdata('logged_in'))
{
	redirect('admin/login');
}
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

				<a class="nav-link"  data-toggle="modal" data-target="#exampleModal" 	data-id="<?= $row -> id ?>"
				   																		data-work_of_art="<?= $row -> work_of_art ?>"
																						data-artist="<?= $row -> artist ?>"
																						data-art_type="<?= $row -> art_type ?>"
																						data-creation_date="<?= $row -> creation_date ?>"
																						data-dimensions="<?= $row -> dimensions ?>"
																						data-expo_place="<?= $row -> expo_place ?>"
																						data-period="<?= $row -> period ?>"
																						data-description="<?= $row -> description ?>">

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

				<div class="modal-body">

					<!-- image upload form      -->
					<?= form_open_multipart('admin/update_picture') ?>

					<div class="row">

						<div class="col img-game-form">

							<label for = "work_of_art">Nom</label>
							<input type="text" class="form-control" id="work_of_art" name="work_of_art" value = "" required>

							<label for = "art_type">Type d'art</label>
							<input type="text" class="form-control" id="art_type" name="art_type" value = "" required>

							<label for = "dimensions">Dimensions</label>
							<input type="text" class="form-control" id="dimensions" name="dimensions" value = "" required>

							<label for = "period">Période</label>
							<input type="text" class="form-control" id="period" name="period" value = "" required>

						</div>

						<div class="col img-game-form">

							<label for = "artist">Auteur</label>
							<input type="text" class="form-control" id="artist" name="artist" value = "" required>

							<label for = "creation_date">Date de création</label>
							<input type="text" class="form-control" id="creation_date" name="creation_date" value = "" required>

							<label for = "expo_place">Lieu d'exposition</label>
							<input type="text" class="form-control" id="expo_place" name="expo_place" value = "" required>

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

					<input type="hidden" class="form-control hidden" id="picture_id" name="picture_id" value = "">

				</div>

				<div class = "row">
					
					<div class = "col img-game-form">
						<a class="btn btn-danger" href="#" role="button" onclick="return confirm('Confirmez-vous la suppression?');">Supprimer</a>

					</div>
					<div class = "col img-game-form">
						<!--Empty just to let a space between the two buttons-->
					</div>
					<div class = "col img-game-form">
						<input type="submit" class="btn btn-primary" value="Mettre à jour" onclick="return confirm('Confirmez-vous la mise à jour?');">
					</div>

				</div>

				<input type="hidden" class="form-control hidden" id="game_link" name="game_link" value = "<?= $game_link ?>">

				<?= form_close() ?> <br />
			</div>
		</div>
	</div>


	<script type="text/javascript">

		$(document).on("click", ".nav-link", function ()
		{
			let id				= $(this).data('id'),
				work_of_art		= $(this).data('work_of_art'),
			 	artist			= $(this).data('artist'),
				art_type		= $(this).data('art_type'),
				creation_date	= $(this).data('creation_date'),
				dimensions		= $(this).data('dimensions'),
				expo_place		= $(this).data('expo_place'),
				period			= $(this).data('period'),
				description		= $(this).data('description');

			$(".modal-body #picture_id").val( id );
			$(".modal-body #work_of_art").val( work_of_art );
			$(".modal-body #artist").val( artist );
			$(".modal-body #art_type").val( art_type );
			$(".modal-body #creation_date").val( creation_date );
			$(".modal-body #dimensions").val( dimensions );
			$(".modal-body #expo_place").val( expo_place );
			$(".modal-body #period").val( period );
			$(".modal-body #description").val( description );
		});

	</script>
