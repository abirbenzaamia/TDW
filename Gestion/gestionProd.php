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
    <div class="tab1">
        <div>
        <blockquote> Principales producions végétales mondiales </blockquote>
        </div>

        <table class="tableau1" id="tableau1">
            <thead>
                <tr><th> culture </th>
                <th> superficie cultivée (1 000 ha)</th>
                <th> Production totale (1 000 ha)</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr></thead>
<tbody>
          
<?php

include "dbConn.php"; 

$records = mysqli_query($db,"select * from culture ORDER BY cul "); // chercher les données de la bdd ordonnées

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <th><?php echo $data['cul']; ?></th>
    <td><?php echo $data['superficie']; ?></td>   
    <td><?php echo $data['total']; ?></td>   
    <td><a href="modif1.php?cul=<?php echo $data['cul']; ?>">Modifier</a></td>  
    <td><a href="supp1.php?cul=<?php echo $data['cul']; ?>">Supprimer</a></td> 
  </tr>	
<?php
}
?>
      
    </tbody>
       
        <tfoot>
         
        </tfoot>
    </table>
    <!-- confirmer la supression  -->
    <div id="id02" class="modal">
      <form action="supp1.php?cul=<?php echo $data['cul']; ?>" class="modal-content animate" >
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          <div class="btns">
              <p>Voulez-vous vraiment supprimer ce produit ?</p>
            <button type="submit" onclick="document.getElementById('id02').style.display='none'" class="confirmbtn" name="supp_btn">Confirmer</button>
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
          </div>
      </form>
    </div>
    <!-- ajouter une ligne  -->
    <div class="add">
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">ajouter une ligne</button>
    </div>
  <div id="id01" class="modal">
        <form class="modal-content animate" action="ajoutLi.php" method="post">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
              <label for="cul"><b>Culture</b></label>
              <input type="text" placeholder="Culture" name="cul" required>
              <label for="superficie"><b>Superficie cultivée</b></label>
              <input type="number" placeholder="Superficie cultivée" name="superficie" required>
              <label for="total"><b>Production totale</b></label>
              <input type="number" placeholder="Production totale" name="total" required>
              <button type="submit" name="ajout_btn1">Ajouter</button>
            </div> 
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
            </div>
        </form>
</div>
</div>

        <table class="tab2">
            <div>
            <blockquote> Principaux élevages mondiaux </blockquote>
            </div>
            <thead>
                <th>Espece</th>
                <th>Nombre (1000 tetes)</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr></thead>
            <tbody>
                <?php

                include "dbConn.php"; 
                
                $records = mysqli_query($db,"select * from espece ORDER BY espece"); // chercher les données de la bdd ordonnées
                
                while($data = mysqli_fetch_array($records))
                {
                ?>
                  <tr>
                    <th><?php echo $data['espece']; ?></th>
                    <td><?php echo $data['nombre']; ?></td>   
                    <td><a href="modif2.php?espece=<?php echo $data['espece']; ?>">Modifier</a></td>
                    <td><a href="supp2.php?espece=<?php echo $data['espece']; ?>">Supprimer</a></td>
                  </tr>	
                <?php
                }
                ?>
            
        
            </tbody>
        <tfoot>
        </tfoot>
    </table>
       <!-- ajouter une ligne  -->
       <div class="add">
        <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">ajouter une ligne</button>
    </div>
  <div id="id03" class="modal">
        <form class="modal-content animate" action="ajoutLi.php" method="post">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
              <label for="espece"><b>Espece</b></label>
              <input type="text" placeholder="Espece" name="espece" required>
              <label for="nombre"><b>Nombre</b></label>
              <input type="number" placeholder="Nombre" name="nombre" required>
              <button type="submit" name="ajout_btn2">Ajouter</button>
            </div> 
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Annuler</button>
            </div>
        </form>
</div>
  
</body>
</html>

