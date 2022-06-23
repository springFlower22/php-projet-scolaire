
<!DOCTYPE html>
<html>
<head>
<title>Tri sur la moyenne</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="afficher.php">
<img src="logo.jpg" alt="logo du college"> 
<?php
if (isset($_POST["desc"])){
        $groupe = $_POST["groupe"];
        $mysqli = new mysqli("localhost", "root", "", "colnet");
		$mysqli->set_charset("utf8");
        $requete = "SELECT * FROM etudiant WHERE codeGroupe=
        '$groupe'
        ORDER BY moyenne DESC";
		$resultat = $mysqli->query($requete);
        echo "<table>".
         "<thead>".
        "<tr>".
           "<th>Code permanent</th>".
           "<th>Nom complet</th>".
            "<th>Adresse</th>".
            "<th>Téléphone</th>".
            "<th>Moyenne</th>".
            "<th>Code Groupe</th>".
        "</tr>".
    "</thead>".
     "<tbody>";
		while ($ligne = $resultat->fetch_assoc()) {
            echo "<td>".$ligne['codePermanent'] ."</td>";
			echo "<td>".$ligne['nomComplet'] ."</td>".'<br>';
			echo "<td>".$ligne['adresse'] ."</td>".'<br>';
			echo "<td>".$ligne['telehpone'] ."</td>".'<br>';
			echo "<td>".$ligne['moyenne'] ."</td>".'<br>';
			echo "<td>".$ligne['codeGroupe'] ."</td>".'<br>';
			echo "</thead>";
		echo "<tbody>";
		}
		$mysqli->close();
    }

    if (isset($_POST["asc"])){
        $groupe = $_POST["groupe"];
        $mysqli = new mysqli("localhost", "root", "", "colnet");
		$mysqli->set_charset("utf8");
		$requete = "SELECT * FROM etudiant WHERE codeGroupe='$groupe'
        ORDER BY moyenne";
		$resultat = $mysqli->query($requete);
        echo "<table>".
         "<thead>".
        "<tr>".
           "<th>Code permanent</th>".
           "<th>Nom complet</th>".
            "<th>Adresse</th>".
            "<th>Téléphone</th>".
            "<th>Moyenne</th>".
            "<th>Code Groupe</th>".
        "</tr>".
    "</thead>".
     "<tbody>";
		while ($ligne = $resultat->fetch_assoc()) {

			echo "<td>".$ligne['codePermanent'] ."</td>";
			echo "<td>".$ligne['nomComplet'] ."</td>".'<br>';
			echo "<td>".$ligne['adresse'] ."</td>".'<br>';
			echo "<td>".$ligne['telehpone'] ."</td>".'<br>';
			echo "<td>".$ligne['moyenne'] ."</td>".'<br>';
			echo "<td>".$ligne['codeGroupe'] ."</td>".'<br>';
			echo "</thead>";
		echo "<tbody>";
		}
		$mysqli->close();
    }
		?>  
<h1>Veuillez appliquer vos filtres</h1>
<div>
 <label for="groupe">Choisir un groupe :</label>
    <select name="groupe">
                <option value="WEBA21C">WEBA21C</option>
                <option value="WEBA21H">WEBA21H</option>
                <option value="WEBA21L">WEBA21L</option>
            </select>
        </div>
        <br>
<label> Tri sur la moyenne </label>
<input type="submit" name="desc" value="tri descendant">
<input type="submit" name="asc" value="tri ascendant"><br>
<p>Revenir vers <input type="button" onclick="location.href='accueil.php'" value="L'accueil"></p>
</form>
</body>
</html>