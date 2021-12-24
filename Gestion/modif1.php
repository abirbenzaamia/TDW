<?php

include "dbConn.php"; // se connecter à la bdd

$cul = $_GET['cul']; // récupere le produit par le nom de la culture

$qry = mysqli_query($db,"select * from culture where cul='$cul'"); 

$data = mysqli_fetch_array($qry); // chercher le produit

if(isset($_POST['update'])) //modifier
{
    $superficie = $_POST['superficie'];
    $total = $_POST['total'];
	
    $edit = mysqli_query($db,"update culture set superficie='$superficie', total='$total' where cul='$cul'");
	
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
              <label for="cul"><b>Culture</b></label>
              <input type="text" placeholder="Culture" name="cul" value="<?php echo $data['cul'] ?>"  required>
              <label for="superficie"><b>Superficie cultivée</b></label>
              <input type="number" placeholder="Superficie cultivée" name="superficie" value="<?php echo $data['superficie'] ?>"  required>
              <label for="total"><b>Production totale</b></label>
              <input type="number" placeholder="Production totale" name="total" value="<?php echo $data['total'] ?>"  required>
              <button type="submit" name="update">Modifier</button>
            </div> 
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="window.history.go(-1)" class="cancelbtn">Annuler</button>
            </div>
        </form>
</div>
</body>