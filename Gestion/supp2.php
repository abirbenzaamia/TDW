<?php

include "dbConn.php"; 

$espece = $_GET['espece'];

$del = mysqli_query($db,"delete from espece where espece = '$espece'"); 

if($del)
{
    mysqli_close($db); 
    header("location:gestionProd.php"); 
    exit;	
}
else
{
    echo "impossible de supprimer la ligne"; 
}
?>