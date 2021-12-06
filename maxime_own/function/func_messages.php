<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=own', 'root', '');
}catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
} // On ajoute une entrée dans la table jeux_video

?>