
<?php



include('header.php'); 

//include('filters/auth_filters.php');
include('addPost.php'); 
  
  include('includes/constants.php'); 



  if(!empty($_GET['id'])){
  
  

      $user = find_user_by_id($_GET['id']);


      if(!$user){

          redirect('index.php');
         
      } else {



                   //s    echo 'probleme de redirection';
      //  redirect('profile.php?id='.$_SESSION['user_id'])
      }
  }

?>
<html>
<header>

<h1 class="panel-title">Profil de <?= e($_SESSION['pseudo']) ?></h1>
<h1 class="panel-title">session de <?= e($_SESSION['username']) ?></h1>


  
<div class="panel panel-primary col-md-10  col-md-offset-1">
<table class="table table-bordered table-striped table-condensed">
 <div class="panel-heading">
<h3 class="panel-title">liste de maladie selon leur categories</h3>
 </div>


<thead>
<tr>
<th>categoie de maladie</th>
<th>Mnombre de mesage</th>
<th>date du dernier message</th>
</tr>
</thead>


<tbody>
<tr style="background-color: blue;">
<td>Maladie sexuelle</td>
<td> 435</td>
<td>12/12/2018</td>
</tr>
<?php
   

 $requete = $connect->query('SELECT * FROM categories');
  while($reponse = $requete->fetch()){

 ?>


<tr>
<td><a href="sujet.php?categorie=<?php echo $reponse['name'] ?>"><?php echo $reponse['name']; ?></a></td>
<td>234</td>
<td>12/3/2013</td>
</tr>

<?php
 }
  ?>

</tbody>

</table>
</div>