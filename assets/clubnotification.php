<?php
include '../assets//config.php';
 $noti = mysqli_query($conn, "SELECT * FROM `invitation` ORDER BY invite_id DESC ") or die('query failed');
 if(mysqli_num_rows($noti) > 0){ 
    while($row = mysqli_fetch_assoc($noti)){  
        $noti_description=$row['invite_msg']; 
        $invitedclub_id=$row['invitedclub_id']; 
        $invite_date=$row['invite_date']; 
        if($invitedclub_id==$club_id){
        ?>   
        <li >
         <a class="dropdown-item" href="#"><?php echo  $noti_description." :". $invite_date;?></a>
         </li>  
   <?php }}
}  
?>