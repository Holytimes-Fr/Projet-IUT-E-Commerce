<?php
    $serveur = "45.140.165.147";
    $dbname = "holytime_IUT";
    $user = "holytime_IUT";
    $pass = "tprzo.40";
    
    $nom = $_POST["nom"];
    $marque = $_POST["marque"];
    $prix = $_POST["prix"];
    $categorie = $_POST["categorie"];

    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO produit_secoours(id, Nom, Marque, Prix, Categorie)
            VALUES(0,:nom, :marque, :prix, :categorie)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':marque',$marque);
        $sth->bindParam(':prix',$prix);
        $sth->bindParam(':categorie',$categorie);
        $sth->execute();
        echo'Enregistrement valider';
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>