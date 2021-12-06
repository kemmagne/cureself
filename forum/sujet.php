
<?php

include('header.php'); 
// include('database.php'); 
//include('filters/auth_filters.php');
include('addPost.php'); 
  
  include('includes/constants.php'); 


  ?>


<?php
   if(isset($_GET['categorie'])){//si on est dans une categorie
       $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
  ?>
   
    

   <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a>

   <?php
    $requete = $connect->prepare('SELECT * FROM suject WHERE categorie = :categorie');

    $requete->execute(array('categorie'=>$_GET['categorie']));
    ?>


<div class="container col-md-offset-7" style="margin-bottom:10px;">
<div class="row" >
<button type="button" class="btn btn-info">Liste de connecter</button><button type="button" class="btn btn-info">recherche</button><button type="button" class="btn btn-info">something else</button>

</div>
</div>



<div class="panel panel-primary col-md-10 col-md-offset-1">
<table class="table table-bordered  table-condensed">
 <div class="panel-heading">
<h3 class="panel-title">  <?php echo ($_GET['categorie']) ?></h3>
 </div>


<thead>
<tr>
<th  class="col-md-4"> <?php echo ($_GET['categorie']) ?></th>
<th class="col-md-3">Auteur du Suject</th>
<th class="col-md-1">numbre de message</th>
<th class="col-md-2">date de creation</th>
</tr>
</thead>
<?php
while($reponse = $requete->fetch()){
     
          
    //$reponse2 = $connect->query('SELECT * FROM user INNER JOIN suject ON user.id = suject.user_id');

    //$donnees = $reponse2->fetch();
      

?>





<tbody>
<tr>
<td> <a href="post.php?sujet=<?php echo $reponse['name'] ?>"><h1> <?php echo $reponse['name'] ?></h1></a></td>
<?php
    /* $reponse2 = $connect->query('SELECT * FROM user INNER JOIN suject ON user.id = suject.user_id');

      $donnees = $reponse2->fetch()*/

    
      



           $requete2 = $connect->prepare('SELECT * FROM login WHERE user_id = :user_id');
          $requete2->execute(array('user_id'=>$reponse['user_id']));
          $membres = $requete2->fetch();
         /*________________________________________________________________________________________________*/


       $requete3 = $connect->prepare('SELECT * FROM postsujet WHERE propri = :propri');
       $requete3->execute(array('propri'=>$reponse['user_id']));
          
     $membre = $requete3->fetch();

    /*__________________________________________________________________________________________________*/


    $requete4 = $connect->prepare('SELECT COUNT(id) AS contenu FROM postsujet');
       $requete4->execute(array('id'=>$reponse['id']));
          
     $mem = $requete4->fetch();
    /*____________________________________________________________________________________*/



   //var_dump($mem);
    //die();
  ?>

<td> <?php  echo $membres['username']; ?></td>

 
<td><button class="btn btn-danger"><span class="badge text-success"><?php  echo $mem['contenu']; ?></span></button></td>

<td><?php echo  $membre["date"]; ?></td>


</tr>
  <?php
   
}
  ?>



  
  <?php
   } 
   
   ?>



</tbody>

</table>
</div>
        
   
</body>

</html>