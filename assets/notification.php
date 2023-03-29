<?php
include '../assets//config.php';
 $noti = mysqli_query($conn, "SELECT * FROM `notification` ORDER BY noti_id DESC ") or die('query failed');
 if(mysqli_num_rows($noti) > 0){ 
    while($row = mysqli_fetch_assoc($noti)){  
        $noti_description=$row['description']; 
        $noti_time=$row['noti_time']; 
        ?>   <li>
         <a class="dropdown-item" href="#"><?php echo  $noti_description." :".$noti_time;?></a>
         </li> 
   <?php }
}  
?>