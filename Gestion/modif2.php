<?php

include "dbConn.php"; // se connecter à la bdd

$espece = $_GET['espece']; // récupere le produit par le nom de l'espece

$qry = mysqli_query($db,"select * from espece where espece='$espece'"); 

$data = mysqli_fetch_array($qry); // chercher le produit

if(isset($_POST['update']))  //modifier
{
    $espece = $_POST['espece'];
    $nombre = $_POST['nombre'];
	
    $edit = mysqli_query($db,"update espece set nombre='$nombre' where espece='$espece'");
	
    if($edit)
    {
        mysqli_close($db); // se deconnecter de la bdd
        header("location:gestionProd.php"); 
        exit;
    }
    else
    {
        echo "impossible de modifier la ligne";
    }    	
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleProd.css" type="text/css" >
    <script type="text/javascript" src="jquery-3.6.0.js"></script>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <title>Gestion des produits</title>
</head>
<body>
<div >

        <form class="modal-content animate" method="post">
        <h3>Modifier les données</h3>
           
            <div class="container">
              <label for="espece"><b>Espece</b></label>
              <input type="text" placeholder="Espece" name="espece" value="<?php echo $data['espece'] ?>"  required>
              <label for="espece"><b>Nombre</b></label>
              <input type="number" placeholder="Nombre" name="nombre" value="<?php echo $data['nombre'] ?>"  required>
              <button type="submit" name="update">Modifier</button>
            </div> 
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="window.history.go(-1)" class="cancelbtn">Annuler</button>
            </div>
        </form>
</div>
</body>