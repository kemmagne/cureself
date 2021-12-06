<?php

 session_start();  
 require('includes/functions.php');
  include('filters/auth_filters.php');
  include('database_connection.php'); 
  //require("bootstrap/locale.php");
  include('partials/_flash.php'); 


  if(isset($_POST['publish'])){
       if(!empty($_POST['contenu'])){

           extract($_POST);

           $q = $connect->prepare('INSERT INTO news(contenu, user_id, created_at) VALUES(:contenu, :user_id, now())');

           $q->execute([
                'contenu' => $contenu,
                'user_id' => get_session('user_id')
           ]);

           set_flash('votre status a éte mis a jour !');
       }
  }

      redirect('news.php?id='.$_SESSION['user_id']); 
  ?>

  