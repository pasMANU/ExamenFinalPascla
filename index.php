

<?php
 session_start();


	include('connexion.php');      
?>




<link rel="stylesheet" type="text/css" href="./css/style.css">

<script>
$('.error-page').hide(0);

$('.login-button , .no-access').click(function(){
  $('.login').slideUp(500);
  $('.error-page').slideDown(1000);
});

$('.try-again').click(function(){
  $('.error-page').hide(0);
  $('.login').slideDown(1000);
});

</script>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>




 <?php
        $statut="";
        $nom ="";
        $prenom="";
        
        if(isset($_POST['inser']))  
      {
          $_SESSION['code']=($_POST['code']);
           $_SESSION['pswd']=($_POST['pswd']);
         
            
            //$connect=mysqli_connect('localhost','root','','magasinscolaire') or die("error of connecting to the data base magasin");
            $requete2=mysqli_query($connect,"select * from membre where code='".$_SESSION['code']."' and password='".$_SESSION['pswd']."';")or die("Erreur de requete SQL"); 
		while($resultat=mysqli_fetch_row($requete2))
        {	
            $code=$resultat[0];
            $nom = $resultat[1];
            $prenom= $resultat[2];
			$statut=$resultat[3];
            $password=$resultat[4];
              
                               
        }
             if($statut=="Employe")  
                        {
                           echo"<script>window.location.href='Employe.php';</script>";
                        }
                     
                       else
                          { echo '<script language="Javascript">
alert ("Veuillez entrez votre code/Mauvais code ou mot de passe!." )
</script>'	;	; } 
                     
                   
        }
          $_SESSION['nom']=$nom;
          $_SESSION['prenom']=$prenom;
          $_SESSION['statut']=$statut;
        ?>
        


<form method="POST">

<div class="login">
  <div class="login-header">
    <h1>Amway</h1>
  </div>
  <div class="login-form">
    <h3>Username:</h3>
    <input type="text" placeholder="Username" name="code"/><br>
    <h3>Password:</h3>
    <input type="password" placeholder="Password" name="pswd"/>
    <br>
    <input type="submit" value="Login" name="inser" class="login-button"/>
    <br>
    <a class="sign-up">Bienvenu</a>
    <br>
    <h6 class="no-access">Pascal emmanuel Gnininvi</h6>
  </div>
</div>

    </form>