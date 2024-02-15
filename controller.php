<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs', 'root', '');
}
catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Condition pour le bouton "Ok"
if (isset($_POST['Ok'])) {
    $identifiant = $_POST['identifiant'];
    $motDePasse = $_POST['motDePasse'];

    // Requête pour vérifier si l'identifiant est présent dans la base de données
    $query = $bdd->prepare("SELECT * FROM util_psw WHERE identifiant = :identifiant");
    $query->bindParam(':identifiant', $identifiant);
    $query->execute();

    // Si l'identifiant est trouvé
    if ($query->rowCount() > 0) {
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe avec password_verify
        if (password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            echo "Vous êtes connecté";
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Vous n'êtes pas inscrit. Inscrivez-vous !";
    }
}

// Condition pour le bouton "Ajout Compte"
if (isset($_POST['Ajout_compte'])) {
    $identifiant = $_POST['identifiant'];
    $motDePasse = $_POST['motDePasse'];

    // Requête pour vérifier si l'identifiant existe déjà dans la base de données
    $query = $bdd->prepare("SELECT * FROM util_psw WHERE identifiant = :identifiant");
    $query->bindParam(':identifiant', $identifiant);
    $query->execute();

    // Si l'identifiant n'est pas trouvé, ajoutez le compte à la base de données
    if ($query->rowCount() == 0) {
        $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
        // Requête pour ajouter le compte à la base de données
        $insertQuery = $bdd->prepare("INSERT INTO util_psw (identifiant, mot_de_passe) VALUES (:identifiant, :motDePasse)");
        $insertQuery->bindParam(':identifiant', $identifiant);
        $insertQuery->bindParam(':motDePasse', $motDePasseHash);
        $insertQuery->execute();

        echo "Compte ajouté avec succès";
    } else {
        echo "Identifiant déjà utilisé, veuillez choisir un autre";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
</head>
<body>
<div class="center-box">
  </div>
</body>
</html>

