<?php
            
            $connect=mysqli_connect('localhost','root','','synthese') or die("Erreur de connexion a MySQL");        
 mysqli_select_db($connect,'synthese')  or die ("Erreur de connexion a la base de donnees sicade"); 
            
          ?>