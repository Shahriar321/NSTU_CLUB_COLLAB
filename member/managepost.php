<nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Manage Post</a>
        
    </nav>
    <hr class="mt-0 mb-4">

<?php
include '../assets//config.php';
$member_type=$_SESSION['member_type'];
if(isset($_POST['submit'])){
    $comment_content= mysqli_real_escape_string($conn, $_POST['comment_content']);
    $commnet_id= $_POST['comment_id']; 
    $post_id=$_POST['post_id'];
    $comment_time = date("m.d.Y"); 

    mysqli_query($conn, "INSERT INTO `comment_reply`(comment_id,user_id,post_id,reply_content,comment_time) VALUES('$commnet_id', '$user_id','$post_id','$comment_content','$comment_time')") or die('query failed');
     
    
}       
         if($member_type=='adimn') { 
          echo "lol";
          $post = mysqli_query($conn, "SELECT * FROM `post` WHERE club_id='$club_id' ORDER BY post_id DESC ") or die('query failed');
         }else{
          
          $post = mysqli_query($conn, "SELECT * FROM `post` WHERE club_id='$club_id' AND user_id='$user_id' ORDER BY post_id DESC ") or die('query failed');
         }
          
         if(mysqli_num_rows($post) > 0){ 
            while($row = mysqli_fetch_assoc($post)){ 
                $post_id=$row['post_id'];
                $post_caption=$row['post_caption'];
                $post_picture=$row['post_picture'];
                $post_time=$row['post_time']; 
                $club_id=$row['club_id'];
                $club=mysqli_query($conn, "SELECT * FROM `clubs` WHERE club_id='$club_id'") or die('query failed');
                if(mysqli_num_rows($club) > 0){
                    $rowc= mysqli_fetch_assoc($club);
                    $club_name=$rowc['club_name'];
                    $club_image=$rowc['club_image'];
                     
                }  
                
          
                
      ?>


<section >
    <div class="container my-2 py-1 px-2">
     
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card p-2">
<!-- ---------------------------------------------------------loads post one by one------------------------------------------------------------------------------- -->
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3" src="../images//<?php echo $club_image; ?>" width="60" height="60" />
                            <div>
                                <h6 class="fw-bold text-primary mb-1"><?php echo $club_name; ?></h6>
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
                        <?php if($post_picture!=null) {?>
                            <img class="py-3" src="../post_images//<?php echo  $post_picture; ?>" width="50%" height="auto" />
                            <?php }?>
                        </div>
                    </div>

                     
<!-- --------------------------------------------------------checks fo comment and loads comment-------------------------------------------- -->
       <?php
            $comment=mysqli_query($conn, "SELECT * FROM `comment` WHERE post_id='$post_id' ORDER BY comment_id DESC") or die('query failed');
            if(mysqli_num_rows($comment) > 0){
              while($rowco= mysqli_fetch_assoc($comment)){;
                $comment_id=$rowco['comment_id'];
                $user_id=$rowco['user_id'];
                $comment_content=$rowco['comment_content'];
                $comment_time=$rowco['comment_time'];

                $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $user_id'") or die('query failed');
                if(mysqli_num_rows($user) > 0){
                    $rowu= mysqli_fetch_assoc($user);
                    $user_name=$rowu['name']; 
                    $user_image=$rowu['user_image'];
                     
                }
            

           ?>

           <div class="card-body p-4">  
            <div class="row">
              <div class="col">
                <div class="d-flex flex-start">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="../images//<?php echo  $user_image; ?>"  width="30" height="30" />
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1"> <?php echo  $user_name; ?>
                        </p> 
                        <a href="deletePost.php?deleteComment=1? && comment_id=<?php echo  $comment_id; ?>" class=" btn-sm text-danger" style="text-decoration:none ;"><b>Delete</b></a>
                      </div>
                      <p class="small mb-0">
                      <?php echo  $comment_content; ?>
                      </p>
                    </div>
                    <!-- ---------------------------------reply Form------------------------------------------- -->
                    <form action="" method="post" class="row ps-3 pe-4 replyArea"   style="display:block;"> 
                    <div class="d-flex">
                    <div class="col-sm-10 mb-2 mt-2">
                            <input type="text" name="comment_content" class="form-control" placeholder="Write Comment" style="font-size:12px ;">
                            <input type="number" name="comment_id" class="form-control" value="<?php echo  $comment_id; ?>" style="display:none;">
                            <input type="number" name="post_id" class="form-control" value="<?php echo  $post_id; ?>" style="display:none;">
                        </div>
                        <div class="col-sm-2" style="display: flex; justify-content: flex-end;">
                            <button  type="submit" name="submit" class="btn btn-sm btn-primary mb-2 mt-2">   Reply  </button>
                        </div>
                       
                    </div>
                       
                    </form>
                    <script>
                      	function loadComment() { 
                          if(document.querySelector(".replyArea").style.display =="none"){
                            document.querySelector(".replyArea").style.display ="block";
                          }else{
                            document.querySelector(".replyArea").style.display ="none";
                          } 
                    	}
                    
                    </script>

<!-- ---------------------------------------------------checks for comment reply and loads reply---------------------------------------------------------- -->
                    <?php 
                               $comment_reply=mysqli_query($conn, "SELECT * FROM `comment_reply` WHERE comment_id='$comment_id' ORDER BY reply_id DESC") or die('query failed');
                              if(mysqli_num_rows($comment_reply) > 0){
                                while( $rowreply= mysqli_fetch_assoc($comment_reply)){ 
                                
                                $user_id=$rowreply['user_id'];
                                $reply_content=$rowreply['reply_content'];
                                $comment_time=$rowreply['comment_time'];

                                $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $user_id'") or die('query failed');
                                if(mysqli_num_rows($user) > 0){
                                $rowu= mysqli_fetch_assoc($user);
                                 $user_name=$rowu['name']; 
                                 $user_image=$rowu['user_image'];
                                }
                                 
                            
            
                    ?>
                  
                     
                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img class="rounded-circle shadow-1-strong"
                          src="../images//<?php echo  $user_image; ?>" alt="avatar" width="30" height="30" />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                            <?php echo  $user_name; ?>
                            </p>
                          </div>
                          <p class="small mb-0">
                          <?php echo  $reply_content?> 
                          </p>
                          <span><?php echo  $comment_time?></span>
                        </div>
                      </div>
                    </div>

                    <?php
                                }
                              }
                    ?>

                    
                  </div>
                </div>
 
              </div>
            </div>
          </div> 

                <?php
                    }
                  } 
                    ?>
                    
                    <div class="d-flex ps-3 pe-4" style="justify-content: flex-end;">
                        <a href="deletePost.php?deletePost=1? && post_id=<?php echo  $post_id; ?>" class=" btn-sm text-danger" style="text-decoration:none ;"><b>Delete Post</b></a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<?php
         }
      }else{?>
        <div class="container my-2 py-1 px-2">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Manage Post</a>
        
    </nav>
    <hr class="mt-0 mb-4">
        No post yet

    <?php  }
?>
      

 