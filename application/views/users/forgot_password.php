<!DOCTYPE html>
<html lang="en">

  

  <body>

    <div class="container">
		
		<div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>

        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        $send = $this->session->flashdata('send');
        $notsend = $this->session->flashdata('notsend');
        $unable = $this->session->flashdata('unable');
        $invalid = $this->session->flashdata('invalid');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>                    
            </div>
        <?php }

        if($send)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $send; ?>                    
            </div>
        <?php }

        if($notsend)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $notsend; ?>                    
            </div>
        <?php }
        
        if($unable)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $unable; ?>                    
            </div>
        <?php }

        if($invalid)
        {
            ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $invalid; ?>                    
            </div>
        <?php } ?>
	
		
		
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Réinitialisez votre mot de passe</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Mot de passe oublié?</h4>
            <p>Saisissez votre email et nous vous transmettrons des instructions pour régénérer votre mot de passe.</p>
          </div>
          <form action="<?php echo base_url(); ?>resetPasswordUser" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name ="login_email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block">Réinitialisation</a>
          </form>

        </div>
      </div>

        </div>
  </body>

</html>
