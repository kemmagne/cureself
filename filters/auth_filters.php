<?php

  if(!isset($_SESSION['user_id']) || !isset($_SESSION['pseudo'])){

    set_flash('Vous devez etre connecte pour acceder a cette page.', 'danger');

  	header('Location: login.php');
  	exit();
  }