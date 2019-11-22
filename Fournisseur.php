<?php
include('connexion.php');   
?>

   <style>
       
       body{
           
           background-color: burlywood;
       }
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
<html lang="en">
<head>
  <title>Amway</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    
     <?php
    
      $id_four ="";
     $nom ="";
         
        $prenom ="";
         
        $sex ="";
         
        $adresse ="";
         
         $codepostal ="";
         
         $rue ="";
    
        $ville ="";
         
         $telephone ="";
        $logo ="logo.jpg";
   
    
    if(isset($_POST["OK"])){
        	$code=$_POST["choix"];
        
        $requete2=mysqli_query($connect,"select * from fournisseur where code='$code';")or die("Erreur de requete SQL"); 
		while($resultat=mysqli_fetch_row($requete2))
        {	
            $id_four = $resultat[0];
            $nom = $resultat[2];
            $prenom = $resultat[3];
            $sex = $resultat[4];
            $adresse = $resultat[5];
            $codepostal = $resultat[6];
            $rue = $resultat[7];
            $ville = $resultat[8];
            $telephone = $resultat[9];
            $logo = $resultat[10];
			
            
           
        }
    }
         
    if(isset($_POST['bouttons'])){
        
        
        $rst=$_POST['bouttons'];
        
        
               
              
                
        switch ($rst) {
            case 'ajouter':
        $nvid_four=trim($_POST['id_four']);
         
         $nvnom=trim($_POST["nom"]);
         $nvprenom=trim($_POST['prenom']);
        $nvcode=(substr("$nvprenom",0,3).substr("$nvnom",0,2));  
        $nvsex=trim($_POST['sex']);
        $nvadresse=trim($_POST['adresse']);
        $nvcodepostal=trim($_POST['codepostal']);
        $nvrue=trim($_POST['rue']); 
        $nvville=trim($_POST['ville']);
        $nvtelephone=trim($_POST['telephone']);

        
        
        
               
             
             $insert=mysqli_query($connect,"insert into fournisseur values('$nvid_four','$nvcode','$nvnom','$nvprenom','$nvsex','$nvadresse','$nvcodepostal','$nvrue','$nvville','$nvtelephone','$logo');") or die("erreur d ajout");
                if($insert==true) {
                    echo "<script> alert('Ajout  ressi');</script>";
                  
                    }
                    else{
                        echo "AJOUT non effectuer";
                        }
                 	break;
                
              
			case 'Modifier' :
    $ANCid_four= $_POST['listeNom'];
	$nom= trim($_POST['nom']," ");
$prenom=trim($_POST['prenom']," ");
$upid_four=substr("$prenom",0,3).substr("$nom",0,2);
                $ANCsex=trim($_POST['sex']);
        $ANCadresse=trim($_POST['adresse']);
        $ANCcodepostal=trim($_POST['codepostal']);
        $ANCrue=trim($_POST['rue']); 
        $ANCville=trim($_POST['ville']);
        $ANCtelephone=trim($_POST['telephone']);
/*$photo=$upcode.".jpg";*/
if($nom=="")
{
$message="Entrer Maquant Veuillez Recommencer";
				}
else if($prenom=="")
				{
$message="Entrer Maquant Veuillez Recommencer";
				}
				else
				{
				$code=$_POST['listeNom'];				
				$update=mysqli_query($connect,"update fournisseur set code='$upid_four',nom='$nom', prenom='$prenom' where code='$ANCid_four';") or die("Erreur de requete de mise a jour");
				$message="Mise a jour reussi";
				}				
			break;
       }
        
    }
    ?>

<div class="container">
  <h2>Fournisseur</h2><br/>
      <form method="POST">
   <label for="num">Code Des fournisseurs</label>
 
       
        <select class="form-control" id="sel1"  name="choix">
              <?php	
	$requete=mysqli_query($connect,"select * from fournisseur;")or die("Erreur de requete SQL"); 
     while($resultat=mysqli_fetch_row($requete))
                {
					$code = $resultat[1];
					$choix=$_POST['listeNom'];
                    if($choix==$code)
					{
						$selected="selected";
					}
                    else
                    {
						$selected="";
                    }            
                  echo "<option  value='$code' $selected >$code</option>";
                } 
	?>
            </select>
        <button type="submit" class="btn btn-default" name="OK" value="OK">AFFICHER</button>
          
           <div class="form-group">
      <label for="usr">Id:</label>
      <input type="text" class="form-control"name="id_four" id="usr"value='<?php echo  $id_four; ?>'/>
    </div>
    <div class="form-group">
      <label for="usr">nom:</label>
      <input type="text" class="form-control"placeholder="entrer le nom" id="usr"name="nom"  value='<?php echo $nom ;?>'/>
    </div>
      
       <div class="form-group">
      <label for="usr">prenom </label>
      <input type="text" class="form-control"name="prenom" id="usr"value='<?php echo  $prenom; ?>'/>
    </div>
       <div class="form-group">
      <label for="usr">sex:</label>
      <input type="text" class="form-control" name="sex"id="usr"value='<?php echo $sex ;?>'/>
    </div>
       <div class="form-group">
      <label for="usr">adresse:</label>
      <input type="text" class="form-control" name="adresse" id="usr"value='<?php echo $adresse; ?>'/>
    </div>
       <div class="form-group">
      <label for="usr">codepostale:</label>
      <input type="text" class="form-control" name="codepostal"id="usr"value='<?php echo $codepostal; ?>'/>
    </div>
       <div class="form-group">
      <label for="usr">rue:</label>
      <input type="text" class="form-control" name="rue" id="usr"value='<?php echo $rue; ?>'/>
    </div>
       <div class="form-group">
      <label for="usr">ville:</label>
      <input type="text" class="form-control" name=ville id="usr"value='<?php echo  $ville; ?>'/>
    </div>
    <div class="form-group">
      <label for="pwd">telephone:</label>
      <input type="text" class="form-control" name="telephone"id="pwd"value='<?php echo  $telephone; ?>'/>
    </div>
          
        
      
       <button type="submit" class="btn btn-default" name="bouttons" value="ajouter" >AJOUTER</button>
      
     <button type="submit" class="btn btn-default" name="bouttons" 
  value="Modifier">MODIFIE</button>
          
  
    
      
          <button type="submit" class="btn btn-default" name="rest" value="vide" >VIDER</button><br/><br/>
          </form>
</div>
        <center>
          
          
          <?php
    echo "<h1>Liste des Fournisseurs </h1>";
   echo '<table>';
 echo '<tr>';
    echo '<th class="gg">Nom</th>';
   echo ' <th class="gg">adresse</th>';
   echo ' <th class="gg">telephone</th>';
    
         
  echo '</tr>';
    

     include("connexion.php");
     $requete2=mysqli_query($connect,"select * from fournisseur  ;")or die("Erreur de requete SQL");  
     while($resultat=mysqli_fetch_row($requete2))
     {
         echo '<tr class="ff">';
        
        echo '<td>' .$resultat[3]. '</td>';
       echo '<td>' .$resultat[5]. '</td>';
         echo '<td>' .$resultat[9]. '</td>';
         
       
    
     }

echo ' </table>';
            ?>
          </center>     
        
  

</body>
</html>

