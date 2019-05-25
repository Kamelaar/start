<section class="content-header">

	<h1>
		Inscription
			<small class="text-muted">Création de compte</small>
	</h1> <br />

</section>    

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Saisie de vos informations</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-row">
				  
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="name" id="lastName" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Nom</label>
                  </div>
                </div>
              </div>
            </div>
			  
			<div class="form-group">
			<div class="form-row">
			  

			</div>  
			</div>
			  
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Mot de passe</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="password2" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirmation du mot de passe</label>
                  </div>
                </div>
              </div>
            </div>
			  <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>users/login">Page de connexion</a>
          </div>
        </div>
      </div>
    </div>

<?php echo form_close(); ?>


