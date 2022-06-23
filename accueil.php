<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "header.php";
?>
<form>
<img src="logo.jpg" alt="logo du college">   
<h2>Veuillez faire un choix</h2><br>
<table>
  <tr>
  <th><input type="button" onclick="location.href='groupe.php'" value="Ajouter un groupe"></th>
  <th><input type="button" onclick="location.href='etudiant.php'" value="Ajouter un étudiant"></th>
  <th><input type="button" onclick="location.href='afficher.php'" value="Afficher données"></th>
  <th><input type="button" onclick="location.href='stats.php'" value="Compiler statistique"></th>
  </tr>
</table>
</form>



</body>
</html>