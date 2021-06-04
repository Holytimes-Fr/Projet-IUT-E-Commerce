<?php
    $serveur = "45.140.165.147";
    $dbname = "holytime_IUT";
    $user = "holytime_IUT";
    $pass = "tprzo.40";
    
    $mail = $_POST["mail"];
    $identifiant = $_POST["identifiant"];
    $mdp = $_POST["mdp"];
    //$img = $_FILES["img"]["name"];
    //$img_tmp = $_FILES['img']['tmp_name'];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO utilisateurs(Mail, identifiant, mdp)
            VALUES(:mail, :identifiant, :mdp)");
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':identifiant',$identifiant);
        $sth->bindParam(':mdp',$mdp);
        $sth->execute();
        echo'Enregistrement valider';
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>