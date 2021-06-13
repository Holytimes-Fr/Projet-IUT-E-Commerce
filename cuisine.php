<?php
//affiche menu navigation
require_once('includes/header.php');
echo"<br/><br/><br/><br></br>";
//catégorie Cuisine
?>
<html>

    <link rel="stylesheet" href="style/articles.css">
    <div class="para">
    <h3>CUISINE</h3>
    <p>Tu te trouves danas la catégorie informatique...Tu retrouveras tout les ustensibles de cuisines et autres afin que tu puisses te faire de bon petit palt !
    </p>
    <br>
   
        <?php
        	    
        $objetPdo = new PDO('mysql:host=45.140.165.147;dbname=holytime_IUT','holytime_IUT','tprzo.40');
        
        //Préparation requete (elle ne va afficher que la catégorie Cuisine)
        $pdoStat = $objetPdo->prepare('SELECT * FROM `produit_secoours` WHERE Categorie = 3');
        
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