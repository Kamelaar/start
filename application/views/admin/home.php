<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 28/04/2019
 * Time: 00:34
 */
?>

<?php
if(!$this->session->userdata('logged_in'))
{
	redirect('admin/login');
}
?>

<h1> <?= $title ?> </h1>
