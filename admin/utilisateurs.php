<?php
require('sql.php');
$utilisateurs = getAllUtilisateurs();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>gestion Utilisateurs</title>
	</head>
	<body>
		<ul>
			<?php foreach ($utilisateurs as $utilisateurs): ?>
				<li>
					<?= $utilisateurs['Mail'] ?> <?= $utilisateurs['identifiant'] ?> <?= $utilisateurs['mdp'] ?> <a href="suprimer_ul.php?Utilisateurs=<?=$utilisateurs['id_users']?>">Supprimer</a> <a href="modifier_ul.php?Utilisateurs=<?=$utilisateurs['id_users']?>">Modifier</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>