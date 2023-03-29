   
<div class="row d-flex justify-content-center ">
<?php 
include '../assets/config.php';
 $post = mysqli_query($conn, "SELECT * FROM `post` WHERE club_id='$club_id' AND post_status='public' ORDER BY post_id ") or die('query failed');
 if(mysqli_num_rows($post) > 0){ 
    while($row = mysqli_fetch_assoc($post)){ 
        $post_id=$row['post_id'];
        $post_caption=$row['post_caption'];
        $post_picture=$row['post_picture'];
        $post_time=$row['post_time'];
        $user_id=$row['user_id'];

        $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $user_id'") or die('query failed');
        if(mysqli_num_rows($user) > 0){
            $rowu= mysqli_fetch_assoc($user);
            $user_name=$rowu['name']; 
            $user_image=$rowu['user_image']; 
             
        }
        
  
        
?>


    <div class="col-7  mt-3 ">
        <div class="card p-2">
<!-- ---------------------------------------------------------loads post one by one------------------------------------------------------------------------------- -->
            <div class="card-body">
                <div class="d-flex flex-start align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3" src="../images//<?php echo $user_image; ?>" alt="avatar" width="60" height="60" />
                    <div>
                        <h6 class="fw-bold text-primary mb-1"><?php echo $user_name; ?></h6>
                        <p class="text-muted small mb-0">
                        <?php echo  $post_time; ?>
                        </p>
                    </div>
                </div>
                <div>
                    <p class="mt-3 mb-1 pb-2 pe-2" style="text-align:justify;"> 
                    <?php echo  $post_caption; ?>
                    </p>
                </div>
                <div class="text-center">
                    <img class="py-3" src="../post_images//<?php echo  $post_picture; ?>" alt="avatar" width="50%" height="auto" />
                </div>
            </div> 

        

        </div>
   
    </div>
<?php } ?>
<?php } ?>

    </div>






