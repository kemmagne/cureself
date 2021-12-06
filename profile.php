
<?php

 include('includes/profil_func.php');
 include('partials/_header.php');

 ?>


<?php
 
                   if(isset($_POST['update'])){
                    $target_path = "pictures/";
              $img = $_FILES['img']['name'];

           $img_tmp = $_FILES['img']['tmp_name'];
           $images = $_FILES['img']['name'];
           $target_path = $target_path.basename($images);
           if(move_uploaded_file($_FILES['img']['tmp_name'], $target_path)){
                 /* $q = $connect->prepare('INSERT INTO login(img)
                             VALUES (:img)');

                  $q->execute([
                      'img' => $img,
             
                    ]);
                    */

              
        $q = $connect->prepare('UPDATE login SET img = :img WHERE user_id = :id');
                       $q->execute(array(

                      'img' => $img,
                      
                      'id' =>  $_SESSION['user_id']
                   ));
                


           }else{
                   echo "une erreur est survenu";
           }
           
       }



?>

<?php


  //  if(isset($_POST['update'])){
  //          $target_path ="pictures/";
          
  //          $target_path = $target_path.basename($_FILES['avatar']['name']);
  //          if(move_upload_file($_FILES['avatar']['tmp_name'], $target_path)){
  //                  $q = $connect->prepare('INSERT INTO login(avatar)
  //                            VALUES (:avatar)');

  //                 $q->execute([
  //                     'avatar' => $avatar,
             
  //                   ]);
  //          }else{
  //                  echo "une erreur est survenu";
  //          }
           
  //      }




      //  $img = $_FILES['img']['name'];

      //   $img_tmp = $_FILES['img']['tmp_name'];

      //   if(!empty($img_tmp)){

      //     $image = explode('.',$img);

      //     $image_ext = end($image);

      //     if(in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){

      //       echo 'veuiller rentrer une image ayant pour extention : png, jpg ou jpeg';
      //     }else{

      //       $image_size = getimagesize($img_tmp);

      //        if($image_size['mime']=='image/jpeg'){

      //           $image_src = imagecreatefromjpeg($img_tmp);
      //        }
      //          else if($image_size['mime']=='image/png'){

      //           $image_src = imagecreatefrompng($img_tmp);
      //        }else{

      //            $image_src =  false;
              
      //           echo  '';//'veuiller entrer une image valide';

      //     }
          
      //   if($image_src!==false){

      //             $image_width=200;

      //              if($image_size[0]== $image_width){
      //               $image_finale = $image_src;
      //             }else {

      //              $new_width[0]=$image_width;

      //               $new_height[1] = 200;


      //               $image_finale = imagecreatetruecolor($new_width[0], $new_height[1]);



      //               imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0,$new_width[0],$new_height[1],$image_size[0], $image_size[1]);
      //            }
                      
      //              imagejpeg($image_finale,'imgs/'.$_SESSION['user_id'].'.jpg');
       
      //         }

      //       }
           

      //    }else{

      //       echo   '';//'veuiller rentre une image';
      //   }
    

?>



<div id="main-content">
  <div class="container">

      <div class="row">

         <div class="col-md-6">

     <div class="panel panel-default">
    <div class="panel-heading">
         <h3 class="panel-title">Profil de <?= e($user->pseudo) ?></h3>
     </div>
     <div class="panel-body">

  

    <div class="row">

    
        <div class="col-md-5">
    <!--    <?php/*
       <img src="<?= get_avatar_url($user->email) ?>"  alt="Image de profil de <?= e($user->pseudo) ?>" class="img-circle">  
       
         */?> -->
         <img src="<?php get_avatar_url($user->email) ? get_avatar_url($user->email) :
          '<p><img src="'.$target_path.'" class="img-thumbnail" width="80" height="60" /></p><br />';  ?>" 
         
         
          alt="Image de profil de <?= e($user->pseudo) ?>" class="img-circle"> 

           </div>
           </div>
        
                
       <div  class="row">
           <div  class="col-md-6">
               <strong><?= ($user->pseudo) ?></strong><br>
                      <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a><br/>

         <?=

                     $user->city && $user->country ? '<i class="fa fa-location-arrow"></i>&nbsp;'.e($user->city). ' - ' .e($user->country). '<br/>' : '';
               ?>
            <a href="https://www.google.com/maps?q=<?= e($user->city). ' ' .e($user->country) ?>" target="_blank"> voir sur Maps</a>       
                  
        </div>

                <div class="col-sm-6">
                
                     <?=
                          $user->twitter ? '<i class="fa fa-twitter"></i><a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a><br/>' : '';

                     ?>


                     <?=
                          $user->age ? '<a href="//twitter.com/'.e($user->age).'">'.e($user->age).'</a><br/>' : '';

                     ?>
                        
                        <?=
                          $user->sex == "H" ? '<i class="fa fa-male"></i>' : '<i class="fa fa-female"></i>';

                     ?>
  


                     <?=
                          $user->available_for_hiring ? 'Disponible pour emploi' : 'Non disponible pour emploi';

                     ?>

                </div>
      </div>  

            <div class="row">
                <div class="col-md-12  well">

                      <h5>Petit biographie de <?= e($user->username)  ?></h5>
                    <p>
                       <?=
                          $user->bio ? nl2br(e($user->bio)) : "Aucune biograpie pour le moment...";
                        ?>
                     </p>
             </div>    
       </div>

                   <div class="row">
                <div class="col-md-12">
             <?php 
               if($target_path){
               
               echo '<p><img src="'.$target_path.'" class="img-thumbnail" width="80" height="60" /></p><br />'; 
               } else{
                       echo "inserer une image";
               }
               ?>

             <!--        <img src="$target_path/<?php// $user->img ?>.jpg" /> -->
             </div>    
       </div>

 </div>
 </div>


         </div>
