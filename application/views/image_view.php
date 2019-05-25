<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 25/04/2019
 * Time: 11:30
 */

defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Images du jeu</title>
	<!-- Bootstrap CSS link -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Font Awesome CSS link -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<section class="content-header">

		<h1>
			Clean Art
			<small class="text-muted">Les images du jeu</small>
		</h1> <br />

	</section>
	<br>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<!-- check whether there are images or not -->
			<?php if (count($images)): ?>
				<div class="card" style="margin-bottom: 100px;">
					<div class="card-body">
						<h5 class="card-title"><i class="fa fa-user-circle-o"></i> Liste des oeuvres affichées</h5>
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Nom de l'oeuvre</th>
								<th>Image</th>
							</tr>
							</thead>
							<tbody>
							<!-- start of foreach loop to display images -->
							<?php foreach($images as $row):?>
								<tr>
									<td><?php echo $row->image_id ?></td>
									<td><?php echo $row->image_name ?></td>
									<td><center><img class="thumbnail" style="height: 100px; width: 100px;" src="<?php echo base_url() ?>assets/img/<?php echo $row->image ?>"></center></td>
								</tr>
							<?php endforeach; ?>
							<!-- end of foreach loop  -->
							</tbody>
						</table>
					</div>
				</div>
			<?php else: ?>
				<!-- this text is shown when there are no images in the database -->
				<h4 style="color: red" class="text-center">No images in database</h4>
			<?php endif ?>
		</div>
		<div class="col-lg-2"></div>
	</div>
</div>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- Bootstrap JS links -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
