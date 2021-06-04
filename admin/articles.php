<?php
require('sql.php');
$articles = getAllArticles();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Articles</title>
	</head>
	<body>
		<ul>
			<?php foreach ($articles as $articles): ?>
				<li>
					<?= $articles['Nom'] ?> <?= $articles['Marque'] ?> <?= $articles['Prix'] ?> <a href="suprimer.php?Articles=<?=$articles['id']?>">Supprimer</a> <a href="modifier.php?Articles=<?=$articles['id']?>">Modifier</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>