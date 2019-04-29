<?php

$id			= $userInfo -> id;
$surname	= $userInfo -> surname;
$name		= $userInfo -> name;
$email		= $userInfo -> email;
$cuid		= $userInfo -> cuid;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            <?= $title ?>
                <small class="text-muted"><?= $subtitle.' '.$surname.' '.$name ?>  </small>
        </h1> <br />

    </section>

    <!-- Main content -->
    <section class="content">

        <?php echo validation_errors(); ?>

        <?php echo form_open('users/updateOneMember'); ?>

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div class="form-group">

				<label>Prénom</label>
				<input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">

				<label>Nom</label>
				<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">

				<label>Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">

				<label>CUID</label>
				<input type="text" class="form-control" name="cuid" value="<?php echo $cuid; ?>">

			</div>
			
			<!--Update user button-->
			<button type="submit" onclick="return confirm('Modifier cet utilisateur?');" class="btn btn-default">Valider</button>
			
			<!--Cancel button-->
			<a href="../allMembers" class="btn btn-warning" role="button">Annuler</a>
		
			<!--Delete user button-->
			<a href="<?php echo base_url(); ?>users/deleteAMember/<?= $id;?>" onclick="return confirm('Supprimer cet utilisateur?');" class="btn btn-danger pull-right btn-small">Supprimer</a>
		
        <?php echo form_close(); ?>

        <br />

        <hr>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
