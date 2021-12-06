<?php

include('header.php'); 
// include('database.php'); 
//include('filters/auth_filters.php');
include('addPost.php'); 
  
  include('includes/constants.php'); 


?>
  <?php


  ?>



  
       
<div class="container col-md-offset-7" style="margin-bottom:100px;">
<div class="row" >
<button type="button" class="btn btn-info">Liste de connecter</button><button type="button" class="btn btn-info">recherche</button><button type="button" class="btn btn-info">something else</button>

</div>
</div>


<div class="container col-md-offset-6">
<div class="row" >
<form>
<legend>chrecher</legend> 
Text : <input type="text">
pseudo : <input type="text">
<input type="checkbox"> filier
<button>Envoyer</button>
</form>
</div>
</div>



  <?php
   
   



 if(isset($_GET['sujet'])){
      $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
  ?>

<div class="panel panel-primary col-md-10  col-md-offset-1">
<table class="table table-bordered table-striped table-condensed">
 <div class="panel-heading">
<h3 class="panel-title"><h4> <?php echo ($_GET['sujet']) ?></h4></h3>
 </div>


<thead>
<tr>
 <th class="col-md-3">Auteur</th>
<th class="col-md-7">Suject</th>

</tr>
</thead>


<tbody>

    
<?php

       $requete = $connect->prepare('SELECT * FROM postSujet WHERE sujet = :sujet');
       $requete->execute(array('sujet'=>$_GET['sujet']));
       while($reponse = $requete->fetch()){
        //  $_SESSION['reponses'] = $reponse;


          //var_dump($_SESSION['repondes']);
          //die();
    ?>


<tr>
  <?php

          $requete2 = $connect->prepare('SELECT * FROM login WHERE user_id = :user_id');
          $requete2->execute(array('user_id'=>$reponse['propri']));
          $membres = $requete2->fetch();

         // $_SESSION['membres'] = $membres;

          //var_dump($_SESSION['membres']);
         // die();
     ?>
    
   
<td style="height:230px;"> <?php echo $membres['pseudo'];  ?> </td>
<td  style="height:230px;"> <?php echo $reponse['date'];  ?>  <br/> <?php echo $reponse['contenu']; ?></td>
</tr>
 <?php
            
       }
?>





</tbody>

</table>

</div>





































       <form method="post"  action="addPost.php">
        <textarea  name="sujet"  placeholder="votre message..." ></textarea>
        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
        <input type="submit" name="submit"  value="Ajouter la conversation" />
  </form>

  <?php
   }
   
   
   
   
   
   
   