<?php
//Connexion a la base de données
include "connexion.php";
//Affichage pour le filtre Ville
if(isset($_POST["submit"])){
//Récupération des données
$username = $_POST["username"];
$pwd = $_POST["password"];
//Préparation de la requete
$statementUser = $conn->prepare("SELECT COUNT(*) as 'Nombre' FROM utilisateurs WHERE username = :username AND motPasse = :motPasse");
//Liaison des valeurs avec les marqueurs
$statementUser->bindParam(':username', $username);
$statementUser->bindParam(':motPasse', $pwd);
$statementUser->execute();
$resultUser = $statementUser->fetch(PDO::FETCH_ASSOC);
}
?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="login.php" method="POST">
            <img src="logo.jpg" alt="logo du college">  
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" name='submit' value='LOGIN' >
                <a href='compte.php'>créer un compte</a>
                <?php
if(isset($_POST["submit"])){
if($resultUser["Nombre"] == 0){
    echo "<p style=color:red><b>Crédentiels invalides, vérifiez vos informations ou créer un compte</p>";
    }else {
        echo "<p style=color:green><b>Crédentiels valides, vous pouvez accéder à <a href='accueil.php'>l'accueil</a></b></p>";
    }
}
?>
</form>

            </form>
        </div>
    </body>
</html>