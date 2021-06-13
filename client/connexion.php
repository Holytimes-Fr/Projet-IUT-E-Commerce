<?php

session_start(); 
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "mail" n'est pas vide
    if(empty($_POST['mail'])) {
        echo "Le champ Mail est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $mail = htmlentities($_POST['mail'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("45.140.165.147", "holytime_IUT", "tprzo.40", "holytime_IUT");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT 'Mail','mdp' FROM utilisateurs WHERE mail = '".$mail."' AND mdp = '".$MotDePasse."'");
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le mail ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['mail'] = $mail; 
                    header('Location: ../index.php');
                }
            }
        }
    }
}
?>