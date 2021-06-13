<!-- 
Génére une fenêtre qui donne les dernier articles qui ont été ajouté
 -->
    <div class="card card-4">
        <p>Articles recommandés :</p>
        <br1></br1>
        	   <?php
        	    
                $objetPdo = new PDO('mysql:host=45.140.165.147;dbname=holytime_IUT','holytime_IUT','tprzo.40');
        
                //Préparation requete
                $pdoStat = $objetPdo->prepare('SELECT * FROM produit_secoours ORDER BY Nom DESC LIMIT 0,2');
        
                //éxécution reqête
                $executeIsOk = $pdoStat->execute();
        
                //Récupération de donner
        
                $articles = $pdoStat->fetchAll();
                    
        	    ?>
        	    <ul>
        	    <?php foreach ($articles as $articles): ?>
        	        
        	       <h2 style="color:grey;"><?= $articles['Nom'] ?></h4>
        	       <h4 style="color:grey;"><?= $articles['Marque'] ?></h4>
        	       <h5 style="color:grey;"><?= $articles['Prix'] ?> €</h5>
        	       <br/><br/>
        	                
        	    <?php endforeach; ?>
                </ul>
    </div>    	     