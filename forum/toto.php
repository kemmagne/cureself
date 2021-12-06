




 <div class="categories">
     <a href="sujet.php?categorie=<?php echo $reponse['name'] ?>"><?php echo  $reponse['name']; ?></a>
   
 </div>




 
<?php
   if(isset($_GET['categorie'])){//si on est dans une categorie
       $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
  ?>
    <div class="categories">
    
             <h1> <?php echo ($_GET['categorie']) ?></h1>
    </div>
    
   <?php
    $requete = $connect->prepare('SELECT * FROM suject WHERE categorie = :categorie');

    $requete->execute(array('categorie'=>$_GET['categorie']));

   while($reponse = $requete->fetch()){
     ?>
               <div class="ategories">
                 <a href="post.php?sujet=<?php echo $reponse['name'] ?>"><h1> <?php echo $reponse['name'] ?></h1></a>
             </div>
            
     <?php
   }
  ?>

  <?php
   } 
   
   ?>
  





