<!DOCTYPE html>
<html>
<head>
<title>Création des étudiants</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
    
<form method="post" action="etudiant.php">
<img src="logo.jpg" alt="logo du college">   
<h1>Ajouter un étudiant</h1>
    <label for="codeP">Code Permanent</label>
    <input type="text" name="codeP" id="codeP"/><br>
    <label for="nomC">Nom Complet</label>
    <input type="text" name="nomC" id="nomC"/><br>
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse"/><br>
    <label for="telehpone">Téléphone</label>
    <input type="text" name="telehpone" id="telehpone"/><br>
    <label for="moyenne">Moyenne</label>
    <input type="text" name="moyenne" id="moyenne"/><br>
    <select name="codeGroupe">
                <option value="WEBA21L">WEBA21L</option>
                <option value="WEBA21C">WEBA21C</option>
                <option value="WEBA21H">WEBA21H</option>
            </select>
    <input type="submit" name="submit" value="Ajout de l'etudiant">
    <p>Revenir vers <input type="button" onclick="location.href='accueil.php'" value="L'accueil"></p>
    <?php
if (isset($_POST["submit"])){
    echo "<p>L'étudiant " .$_POST["nomC"] . " à été ajouté(e) avec succès </p>";
} 
?>
</div> 
<?php
//Se connecter a la base de données
include "connexion.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //Préparation des données
    $codeP = $_POST["codeP"];
    $nomC = $_POST["nomC"];
    $adresse = $_POST["adresse"];
    $telehpone = $_POST["telehpone"];
    $moyenne = $_POST["moyenne"];
    $codeGroupe = $_POST["codeGroupe"];
    //Création de la requete préparée
    $insertionetudiant = $conn->prepare(
        "INSERT INTO etudiant(codePermanent, nomComplet, adresse, telehpone, moyenne, codeGroupe)
        VALUES (:codeP, :nomC, :adresse, :telehpone, :moyenne, :codeGroupe)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertionetudiant->bindParam(':codeP', $codeP);
    $insertionetudiant->bindParam(':nomC', $nomC);
    $insertionetudiant->bindParam(':adresse', $adresse);
    $insertionetudiant->bindParam(':telehpone', $telehpone);
    $insertionetudiant->bindParam(':moyenne', $moyenne);
    $insertionetudiant->bindParam(':codeGroupe', $codeGroupe);
    //Éxécution de requete
    $insertionetudiant->execute();
}
?>         


</form>
</body>
</html>