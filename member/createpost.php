
    <?php

include '../assets//config.php';
if (isset($_POST['submit'])) {
 
    $post_status=null;
    $post_caption = mysqli_real_escape_string($conn, $_POST['post_caption']);
    if(isset( $_POST['post_status'])){
        $post_status = mysqli_real_escape_string($conn, $_POST['post_status']);
    }
     
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../post_images//' . $image;
 
    
    $post_time = date("m.d.Y"); 

    if ($image_size > 3145728) {
        $message[] =  'Image size is too large ,please provide new picture less than 3MB';
    
    
    }elseif($post_status==null){
        $message[] =  'Select post type';
    } else {
        move_uploaded_file($image_tmp_name, $image_folder);
        $create_post = mysqli_query($conn, "INSERT INTO `post`(user_id,club_id,post_caption,post_picture,post_status,post_time) VALUES('$user_id', '$club_id', '$post_caption','$image', '$post_status', '$post_time')") or die('query failed');
        $message[] =  'Post created successfully!';
    }
}

?>
<!-- ------------------------------------------error or successfull messege---------------------- -->
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


 
<div class="container">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Create Post</a>
        
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row gutters-sm mt-0 ">
        <div class="col-sm-2"></div>
        <div class="col-md-8">
            <div class="card card-body px-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center mb-0"><i class="fa-solid fa-pencil"></i> Create Post</h3>
                    </div>
                </div>
                <hr>
                <!---------------------------------------form for post------------------------------------ -->
                <form class="row" action="" method="post" name="postform" enctype="multipart/form-data" autocomplete="off">

                    <div class="col-sm-12 form-group">
                        <label for="post_caption" class="mb-2"><b>Description:</b> <sup class="star-color">*</sup></label>
                        <textarea name="post_caption" class="form-control form-control-lg mb-4" rows="4"></textarea>
                    </div>
                    <div class="col-sm-12 form-group mb-3">
                        <label for="photo" class="mb-2"><b>Photo:</b></label>
                        <input class="form-control" type="file" accept="image/jpg, image/jpeg, image/png" name="image">
                    </div>
                    <div class="d-flex mb-0">
                        <label class="mb-2 me-3"><b>Availability: </b></label>
                        <div class="me-3">
                            <input type="radio" name="post_status" value="Public"> Public
                        </div>
                        <div>
                            <input type="radio" name="post_status" value="Private"> Private
                        </div>
                    </div>
                    <div class="align-items-center d-flex">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto"><i class="fas fa-check"></i> Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


 