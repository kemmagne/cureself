<?php


  
include("bootstrap/locale.php");

?>


   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

   </head>
   <body>

<?php
   include("includes/header.php");  

?>

   <div class="corps col-md-10 well col-md-offset-1  well">
    
    <h1> le dernier jour d'un condannée</h1>


<?php
              
               if (isset($_GET['prenom']) AND isset($_GET['nom'])) // On a le nom et le prénom
                   {
                        echo  "le sida est un maladie sexuellement transmissible</br>";
                       
                }

             elseif (isset($_GET['preno']) AND isset($_GET['no'])) // On a le nom
             {
                    echo "je ne sais pas trop koi mettre ici eh moi je suis fatiguer </br>";
                   
                }


            else // Il manque des paramètres, on avertit le visiteur
             {
            echo 'Il faut renseigner un nom et un prénom !';
   
          }
?>
</div>


<?php  include("includes/footer.php");  

   ?>


   
   </body>
</html>