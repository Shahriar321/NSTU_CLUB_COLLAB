<?php
include 'config.php';
session_start(); 
$_SESSION['in_club']=1;
if(isset(($_GET['club_id']))){
$_SESSION['club_id']=$_GET['club_id'];
$club_id=$_SESSION['club_id'];
$_SESSION['club_name']=$_GET['club_name'];
$_SESSION['club_image']=$_GET['club_image']; 
}  
$user_id=$_SESSION['user_id'];
$users = mysqli_query($conn, "SELECT * FROM `club_members` WHERE user_id = '$user_id' AND  club_id ='$club_id' ") or die('query failed');

	if (mysqli_num_rows($users) > 0) {

		$row = mysqli_fetch_assoc($users);
        $member_type=$row['member_type'];
        $_SESSION['member_type']=$member_type; 
    }
     
   
    
    header('location:../member/membercreatepost.php'); 
?>