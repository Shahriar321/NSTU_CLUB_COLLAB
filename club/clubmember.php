 
<?php

include '../assets//config.php';

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
            include "membertable.php";
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
<div class="col-lg-12 mt-4 mt-lg-0 col-auto">
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
            include "membertable.php";

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
?>  
  