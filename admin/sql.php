<?php
function dbConnect(){
	try
	{
		$bdd = new PDO('mysql:host=45.140.165.147;dbname=holytime_IUT','holytime_IUT','tprzo.40');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}
function getAllArticles(){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('SELECT * FROM produit_secoours ORDER BY Nom ASC');
	$executeIsOk = $pdoStat->execute();
	$articles = $pdoStat->fetchAll();
	return $articles;
}
function getAllUtilisateurs(){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('SELECT * FROM utilisateurs ORDER BY Mail ASC');
	$executeIsOk = $pdoStat->execute();
	$utilisateurs = $pdoStat->fetchAll();
	return $utilisateurs;
}
function getDetailsUtilisateurs(){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('SELECT * FROM utilisateurs WHERE id_users=:num ');
	$pdoStat->bindValue(':num', $_GET['Utilisateurs']);
	$executeIsOk = $pdoStat->execute();
	$utilisateurs = $pdoStat->fetch();
	return $utilisateurs;
}
function getDetailsArticles(){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('SELECT * FROM produit_secoours WHERE id=:num ');
	$pdoStat->bindValue(':num', $_GET['Articles']);
	$executeIsOk = $pdoStat->execute();
	$articles = $pdoStat->fetch();
	return $articles;
}
function updateArticles($nom, $marque, $prix, $id){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('UPDATE produit_secoours SET Nom = ?, Marque = ?, Prix = ? WHERE id = ?');
	$pdoStat->execute(array($nom, $marque, $prix, $id));
}
function updateUtilisateurs($mail, $identifiant, $mdp, $id){
	$objetPdo = dbConnect();
	$pdoStat = $objetPdo->prepare('UPDATE utilisateurs SET Mail = ?, identifiant = ?, mdp = ? WHERE id_users = ?');
	$pdoStat->execute(array($mail, $identifiant, $mdp, $id));
}
?>