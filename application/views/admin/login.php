<section class="content-header">

	<h1>
		Connexion
			<small class="text-muted">Identifiez-vous</small>
	</h1> <br />

</section>

<?php echo form_open('admin/login'); ?>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Formulaire de connexion</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nom" required="required" >
                <label for="name">Nom</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
                <label for="password">Mot de passe</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </form>
        </div>
      </div>
    </div>

<?php echo form_close(); ?>

