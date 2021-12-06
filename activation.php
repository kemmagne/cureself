<?php 

 session_start();

 //include('filters/guest_filters.php');
 require "config/database.php";
 require "include/functions.php";


 if(!empty($_GET['p']) && is_already_in_use('pseudo', $_GET['p'], 'login') && !empty($_GET['token'])){

         $pseudo = $_GET['p'];
         $token = $_GET['token'];

         $q = $connect->prepare('SELECT email, password FROM login WHERE pseudo = ?');

         $q->execute([$pseudo]);

         $data = $q->fetch(PDO::FETCH_OBJ);

         $token_verif = sha1($pseudo.$data->email.$data->password);

         if($token == $token_verif){
   
           $q = $db->prepare("UPDATE login SET active = '1' WHERE pseudo = ?");
           
           $q->execute([$pseudo]);

          $q = $db->prepare("INSERT INTO friends_relationships(user_id1, user_id2, status) VALUES(?, ?, ?)");
           
           $q->execute([$data->id, $data->id, '2']);



           set_flash('votre compte a été bel et bien activé !');

           header('Location: login.php');

                   exit();

         }else {

                   set_flash('Parametres invalid', 'danger');

                   header('Location: index.php');

                   exit();
         
         }



        } else {

     header('Location: index.php');

         exit();
   }