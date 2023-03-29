<?php
include '../assets//config.php';
if(isset(($_GET['payment_id']))){
     $user_id=$_GET['user_id'];
     $payment_id=$_GET['payment_id']; 
      
     $payment = mysqli_query($conn, "SELECT * FROM `pay`  WHERE payment_id='$payment_id' &&  user_id='$user_id'") or die('query failed');

     if (mysqli_num_rows($payment) > 0) {  
    
     $row = mysqli_fetch_assoc($payment); 
     $payment_status = $row['payment_status'];
     if($payment_status=="not-checked"){ 

        mysqli_query($conn, "UPDATE `pay` SET payment_status = 'checked'  WHERE payment_id='$payment_id' &&  user_id='$user_id'") or die('query failed');
        header('location:adminpayroll.php');
     }
   header('location:adminpayroll.php');

}  
}
?>