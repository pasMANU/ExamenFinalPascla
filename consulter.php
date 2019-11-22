
<?php
include('connexion.php');   
?>

   <style>
       
      
           
          /* background-color: burlywood;*/
          
       
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 30%;
}

.gg {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

.ff:nth-child(even) {
    background-color: #dddddd;
}
</style>
<!DOCTYPE html>
<html>
<head>
    
  <title>Amway</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <center>
          <body background-color: burlywood;>
          
          <?php
    echo "<h1>Liste des Fournisseurs </h1>";
   echo '<table>';
 echo '<tr>';
    echo '<th class="gg">Nom</th>';
   echo ' <th class="gg">adresse</th>';
   echo ' <th class="gg">telephone</th>';
      echo ' <th class="gg">Logo</th>';
         
  echo '</tr>';
    

     include("connexion.php");
     $requete2=mysqli_query($connect,"select * from fournisseur  ;")or die("Erreur de requete SQL");  
     while($resultat=mysqli_fetch_row($requete2))
     {
         $logo = $resultat[10];
         echo '<tr class="ff">';
        
        echo '<td>' .$resultat[3]. '</td>';
       echo '<td>' .$resultat[5]. '</td>';
         echo '<td>'.$resultat[9]. '</td>';
         echo'<td>'.$resultat[10]. '</td>';
       
    
     }

echo ' </table>';
            ?>
    </body>
          </center>       
    
    </head>
    
    </html>
    