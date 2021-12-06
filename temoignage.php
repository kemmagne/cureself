<?php
     include('header.php');
     include('header1.php');
    


       $reponse = $connect->query('SELECT id, content, user_id, created_at FROM microposts');

         
     
?>

 <div id="main-content">

    <div class="container col-md-offset-1">
          <div class="row">
             <div class="col-md-11">
                 


   
     <table class="table table-bordered table-striped table-condensed">
            <caption>
         <h4>Les menaces pour les tigres</h4>
       </caption>
         <thead>
          <tr>
          <th class="col-md-4">Lieu</th>
           <th class="clo-md-7">lieu</th>
         </tr>
       </thead>
<tbody>
<?php

   while($donnees = $reponse->fetch()){



          $requete2 = $connect->prepare('SELECT * FROM login WHERE user_id = :user_id');
          $requete2->execute(array('user_id'=>$donnees['user_id']));
          $membres = $requete2->fetch();


          $requete4 = $connect->prepare('SELECT COUNT(*) AS content FROM microposts');
          $requete4->execute(array('user_id'=>$donnees['user_id']));
          
          $mem = $requete4->fetch();


     // var_dump($mem);
      //die();
   ?>

<tr>

<td class="col-md-4">
<?php
 //  var_dump($membres);
   //die();
?>
 
        <div class="row">
            <div class="col-md-4">
      
        <img src="<?= $user->avatar ? $user->avatar : get_avatar_url($membres['email'], 100) ?>" alt="Image de profil de <?= $membres['username']  ?>" class="img-circle">
       
     </div>
     </div>

          <div class="row">
            <div class="col-md-4">
                <a href="mailto:<?= $membres['email'] ?>"><?= $membres['email'] ?></a><br/>
                 <p>
                  <?=

                $membres['city'] && $membres['country'] ? '<i class="fa fa-location-arrow"></i>&nbsp;'.$membres['city']. '->' .$membres['country']. '<br/>' : '';
               ?></p>
            <a href="https://www.google.com/maps?q=<?= $membres['city']. ' ' .$membres['country'] ?>" target="_blank"> voir sur Maps</a>       


            <?php echo $donnees['created_at']; ?>


            <button class="btn btn-danger">nombre de postes: <span class="badge textsuccess">
                <?php   echo $mem['content'];  ?> </span></button>    
         <!-- <p style="float: right"> </p>  -->

            </div>
          </div>   
        </td>
          <td>

               <div class="corps  col-md-6"><?php echo $donnees['content']; ?></div>    

</td>

</tr>

  <?php

   }

 ?>



</tbody>
</table>








                  <?php   //$user->pseudo ?>


                <?php// if(!empty($_GET['id'])) ?>
                 <div class="status-post">
                    <form method="post"   action="microposts.php"  data-parsley-validate>
                      <div class="form-group">
                           <label for="content"></label>
                             <textarea name="content"  id="content"   row="20"  class="form-control"  style="resize: none"
                             placeholder="laiser un mot sur votre maladie"  
                             required = "requirer" ></textarea>

                        </div>
                       
                         <div class="form-group  status-post-submit" >
                           <input type="submit"  name="publish"  value="Publisher" 
                             class="btn btn-default  btn-xs">
                          </div>   

                   </form>
                 </div>

             </div>
         </div>
    </div>
  </div>  


    <?php include('partials/_footer.php'); ?>