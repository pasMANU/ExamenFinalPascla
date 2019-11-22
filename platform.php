<?php
session_start();
//echo "Index ". session_id();
?>

 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
        <center>
        <h2>
            
            
            <?php  echo "Bonjour ".$_SESSION["nom"]."   ".$_SESSION["prenom"];?>

</h2>
       
            </center>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Amway</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="login.php">Deconnexion</a></li>
      <li><a href="Fournisseur.php">Fournisseur</a></li>
      
    <li><a href="rendezvous.php">Rendez-Vous</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>



</body>
</html>
<?php
if(isset($_POST["search"])){
    $search=($_POST["search"]);
    
    if($search=="medecin"){
        echo"<script> window.location.href='medecin.php';</script>";
    }
  else{
      echo"<script> window.location.href='login.php';</script>";
  }
}

?>
