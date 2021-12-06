<?php

  session_start();
  
include('database_connection.php'); 
  

   require("bootstrap/locale.php");
  include('filters/guest_filters.php');
  // require('config/database.php');
   require('includes/functions.php');
  include('includes/constants.php'); 
  require("includes/init.php");


     echo "toto";
?>




<?php


       <?php if(count($microposts) != 0): ?>
                     <?php foreach ($microposts as $micropost): ?>
                         <article class="media status-media">
                         <div class="pull-left">
                          <img src="get_avatar_url($user_email) ?>"
                                alt="<?= $user->pseudo ?>" class="media-object">
                           </div>

                       <div class="media-body">
                        <h4 class="media-heading"><?= $user->pseudo ?></h4>
                         <p><i class="fa fa-clock-o"></i> <?= $micropost->created_at ?></p>
          
                       <?= $micropost->content ?>
    
                   </div>
            </article>
         <?php endforeach; ?>
     <?php  endif; ?>


?>



            <?php if(count($microposts) != 0): ?>
                     <?php foreach ($microposts as $key => $micropost): ?>
                         <article class="media status-media">
                         <div class="pull-left">
                          
                           </div> 

                       <div class="media-body">
                          <h4 class="media-heading"></h4>
                         <p><i class="fa fa-clock-o"></i></p>
    
                    </div>
               </article>
             <?php endforeach; ?>
         <?php  endif; ?>
