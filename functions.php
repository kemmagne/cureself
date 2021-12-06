<?php

if(!function_exists('redirect')){
    function  redirect($page){  //fin de l'episode 11;
        header('Location' . $page);
        exit();
    }
}


if(!function_exists('get_session')){
    function get_session($key){
          if($key){
             return !empty($_SESSION[$key])
                     ? e($_SESSION[$key])
                     : null; 
          }
    
    }
  }




  if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
            global $connect;

          $q = $connect->prepare('SELECT username, pseudo, email, city, country, twitter, sex, available_for_hiring, bio, img FROM login WHERE user_id = ?');

          $q->execute([$id]);

          $data = current($q->fetchAll(PDO::FETCH_OBJ));

          $q->closeCursor();

          return $data;
    
    }
  }

    // get a session value
    if(!function_exists('is_logged_in')){
        function is_logged_in(){
         
            return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);       
          }
    
        }  
    




?>