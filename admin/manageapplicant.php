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
<nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Manage Applicant</a>
        
    </nav>
    <hr class="mt-0 mb-4">
<?php

include '../assets//config.php';

$apply_form = mysqli_query($conn, "SELECT * FROM `apply_form`  WHERE club_id='$club_id' AND session_status='running'") or die('query failed');

if (mysqli_num_rows($apply_form) > 0) {  
$row = mysqli_fetch_assoc($apply_form);
$session_id = $row['session_id']; 
$_SESSION['form_session']=$session_id;

    
$applicant = mysqli_query($conn, "SELECT * FROM `form_pay`  WHERE session_id='$session_id'") or die('query failed');

if (mysqli_num_rows($applicant) > 0) { 


?>
 
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
                <th class="action text-right">Phone Number</th>
              </tr>
            </thead>
            <tbody> 

<?php
 
//------------------------------------gets all member-------------------------------------------------
 

while ($row = mysqli_fetch_assoc($applicant)) {
    $userp_id = $row['user_id'];
    $pay_number = $row['pay_number']; 


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
            include "applicanttable.php";

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
}else{
  echo "
  
  
  <h5 class='text-center'> No Applicant</h5>  ";
}
}
else{
    echo "
    
   <h5 class='text-center'> No new requirement-session is available</h5>   ";
}
?>  
  