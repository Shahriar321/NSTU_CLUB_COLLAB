<?php
include "clubdatabase.php";
 
if(isset(($_GET['after_login']))){
   session_start();   
   if($_SESSION['in_club']==1){
   $member_type=$_SESSION['member_type'];
   }else{ 
      if(isset(($_GET['member_type']))){
         $member_type=$_GET['member_type']; 
     }  
   }
  
   if($_SESSION['is_login']!=1){
     header('location:../assets/login.php');
    }
}else{
   include "clubdatabase.php"; 
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 
    <link rel="stylesheet" href="../css//Css.css">

    <title>Document</title>
</head>
<body>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="content" class="content content-full-width"> 
            <div class="profile">
               <div class="profile-header"> 
                  <div class="profile-header-cover"  >
                  <img src="../images//home-bg.jpg" alt="" width="100%" height="100%">
                  </div> 
                  <div class="profile-header-content"> 
                     <div class="profile-header-img ">
                        <img src="../images//<?php echo $image;?>" alt="">
                     </div> 
                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5"><?php echo $club_name;?></h4>
                       <?php if(isset(($_GET['after_login']))){ ?>
                        <?php
                        if($member_type=="admin"){?>
                           <a href="../admin/admineditclub.php" class="btn btn-sm btn-info ">Edit Profile</a>
                        <?php } 
                        ?>
                         <?php
                        if($member_type=="admin" || $member_type=="member"){?>
                           <a href="../member/leaveclub.php"class="btn btn-sm btn-info btn-danger ">Leave Club Parmanently</a>
                        <?php } 
                       }
                        ?>
                        
                         
                     </div> 
                  </div> 
                  <ul class="profile-header-tab nav nav-tabs"> 
                  <?php if(isset(($_GET['after_login']))){ ?>
                        
                        <li class="nav-item"><a href="clubshowmembers.php?club_id=<?php echo  $club_id; ?> && member_type=<?php echo  $member_type; ?> && after_login='1'" target="__blank" class="nav-link_">Members Details</a></li>
                        <li class="nav-item"><a href= "clubactivity.php?club_id=<?php echo  $club_id; ?> && member_type=<?php echo  $member_type; ?> && after_login='1'" target="__blank" class="nav-link_">Activity Section</a></li>
                       <?php 
                          if($member_type=="admin" || $member_type=="member"){?>
                             <li class="nav-item"><a href= "../member/membercreatepost.php" target="__blank" class="nav-link_">Home</a></li>
                          <?php }else{?> 
                            <li class="nav-item"><a href= "../user/userdiscover.php" target="__blank" class="nav-link_">Home</a></li>
                      <?php }} else{ 
                          ?>
                       <li class="nav-item"><a href="clubshowmembers.php?club_id=<?php echo  $club_id; ?>" target="__blank" class="nav-link_">Members Details</a></li>
                       <li class="nav-item"><a href= "clubactivity.php?club_id=<?php echo  $club_id; ?> " target="__blank" class="nav-link_">Activity Section</a></li>
                       <li class="nav-item"><a href= "../club/home.php" target="__blank" class="nav-link_">Home</a></li>
  
                       <?php }?>

                     
                       
                  </ul> 
               </div>
            </div> 
            <div class="profile-content"> 
               <div class="tab-content p-0"> 
                  <div class="tab-pane fade active show" id="profile-post"> 
                  <?php  include "about.php";?>
                  </div> 
               </div> 
            </div>  
          </div>
      </div>
   </div>
   <div class="container">
    <div class="col-md-12">
    <?php include "activity.php";?>
    <div>  
   
    </div>
</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 



</body>
</html>