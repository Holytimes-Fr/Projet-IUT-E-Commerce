<?php
//affiche menu navigation
require_once('includes/header.php');
echo"<br/><br/><br/><br></br>";
//catégorie JArdin
?>
<html>
    <link rel="stylesheet" href="style/articles.css">
    <div class="para">
    <h3>JARDIN</h3>
    <p>Tu te trouves daas la catégorie jardin...Tu retrouveras tout le matériels necessaire pour embellir ton jardin !
    </p>
    <br>
   
        <?php
        	    
        $objetPdo = new PDO('mysql:host=45.140.165.147;dbname=holytime_IUT','holytime_IUT','tprzo.40');
        
        //Préparation requete (elle ne va afficher que la catégorie Jardin)
        $pdoStat = $objetPdo->prepare('SELECT * FROM `produit_secoours` WHERE Categorie = 2');
        
        //éxécution reqête
        $executeIsOk = $pdoStat->execute();
        
        //Récupération de donner
        
        $articles = $pdoStat->fetchAll();
                    
        ?>
        <?php foreach ($articles as $articles): ?>
        <div class="cadre">
        <ul>	        
        <h2 style="color:grey;"><?= $articles['Nom'] ?></h4>
        <h4 style="color:grey;"><?= $articles['Marque'] ?></h4>
        <h5 style="color:grey;"><?= $articles['Prix'] ?> €</h5>
        <h5 style="color:grey;"><a href="rupture.php">Acheter !</a></h1>
        </ul>
        </div>
        <br/><br/>
        <?php endforeach; ?>
    </div>
</html>

<?php
require_once('includes/footer.php');

?>