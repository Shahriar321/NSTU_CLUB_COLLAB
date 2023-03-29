<?php
include '../assets//config.php';
session_start();
$club_id=$_SESSION['club_id'];
$user_id=$_GET['user_id'];
$member_type=$_GET['member_type']; 


function updateTotallmember($conn,$club_id){

    $club = mysqli_query($conn, "SELECT * FROM `clubs`  WHERE club_id='$club_id'") or die('query failed');
    if(mysqli_num_rows($club) > 0){
      $rowco= mysqli_fetch_assoc($club);
           $totall_members=$rowco['totall_members'];
    }
    $totall_members=$totall_members-1;
    mysqli_query($conn, "UPDATE `clubs` SET totall_members = '$totall_members' WHERE club_id= '$club_id'") or die('query failed');

}
 

if(isset(($_GET['makeadmin']))){ 
    if($member_type=="member"){  
      
    mysqli_query($conn, "UPDATE `club_members` SET member_type = 'admin'  WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed');
     if($user_id==$_SESSION['user_id']){ 
        header('location:../assets/logout.php');

     } else{  
     header('location:adminmanagemember.php');
     }
    }
    header('location:adminmanagemember.php');
  

}
if(isset(($_GET['makemember']))){ 

    if($member_type=="admin"){
        $available =mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND member_type='admin'") or die('query failed');
        if(mysqli_num_rows($available)<=1){   
        
        }else{  
            mysqli_query($conn, "UPDATE `club_members`  SET member_type = 'member'  WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed'); 
            echo $_SESSION['user_id'];
            echo $user_id;
            if($user_id==$_SESSION['user_id']){ 
                header('location:../assets/logout.php');
    
             } else{  
             header('location:adminmanagemember.php');
             }
        
        }
    }   
    header('location:adminmanagemember.php');

}





if(isset(($_GET['deletemember']))){ 

    

    if($member_type=="admin"){
        $available =mysqli_query($conn, "SELECT * FROM `club_members`  WHERE club_id='$club_id' AND member_type='admin'") or die('query failed');
           
        if(mysqli_num_rows($available)<=1){   
        
        }else{  
            
            mysqli_query($conn, "DELETE FROM `club_members` WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed');
            updateTotallmember($conn,$club_id);
            if($user_id==$_SESSION['user_id']){ 
                header('location:../assets/logout.php');
    
             } else{  
             header('location:adminmanagemember.php');
             }
          
        }
    }else{  
        mysqli_query($conn, "DELETE FROM `club_members` WHERE user_id = '$user_id' AND  club_id = '$club_id'") or die('query failed');
        updateTotallmember($conn,$club_id);
        if($user_id==$_SESSION['user_id']){ 
        header('location:../assets/logout.php');

     } else{  
     header('location:adminmanagemember.php');
     }
    }
   header('location:adminmanagemember.php');

}
?>