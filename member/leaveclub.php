<?php
session_start();
$club_id=$_SESSION['club_id'];
$member_type=$_SESSION['member_type']; 

include '../assets//config.php'; 


function updateTotallmember($conn,$club_id){

    $club = mysqli_query($conn, "SELECT * FROM `clubs`  WHERE club_id='$club_id'") or die('query failed');
    if(mysqli_num_rows($club) > 0){
      $rowco= mysqli_fetch_assoc($club);
           $totall_members=$rowco['totall_members'];
    }
    $totall_members=$totall_members-1;
    mysqli_query($conn, "UPDATE `clubs` SET totall_members = '$totall_members' WHERE club_id= '$club_id'") or die('query failed');

}
if($member_type=="admin"){
    $available =mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND member_type='admin'") or die('query failed');
       
    if(mysqli_num_rows($available)<=1){   
      //  echo "you can not leave club as only admin"; 
      header('location:../admin/adminmanagemember.php');
    
    }else{  
        
        mysqli_query($conn, "DELETE FROM `club_members` WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed');
        updateTotallmember($conn,$club_id);
        header('location:../assets/logout.php');
      
    }
}else{  
    mysqli_query($conn, "DELETE FROM `club_members` WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed');
    updateTotallmember($conn,$club_id); 
    header('location:../assets/logout.php');
 
 
}
 
?>