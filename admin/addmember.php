<?php

include '../assets//config.php'; 
$isclicked=false;
 
?> 
<!-- ---------------------------------------head msg--------------------------------------------------------------------- -->
<?php
if (isset($message)) {
	foreach ($message as $message) {
		echo '
      <div class="message">
         <span>' . $message . '</span>
         <i  class="fa-solid fa-xmark" style="font-size:20px" onclick="this.parentElement.remove();"></i>
      </div>
      ';
	}
}
?>


   
<!---------------------------------------------totall page-------------------------------------------- -->
<div class="clubdiv"> 
  
     
<!-- ----------------------------------------searchdiv------------------------------------------------> 
<div class="searchdiv">   

<div class="container">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Add member</a>
        
    </nav>
    <hr class="mt-0 mb-4">
       
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-12">
                            <form action="" class="card card-sm" method="post"> 
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div> 
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="username" type="search" placeholder="Search by username">
                                    </div> 
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" name="submit" type="submit">Search</button>
                                    </div> 
                                </div>
                            </form>
                        </div> 
                    </div>
</div>
</div>
  
</div>
<!--------------------------------------- club show div------------------------ -->
<div class="clubshowdiv">
      
<?php 

//------------------------------------------------searching work-------------------------------
if(isset($_POST['username'])){
    $isclicked=true;

    $username= mysqli_real_escape_string($conn, $_POST['username']);
    if($username==null){ 
        echo '<script>alert("Must provide a valid search key")</script>'; 
        $isclicked=false;
        
    } 

}
 //------------------------searching result is shown--------------------------- 
  if($isclicked){?>
<div class="container">
        <div class="row justify-content-center">

<?php
    $user = mysqli_query($conn, "SELECT * FROM `users`  WHERE  name='$username'") or die('query failed');
         if(mysqli_num_rows($user ) > 0){
            while($row = mysqli_fetch_assoc($user)){
              $batch=$row['batch'];
              $userid=$row['user_id'];
              $member = mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND user_id='$userid' ") or die('query failed');

                ?> 
    <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="inner">
                        <img src="../images//<?php echo $row['user_image']; ?>" class="card-img-top" alt="">
                    </div>
                    <div class="card-body text-center"> 
                        <h5 class="card-text"><?php echo $row['name']?>:<?php echo $row['department']; ?></h5>
                        <?php if($batch!=null){?>
                        <p class="card-text"><?php echo $row['user_type']; ?>:<?php echo $row['department']; ?></p>
                        <p class="card-text">Batch:<?php echo $row['batch']; ?></p>
                        <?php }else{?>
                          <p class="card-text"><?php echo $row['user_type']; ?>:<?php echo $row['department']; ?></p>
                          <?php } ?>
                          
                          <?php
                           $clubmember = mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND user_id='$userid'") or die('query failed');
                          
                          if(!mysqli_num_rows($clubmember) > 0){?>
                        <a href="addmemberaction.php?addmember=1  &&  user_id=<?php echo  $row['user_id'] ?>" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa-solid fa-plus"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

    
    <?php
         }
      }else{
         echo ' <div class="heading">
         <div class="mt-3 bg-light text-center" >
             <h2>No member with this name</h2>
    </div>
    </div>';
      }?>
      </div>
    </div>
   

<?php
    } 
    else{
        $user = mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id'") or die('query failed');

        if (mysqli_num_rows($user) > 0) { 




     ?>
     <!-- ------------------------------------------admin table starts-------------------------------------- -->
<div class="container mt-3 mb-4">
    
<div class="col-lg-12 mt-4 mt-lg-0">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
          <table class="table manage-candidates-top mb-0">
            <h2>Club Admins</h2>
            <thead>
              <tr>
                <th></th>
                <th class="text-center">Department</th>
                <th class="text-center">Status</th>
                <th class="action text-right">Batch</th>
              </tr>
            </thead>
  
            <tbody>  
  <?php
  //--------------------------------------gets all admin----------------------------
  $admin = mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND member_type='admin'") or die('query failed');
  $member_type="admin";
  if (mysqli_num_rows($admin) > 0) { 
  while ($row = mysqli_fetch_assoc($admin)) {
    $userp_id = $row['user_id']; 

    $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $userp_id'") or die('query failed');
            if(mysqli_num_rows($user) > 0){
                $rowu= mysqli_fetch_assoc($user);
                $userm_id=$rowu['user_id'];
                $user_name=$rowu['name']; 
                $user_image=$rowu['user_image'];
                $user_dept=$rowu['department'];
                $user_type=$rowu['user_type'];
                $user_batch=$rowu['batch'];
                 
            } 
            include "../club//membertable.php";
          }
  } else{
    echo "No Admin  yet ";
  }
?>
            </tbody> 
          </table>

        </div>
      </div>
    </div>
  </div>
</div> 
<!-- ---------------------------------------member  table starts--------------------------------------------- -->
<div class="container mt-3 mb-4">
<div class="col-lg-12 mt-4 mt-lg-0">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
          <table class="table manage-candidates-top mb-0">
            <h2>General members</h2> 
            <thead>
              <tr>
                <th></th>
                <th class="text-center">Department</th>
                <th class="text-center">Status</th>
                <th class="action text-right">Batch</th>
              </tr>
            </thead>
            <tbody> 

<?php
 
//------------------------------------gets all member-------------------------------------------------

$member = mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND member_type='member'") or die('query failed');
$member_type="member";
if (mysqli_num_rows($member) > 0) {  
  
while ($row = mysqli_fetch_assoc($member)) {
    $userp_id = $row['user_id']; 

    $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $userp_id'") or die('query failed');
            if(mysqli_num_rows($user) > 0){
                $rowu= mysqli_fetch_assoc($user);
                $userm_id=$rowu['user_id'];
                $user_name=$rowu['name']; 
                $user_image=$rowu['user_image'];
                $user_dept=$rowu['department'];
                $user_type=$rowu['user_type'];
                $user_batch=$rowu['batch'];
                 
            } 
            include "../club//membertable.php";

}
}else{
  echo "No general member yet ";
}
?> 


</tbody>
 


 </table>
</div>
</div>

</div>
</div>
</div>

<?php
}
    }
?> 

    
 
  
</div>
  
</div>
</div>
</div>
</div>  
 