<!-- A SUPPRIMER -->

   <a  href="temoignage.phpid=<? get_session('user_id') ?>">temoigne</a>

<!-- A SUPPRIMER -->
         <div class="col-md-6">


   <div class="panel panel-default">
    <div class="panel-heading">
         <h3 class="panel-title">completer mon profile</h3>
     </div>
     <div class="panel-body">
        <?php include('partials/_errors.php'); ?>
         

          <form method="post" data-parsley-validate    autocomplete="off"  enctype="multipart/form-data" >
             <div class="row">
             <div class="col-md-6">
              <div class="form-group">
              <label for="name">Nom<span class="text-danger">*</span></label>
              <input type="text"  name="username" id="username" class="form-control"  placeholder="stephan" 
              value="<?= get_input('username') ? get_input('username') : e($user->username) ?>" /> 
           </div>
           </div>


             <div class="col-md-6">
              <div class="form-group">
              <label for="city">ville<span class="text-danger">*</span></label>
              <input type="text"  name="city" id="city" class="form-control" placeholder="stephan" 
              value="<?= get_input('city') ? get_input('city') : e($user->city) ?>" /> 
           </div>
           </div>
        </div>




             <div class="row">
             <div class="col-md-6">
              <div class="form-group">
              <label for="pays">pays<span class="text-danger">*</span></label>
              <input type="text"  name="country" id="country" class="form-control"
                    value="<?= get_input('country') ? get_input('country') : e($user->country) ?>"  /> 
           </div>
           </div>


             <div class="col-md-6">
              <div class="form-group">
              <label for="sex">sexe<span class="text-danger">*</span></label>
              <select name="sex" id="sex" class="form-control"  /> 
              <option value="H" <?= $user->sex == "H" ? "selected" : "" ?>>
               Homme
               </option>
             <option value="F" <?= $user->sex == "F" ? "selected" : "" ?>>
                Femme
                </option>
         </select>
           </div>
           </div>
        </div>


           <div class="row">
             <div class="col-md-6">
              <div class="form-group">
              <label for="age">age<span class="text-danger"></span></label>
              <input type="text"  name="age" id="age" class="form-control" placeholder="stephan" 
              value="<?= get_input('age') ? get_input('age') : e($user->age ) ?>" /> 
           </div>
           </div>


             <div class="col-md-6">
              <div class="form-group">
              <label for="twitter">Twitter<span class="text-danger">*</span></label>
              <input type="text"  name="twitter" id="twitter" class="form-control" placeholder="stephan" 
              value="<?= get_input('twitter') ? get_input('twitter') : e($user->twitter) ?>" /> 
           </div>
           </div>
        </div>


      <div class="row">
             <div class="col-md-6">
              <div class="form-group">
              <label for="available_for_hiring">
              <input type="checkbox"  name="available_for_hiring" id="available_for_hiring" <?= $user->available_for_hiring ? "checked" : "" ?> />

              Disponible pour emploi ?
              </label>
           </div>
           </div>

              <div class="col-md-6">
              <div class="form-group">
                    <label for="avatar">Changer mon avatar</label>
                    <input type="file" name="img"  id="avatar" />
                     <input type="file" name="uploadedfile"  id="avatar" />

           </div>
           </div>

          </div> 


         

           <div class="row">
             <div class="col-md-12">
              <div class="form-group">
              
                <label for="bio">Biographie<span class="text-danger">*</span>

                <textarea  name="bio" id="bio" cols="60" rows="10" class="form-control" 
                   placeholder="je soufre de ..."><?= get_input('bio') ? get_input('bio') : e($user->bio) ?>
              </textarea>
           </div>
           </div>
          </div> 
  <input type="submit"  class="btn btn-primary"  value="valider" name="update">
   </form>







 </div>
 </div>

     </div>
</div>
    
 </div>   
 </div>

   <?php //include('partials/_footer.php'); ?>
}


   <script type="text/javascript">
   
    	<?php $timestamp = time();?>

       $(function() {
           $('#avatar').uploadify({
                 'fileObjName' : 'avatar',
                 'fileTypeDesc' : 'Image Files',
                  'FileTypeExts' : '*.gif; *.jpg; *.jpeg; *.png',
                'buttonText': 'Parcourir',
                   
                   	'formData'   : {
				          	'timestamp' : '<?php echo $timestamp;?>',
				           	'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                     'user_id'  : "<?= get_session('user_id') ?>"
			              	},

                 'swf'      : 'libraries/uploadify/uploadify.swf',
                 'uploader' : 'libraries/uploadify/uploadify.php'
            });
          });
   </script>



      

<link rel="stylesheet" href="libraries/uploadify/uploadify.css"/>
  <script type="text/javascript"  src="jquery-3.3.1.min.js"  ></script>
 <script src="assets/js/jquery-3.3.1.min.js"></script>

<script src="libraries/uploadify/jquery.uploadify.min.js"></script>

 <script type="text/javascript" src="assets/js/jquery.timeago.js"></script>
 <script type="text/javascript" src="assets/js/jquery.timeago.fi.js"></script>
 <script type="text/javascript" src="assets/js/jquery.livequery.min.js"></script>


 <script src="libraries/parsley/parsley.min.js"></script>
<script src="libraries/parsley/lang.js"></script>

  