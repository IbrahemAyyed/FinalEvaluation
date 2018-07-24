<?php

require_once('connect.php');

$order = '';
$errors = array();


if (isset($_GET['order']) && isset($_GET['column'])) {

	if ($_GET['column'] == 'lastname') {
		$order = ' ORDER BY lastname';
	} elseif ($_GET['column'] == 'firstname') {
		$order = ' ORDER BY firstname';
	} elseif ($_GET['column'] == 'birthdate') {
		$order = ' ORDER BY birthdate';
	}
	if ($_GET['order'] == 'asc') {
		$order .= ' ASC';
	} elseif ($_GET['order'] == 'desc') {
		$order .= ' DESC';
	}
}


if (!empty($_POST)) {
	/*
    foreach($_POST as $key => $value)
    {
        $post[$key] = strip_tags(trim($value));
    }
	 */
//  Vérification de données 
	if (strlen($_POST['firstname'] > 3)) {
		$errors[] = 'Le prénom doit comporter au moins 3 caractères';
	}

	if (!strlen($_POST['lastname'] < 3)) {
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
	}

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "L'adresse email est invalide";
	}

	if (empty($_POST['birthdate'])) {
		$errors[] = 'La date de naissance doit être complétée';
	}
	if (empty($_POST['city'])) {
		$errors[] = 'La ville ne peut être vide';
	}
	// S'il y a pas d'erreur, on envoie les données dans la base de données

	if (count($errors) == 0) { 
        // error = 0 = insertion user
		$insertUser = $db->prepare('INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)');

		$insertUser->bindValue(':gender', $_POST['gender']);
		$insertUser->bindValue(':firstname', $_POST['fistname']);
		$insertUser->bindValue(':lastname', $_POST['lastname']);
		$insertUser->bindValue(':email', $_POST['email']);
		$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($_POST['birthdate'])));

		$insertUser->bindValue(':city', $_POST['city']);


		if ($insertUser->execute()) {
			$createUser = true;
		} else {
			$errors[] = 'Erreur SQL';
		}
	}
	// Requete pour afficher les données déjà existantes dans la BDD
	$queryUsers = $db->prepare('SELECT * FROM users' . $order);
	if ($queryUsers->execute()) {
		$users = $queryUsers->fetchAll();
	}

}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Exercice 2</title>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

	<h1>Liste des utilisateurs</h1>
	
	<p>Trier par : 
		<a href="index.php?column=firstname&order=asc">Prénom (croissant)</a> |
		<a href="index.php?column=firstname&order=desc">Prénom (décroissant)</a> |
		<a href="index.php?column=lastname&order=asc">Nom (croissant)</a> |
		<a href="index.php?column=lastname&order=desc">Nom (décroissant)</a> |
		<a href="index.php?column=birthdate&order=desc">Âge (croissant)</a> |
		<a href="index.php?column=birthdate&order=asc">Âge (décroissant)</a>
	</p>
	<br>

	<div class="row">
<?php
if (isset($createUser) && $createUser == true) {
	echo '<div class="col-md-6 col-md-offset-3">';
	echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
	echo '</div><br>';
}
if (!empty($errors)) {
	echo '<div class="col-md-6 col-md-offset-3">';
	echo '<div class="alert alert-danger">' . implode('<br>', $errors) . '</div>';
	echo '</div><br>';
}
?>


	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>Civilité</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo $user['gender']; ?></td>
					<td><?php echo $user['firstname']; ?></td>
					<td><?php echo $user['lastname']; ?></td>
					<td><?php echo $user['email']; ?></td>
					<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y; ?> ans</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="col-md-12">

		<form method="post" class="form-horizontal well well-sm">
		<fieldset>
		<legend>Ajouter un utilisateur</legend>

			<div class="form-group">
			<label class="col-md-1 control-label" for="gender">Civilité</label>
			<div class="col-md-11">
				<select id="gender" name="gender" class="form-control input-md" required>
				<option value="Mlle">Mademoiselle</option>
					<option value="Mme">Madame</option><option value="M">Monsieur</option>
				</select>
		</div>
		</div>
			<div class="form-group">
			<label class="col-md-1 control-label" for="firstname">Prénom</label>
			<div class="col-md-11">
			<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
				</div>
		</div>
		<div class="form-group">
			<label class="col-md-1 control-label" for="lastname">Nom</label>  
			<div class="col-md-11">
				<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
			</div>
		</div>

			<div class="form-group">
			<label class="col-md-1 control-label" for="email">Email</label>  
		<div class="col-md-11">
		<input id="email" name="email" type="email" class="form-control input-md" required>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-1 control-label" for="city">Ville</label>  
		<div class="col-md-11">
			<input id="city" name="city" type="text" class="form-control input-md" required>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-1 control-label" for="birthdate">Date de naissance</label>  
		<div class="col-md-11">
		<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
		<span class="help-block">au format JJ-MM-AAAA</span>  
		</div>
		</div>

		<div class="form-group">
		<div class="col-md-2 col-md-offset-1"><button type="submit" class="btn btn-primary">Envoyer</button></div>
		</div>
		</fieldset>
		</form>
	</div>
</div>
</body>
</html>