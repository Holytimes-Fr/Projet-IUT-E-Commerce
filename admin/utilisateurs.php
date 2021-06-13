<?php
require('sql.php');
$utilisateurs = getAllUtilisateurs();//affiche tout les utilisateur inscrit sur le site
?>
<!DOCTYPE html>
<html>
    <!-- 
Permet de suprimer un utilisteur ou de le modifier 
 -->
	<head>
		<title>gestion Utilisateurs</title>
	</head>
	<body>
	    <h1 class="Retour"><a href="admin-index.php">Retour</a></h1>
		<ul>
			<?php foreach ($utilisateurs as $utilisateurs): ?>
				<li>
					<?= $utilisateurs['Mail'] ?> <?= $utilisateurs['identifiant'] ?> <?= $utilisateurs['mdp'] ?> <a href="suprimer_ul.php?Utilisateurs=<?=$utilisateurs['id_users']?>">Supprimer</a> <a href="modifier_ul.php?Utilisateurs=<?=$utilisateurs['id_users']?>">Modifier</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>