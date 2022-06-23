<!DOCTYPE html>
<html>
<head>
<title>Création de compte utilisateurs</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "header.php";
?>
<form method="post" action="groupe.php">
<img src="logo.jpg" alt="logo du college">   
<h1>Ajouter un groupe</h1>

    <label for="nom">code</label>
    <input type="text" name="code" id="code"/><br>
    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom"/><br>
    <label for="types">Choisir un type</label>
            <select name="types">
                <option value="En ligne">En ligne</option>
                <option value="En classe">En classe</option>
                <option value="Hybride">Hybride</option>
            </select>
            <input type="submit" name="submit" value="Ajouter">
            <p>Revenir vers <input type="button" onclick="location.href='accueil.php'" value="L'accueil"></p>
            <?php
if (isset($_POST["submit"])){
    echo "<p style='color:black'>Le groupe " .$_POST["code"] . " à été ajouté avec succès </p>";
} 
?>
</div> 
</form>


<?php

include "connexion.php";

if(isset($_POST["submit"])){
    //Préparation des données
    $nom = $_POST["nom"];
    $code = $_POST["code"];
    $types = $_POST["types"];
    //Création de la requete préparée
    $insertiongroupe = $conn->prepare(
        "INSERT INTO groupe(code, nom, types)
        VALUES (:code, :nom, :types)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertiongroupe->bindParam(':code', $code);
    $insertiongroupe->bindParam(':nom', $nom);
    $insertiongroupe->bindParam(':types', $types);

    $insertiongroupe->execute();
}
?>         

</body>
</html>