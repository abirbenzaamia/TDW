<?php

  if (isset($_POST['login_button'])) {
  	login();
  }

// LOGIN Admin
 function login(){
    $db = "" ;
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
       echo "alert('Connection erronée')";
       echo "</script>";
    
    }
//recuperer les valeurs de input
	  $username = trim($_POST['username']);
	  $password = trim($_POST['password']);
   
        $db = mysqli_connect('localhost', 'root', "", "tdw");
		$query = "SELECT * FROM admins WHERE user='$username' AND pwd='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {  //si l'admin existe i.e il s'agit d'un admin
            $_SESSION['username'] = $username;
           $_SESSION['password']= $password;
           echo "l'admin ".$_SESSION['username']."est connecté";
           header("Location:Gestion/gestionProd.php"); 
		}else  {
      echo '<script type="text/javascript"> alert ( "Merci. '.$username.' n est pas un admin "); window.history.back(); </script> ';
    }
		// se deconnecter 
     mysqli_close($db);
    exit;
 }
	
?>