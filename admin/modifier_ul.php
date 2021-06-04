<?php
require('sql.php');

if (!isset($_POST['identifiant'])){ 
	$utilisateurs = getDetailsUtilisateurs();?>
	<html>
		<body>
		    <link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
			<h1>Modifier un articles</h1>
			<form method="post" action="modifier_ul.php?Utilisateurs=<?=$utilisateurs['id_users']?>">
				<br>
				<input type="hidden" name="id" value="<?= $utilisateurs['id_users']?>">
				<label>Mail</label> <input type="text" name="mail" value="<?= $utilisateurs['Mail']?>">
				<br>
				<label>Identifiant</label> <input type="text" name="identifiant" value="<?= $utilisateurs['identifiant']?>">
				<br>
				<label>Mot de passe</label> <input type="text" name="mdp" value="<?= $utilisateurs['mdp']?>">
				<br>
				<input type="submit" value="Modifier">
			</form>
		</body> 
	</html>
<?php } 
else{
	if (isset($_POST['mail']) and isset($_POST['identifiant']) and isset($_POST['mdp'])){
		updateUtilisateurs($_POST['mail'], $_POST['identifiant'], $_POST['mdp'], $_GET['Utilisateurs']);
		$message = 'Modification réussi !';
	}
	else{
		$message = 'Vous devez remplir tout les champs !';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= $message ?>
	<meta http-equiv="refresh" content="1; url=utilisateurs.php" />
</body>
</html>
<?php }?>