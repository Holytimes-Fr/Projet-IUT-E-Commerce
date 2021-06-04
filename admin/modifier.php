<?php
require('sql.php');

if (!isset($_POST['nom'])){ 
	$articles = getDetailsArticles();?>
	<html>
		<body>
		    <link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
			<h1>Modifier un articles</h1>
			<form method="post" action="modifier.php?Articles=<?=$articles['id']?>">
				<br>
				<input type="hidden" name="id" value="<?= $articles['id']?>">
				<label>Nom</label> <input type="text" name="nom" value="<?= $articles['Nom']?>">
				<br>
				<label>Marque</label> <input type="text" name="marque" value="<?= $articles['Marque']?>">
				<br>
				<label>Prix</label> <input type="text" name="prix" value="<?= $articles['Prix']?>">
				<br>
				<input type="submit" value="Modifier">
			</form>
		</body> 
	</html>
<?php } 
else{
	if (isset($_POST['nom']) and isset($_POST['marque']) and isset($_POST['prix'])){
		updateArticles($_POST['nom'], $_POST['marque'], $_POST['prix'], $_GET['Articles']);
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
	<meta http-equiv="refresh" content="1; url=articles.php" />
</body>
</html>
<?php }?>