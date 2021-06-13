<?php
require('sql.php');
$articles = getAllArticles(); // Récupère la liste d'articles
?>
<!-- 
Permet d'affciher tout les articles et de les modifier ou de les supprimer
 -->
<!DOCTYPE html>
<html>
	<head>
		<title>Articles</title>
	</head>
	<body>
	    <h1 class="Retour"><a href="admin-index.php">Retour</a></h1>
		<ul>
			<?php foreach ($articles as $articles): ?>
				<li>
					<?= $articles['Nom'] ?> <?= $articles['Marque'] ?> <?= $articles['Prix'] ?> <a href="suprimer.php?Articles=<?=$articles['id']?>">Supprimer</a> <a href="modifier.php?Articles=<?=$articles['id']?>">Modifier</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>