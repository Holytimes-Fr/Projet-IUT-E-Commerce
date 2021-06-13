<?php
//Permet de suprimmer un utilisteurs
$objetPdo = new PDO('mysql:host=45.140.165.147;dbname=holytime_IUT','holytime_IUT','tprzo.40');

//Préparation requete
$pdoStat = $objetPdo->prepare('DELETE FROM utilisateurs WHERE id_users=:num');

//Liason de num
$pdoStat->bindValue(':num', $_GET['Utilisateurs']);

//éxécution reqête
$executeIsOk = $pdoStat->execute();

if ($executeIsOk) {

	$message = 'Le produits a été supprimé !';

}
else{
 	$message = 'Erreur avec la suppression !';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<meta http-equiv="refresh" content="1; url=https://projet.holytimes.eu/admin/utilisateurs.php" />
</body>
</html>