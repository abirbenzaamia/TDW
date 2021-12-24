<?php

//ajouter un produit dans la premiere table et dans la base de données
if (isset($_POST['ajout_btn1'])) {
    ajouterLi1();
}
function ajouterLi1(){
 include "dbConn.php";
    $culture = $_POST['cul'];
    $superficie = $_POST['superficie'];
    $total = $_POST['total'];
$sqlquery = " INSERT INTO culture VALUES 
    ('".$culture."',".$superficie.",".$total.");";
  
if ($db->query($sqlquery) === TRUE) {
    header('Location:gestionProd.php');
} else {
    echo "Erreur: " . $sqlquery . "<br>" . $db->error;
}

}
//ajouter un produit dans la deuxieme table et dans la base de données
if (isset($_POST['ajout_btn2'])) {
    ajouterLi2();
}
function ajouterLi2(){
    include "dbConn.php";
    $espece = $_POST['espece'];
    $nombre = $_POST['nombre'];
$sqlquery = " INSERT INTO espece VALUES 
    ('".$espece."',".$nombre.");";
  
if ($db->query($sqlquery) === TRUE) {
    header('Location:gestionProd.php');
} else {
    echo "Erreur: " . $sqlquery . "<br>" . $db->error;
}
}
?>