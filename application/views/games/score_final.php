<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 12/04/2019
 * Time: 10:58
 */
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>[START] | RouletteArt</title>

<!-- Syntax highlighting, ignore this -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/scorefinal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

</head>

<body>
<style>
body{
	background: url("<?php echo base_url() ?>assets/img/background/Pages-Score.png");
	background-size: cover;
	overflow-y:hidden;
}
</style>
<?php 
	if($score >= 200){
		$diplome = base_url("assets/img/diplome/Diplôme.png");
	}
	elseif($score >= 150){
		$diplome = base_url("assets/img/diplome/Diplôme-Artiste-Herbe.png");
	}
	else {
		$diplome = base_url("assets/img/diplome/Diplôme-Artiste-Professionnel.png");
	}

?>
<table>
	<thead>
		<tr>
			<th>Classement</th>
			<th>Pseudo</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($ranking as $player) :
		?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $player -> name; ?></td>
			<td><?= $player -> score; ?></td>
		</tr>
		<?php
		$i++;
		endforeach;?>
	</tbody>
</table>

<h1 id="score"><?php echo $score ?></h1>
<img class="animated flip delay-1s" id="diplome" src="<?php echo $diplome ?>" />
<a href="<?php echo base_url() ?>Game/logout"><img id="home" src="<?php echo base_url() ?>assets/img/score/Boutons-home-score.png"></a>
</body>
</html>
