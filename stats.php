
<!DOCTYPE html>
<html>
<head>
<title>Affichez les statistiques</title>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="stats.php">
<img src="logo.jpg" alt="logo du college"> 
<p>Revenir vers <input type="button" onclick="location.href='accueil.php'" value="L'accueil"></p>
<?php
if (isset($_POST["stats"])){
    $conn = new mysqli('localhost', 'root', '', 'colnet');
    $sql = "SELECT * FROM etudiant";
    if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
        echo "<li>".$rowcount. ' '. "Étudiants ont été évalué !"."</li>"; 
    }
    }
    echo "<br>";
    if (isset($_POST["stats"])){
        $conn = new mysqli('localhost', 'root', '', 'colnet');
        $sql = "SELECT * FROM etudiant WHERE moyenne >=12";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo "<li>".$rowcount. ' '. "Étudiants ont réussi !"."</li>"; 
        }
        }
        echo "<br>";
        if (isset($_POST["stats"])){
            $conn = new mysqli('localhost', 'root', '', 'colnet');
            $sql = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21L'";
            $sql2 = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21L' AND moyenne >=12";
            $result=mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2); 
            $rowcount=mysqli_num_rows($result);
            $rowcount2=mysqli_num_rows($result2);
            $rowcount3=$rowcount2*100/$rowcount;
            echo "<li>". "Le taux de réussite en ligne est de ".$rowcount3. ' '. "%"."</li>"; 
            
            }
            echo "<br>";
        if (isset($_POST["stats"])){
            $conn = new mysqli('localhost', 'root', '', 'colnet');
            $sql = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21C'";
            $sql2 = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21C' AND moyenne >=12";
            $result=mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2); 
            $rowcount=mysqli_num_rows($result);
            $rowcount2=mysqli_num_rows($result2);
            $rowcount3=$rowcount2*100/$rowcount;
            echo "<li>"."Le taux de réussite en classe est de ".$rowcount3. ' '. "%"."</li>"; 
            
            }
            echo "<br>";
            if (isset($_POST["stats"])){
                $conn = new mysqli('localhost', 'root', '', 'colnet');
                $sql = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21H'";
                $sql2 = "SELECT * FROM etudiant WHERE codeGroupe='WEBA21H' AND moyenne >=12";
                $result=mysqli_query($conn,$sql);
                $result2=mysqli_query($conn,$sql2); 
                $rowcount=mysqli_num_rows($result);
                $rowcount2=mysqli_num_rows($result2);
                $rowcount3=$rowcount2*100/$rowcount;
                echo "<li>" ."Le taux de réussite en hybride est de ".$rowcount3. ' '. "%"."</li>"; 
                
                }
               
?>  

<h1>Voir les statistiques</h1>

<input type="submit" name="stats" value="Affichez les statistiques">

</form>
</body>
</html>