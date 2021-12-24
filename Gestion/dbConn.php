<?php
$db ;
    //connecter à la base de données
    try {
        $servername = "localhost";
        $dbname = "tdw";
        $username = "root";
        $password = ""; 
        $db = mysqli_connect($servername, $username, $password, $dbname);           
    }
    catch(PDOException $e) {
       echo "<script language='javascript'>";
       echo "alert('Connexion échouée'". $db->connect_error .")";
       echo "</script>";
       
    }

    ?>