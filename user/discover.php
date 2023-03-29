<?php

include '../assets//config.php'; 
$isclicked=false;
 
?>
   
   <!---------------------------------------------totall page-------------------------------------------- -->
<div class="clubdiv">    
<!-- ----------------------------------------searchdiv------------> 
<div class="searchdiv">   

<div class="container">
     <!-- Account page navigation-->
     <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Discover Club</a>
        
    </nav>
    <hr class="mt-0 mb-4">
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="userdiscover.php" class="card card-sm" method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="clubname" type="search" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" name="submit" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
</div>
  
</div>
<!--------------------------------------- club show div------------------------ -->
<div class="clubshowdiv">
      
<?php 

//------------------------------------------------searching work-------------------------------
if(isset($_POST['submit'])){
    $isclicked=true;

    $clubnam = mysqli_real_escape_string($conn, $_POST['clubname']);
    if($clubnam==null){ 
        echo '<script>alert("Must provide a valid search key")</script>'; 
        $isclicked=false;
        
    } 

} //------------------------searching result is shown--------------------------- 
  if($isclicked){
    ?>
<div class="container">
        <div class="row justify-content-center">

<?php 
    $clubs = mysqli_query($conn, "SELECT * FROM `clubs`  WHERE clubs.club_name='$clubnam'") or die('query failed');
         if(mysqli_num_rows($clubs) > 0){
            while($row = mysqli_fetch_assoc($clubs)){
                $club_id= $row['club_id']; 
                ?> 
                <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="inner">
                        <img src="../images//<?php echo $row['club_image']; ?>" class="card-img-top" alt="">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row['club_name']; ?></h5>
                        <p class="card-text"><?php echo $row['club_type']; ?></p>
                        <a class="btn btn-primary btn-sm" href="../club/clubshowmembers.php?club_id=<?php echo  $club_id; ?>&& member_type='user' && after_login='1'" id="profilebutton">Visit club</a>
                    </div>
                </div>
            </div>
    <?php
         }
      }else{
         echo ' <div class="heading">
         <div class="mt-3 bg-light text-center" >
             <h2>No clubs to show</h2>
    </div>
    </div>';
      }
    
   //-------------------------------all clubs are shown---------------------------
   ?>
      </div>
    </div>
   
 
   
   <?php
        }else{?>
        <div class="container">
        <div class="row justify-content-center">

        <?php
         $clubs = mysqli_query($conn, "SELECT * FROM `clubs`") or die('query failed');
         if(mysqli_num_rows($clubs) > 0){
            while($row = mysqli_fetch_assoc($clubs)){
                $club_id= $row['club_id']; 
                ?> 
            <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="inner">
                        <img src="../images//<?php echo $row['club_image']; ?>" class="card-img-top" alt="">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row['club_name']; ?></h5>
                        <p class="card-text"><?php echo $row['club_type']; ?></p>
                        <a class="btn btn-primary btn-sm" href="../club/clubshowmembers.php?club_id=<?php echo  $club_id; ?>&& member_type='user' && after_login='1'" id="profilebutton">Visit club</a>
                    </div>
                </div>
            </div>  
     
    <?php
         }?>
        </div>
    </div>

     <?php }else{
         echo ' <div class="heading">
         <div class="mt-3 bg-light text-center" >
             <h2>No clubs to show</h2>
    </div>
    </div>';
      }
    }
      ?>
 
  
</div>
  
</div>
</div>
</div>
</div>  
 