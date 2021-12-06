<?php

 session_start();  
 require('includes/functions.php');
  include('filters/auth_filters.php');
  include('database_connection.php'); 
  //require("bootstrap/locale.php");
  include('partials/_flash.php'); 


  if(isset($_POST['publish'])){
       if(!empty($_POST['content'])){

           extract($_POST);

           $q = $connect->prepare('INSERT INTO microposts(content, user_id, created_at) VALUES(:content, :user_id, now())');

           $q->execute([
                'content' => $content,
                'user_id' => get_session('user_id')
           ]);

           set_flash('votre status a éte mis a jour !');
       }
  }

      redirect('temoignage.php?id='.$_SESSION['user_id']); 
  ?>

  

  <?php
/*
 session_start();  
 require('includes/functions.php');
  include('filters/auth_filters.php');
  include('database_connection.php'); 
  //require("bootstrap/locale.php");
  include('partials/_flash.php'); 


  if(isset($_POST['publish'])){
       if(!empty($_POST['content'])){

           extract($_POST);

           $q = $connect->prepare('INSERT INTO login(content,  created_at) VALUES(:content,  now())');

           $q->execute([
                'content' => $content,
               
           ]);

           set_flash('votre status a éte mis a jour !');
       }
  }

      redirect('temoignage.php');*/ 
  ?>