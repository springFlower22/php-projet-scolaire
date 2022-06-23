<!DOCTYPE html>
<html>
<head>
<title>Création de compte utilisateurs</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
    
<form method="post" action="compte.php">
<img src="logo.jpg" alt="logo du college">   
<h1>Connexion</h1>
    <label for="nomComplet">nom complet</label>
    <input type="text" name="nomComplet" id="nomComplet"/><br>
    <label for="username">Username</label>
    <input type="text" name="username" id="username"/><br>
    <label for="codePostal">code postal</label>
    <input type="text" name="codePostal" id="codePostal"/><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email"/><br>
    <label for="motPasse">Mot de passe</label>
    <input type="password" name="motPasse" id="motPasse"/><br>
    <input type="submit" name="submit" value="Enregistrement du profil">
</form>
<?php
if (isset($_POST["submit"])){
?>
<p>Le compte à été crée ajouté avec succés vous pouvez vous <input type="button" onclick="location.href='login.php'" value="Connecter"></p>
<?php } ?>

</div> 
<?php
//Se connecter a la base de données
include "connexion.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //Préparation des données
    $nomComplet = $_POST["nomComplet"];
    $username = $_POST["username"];
    $codePostal = $_POST["codePostal"];
    $email = $_POST["email"];
    $motPasse = $_POST["motPasse"];
    //Création de la requete préparée
    $insertionutilisateurs = $conn->prepare(
        "INSERT INTO utilisateurs(nomComplet, username, codePostal, email, motPasse)
        VALUES (:nomComplet, :username, :codePostal, :email, :motPasse)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertionutilisateurs->bindParam(':nomComplet', $nomComplet);
    $insertionutilisateurs->bindParam(':username', $username);
    $insertionutilisateurs->bindParam(':codePostal', $codePostal);
    $insertionutilisateurs->bindParam(':email', $email);
    $insertionutilisateurs->bindParam(':motPasse', $motPasse);
    //Éxécution de requete
    $insertionutilisateurs->execute();
}
?>         

</body>
</html>