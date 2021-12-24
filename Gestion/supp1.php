<?php

include "dbConn.php"; // se connecter à la bdd

$cul = $_GET['cul']; // recupere le produit selon le nom de la culture

$del = mysqli_query($db,"delete from culture where cul = '$cul'"); // suprimer

if($del)
{
    mysqli_close($db); // se deconnecter
    header("location:gestionProd.php");
    exit;	
}
else
{
    echo "impossible de supprimer la ligne"; 
}
?>