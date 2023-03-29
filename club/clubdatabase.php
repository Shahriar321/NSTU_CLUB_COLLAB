 
 <?php
include '../assets/config.php';
if(isset(($_GET['club_id']))){
    $club_id=$_GET['club_id']; 
 }  
if(isset(($_GET['member_type']))){
    $member_type=$_GET['member_type']; 
} 
 

$users =mysqli_query($conn, "SELECT * FROM clubs WHERE club_id = '$club_id'");
if(mysqli_num_rows($users) > 0){
$user= mysqli_fetch_assoc($users);
$club_name = $user["club_name"];
$member = $user["totall_members"];
$description = $user["club_description"];
$image = $user["club_image"];  
    }  
?> 