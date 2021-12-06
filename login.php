

<?php

session_start();




include('database_connection.php'); 
  

   require("bootstrap/locale.php");
  include('filters/guest_filters.php');
  // require('config/database.php');
   require('includes/functions.php');
  include('includes/constants.php'); 
  require("includes/init.php");


  if(isset($_POST['login'])) {

   if(not_empty(['identifiant', 'password'])){

        extract($_POST);

       $q = $connect->prepare("SELECT user_id, pseudo, email FROM login 
                        WHERE (pseudo = :identifiant or email = :identifiant)
                        AND password = :password AND active = '1'");

         $q->execute([
             'identifiant' => $identifiant,
             'password' => sha1($password)
           ]);

         $userHasBeenFound = $q->rowCount();

         if($userHasBeenFound){

              $user = $q->fetch(PDO::FETCH_OBJ);

               $_SESSION['user_id'] = $user->user_id;
               $_SESSION['pseudo'] = $user->pseudo;
               $_SESSION['email'] = $user->email;



           redirect_intent_or('profile.php?id='.$user->user_id);
             
  

       

         } else {
           set_flash('combinaison identifiant/Password incorrecte', 'danger');
           
           save_input_data();
         }
      }


     } else {

  clear_input_data();
}



?>



<html>  
    <head>  
    
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>-->  
    <body>  

       


        <div class="container">
   <br />
        
   <div class="col-md-6">
   <h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
       
         <?php include('header.php'); ?>
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Login</div>
    <div class="panel-body">
     <form method="post"  data-parsley-validate>
      <p class="text-danger">
      <div class="form-group">
       <label>Pseudo ou Adresse emaail</label>
       <input type="text" name="identifiant" class="form-control"  id="identifiant" value="<?= get_input('identifiant') ?>" required="required" />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control"   value="<?= get_input('password') ?>" required="required" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="connexion" />
      </div>
         <div align="center">
             <a href="register.php">Register</a></div>
     </form>
    </div>
   </div>
  </div>
  </div>
    </body>  
</html>

 <?php include('partials/_footer.php'); ?>

