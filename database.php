
 <?php
 
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'xxn');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');

    try{

    	$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$connect->query('SELECT * FROM login');
    } catch(PDOException $e) {

    	die('Erreur: '.$e->getMessage());
    }




?>


