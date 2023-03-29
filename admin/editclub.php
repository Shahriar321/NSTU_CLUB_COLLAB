<?php 
include '../assets/config.php'; 


 

if(isset($_POST["submit"])){  

    if($_FILES['image']['name']!=null){
    
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../images//'. $image;
    
    if ($image_size > 3145728) {
        $message[] =  'Image size is too large ,please provide new picture less than 3MB';
    
    }else{ 
        move_uploaded_file($image_tmp_name, $image_folder);  
        mysqli_query($conn, "UPDATE `clubs` SET  club_image='$image'  WHERE club_id= '$club_id'") or die('query failed'); 
        $_SESSION['club_image']=$image; 
        
        $message[] = 'Successfullly Updated Club Profile Picture';
        echo
        "
        <script> 
          document.location.href = './admineditclub.php';
        </script>
        ";
         
    }
    } 

  }
     
  // Save changes for descriptions

  if(isset($_POST["save_changes"])){ 
    $textarea = $_POST["textarea"];

    $query = "UPDATE clubs SET club_description = '$textarea' WHERE club_id = '$club_id'";
    mysqli_query($conn, $query);
    $message[] = 'Successfullly Updated Club Description';
    echo
    "
    <script>
    document.location.href = './admineditclub.php';
    </script>
    ";


  } 
?>
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

 

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Edit club</a>
        
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4"> 
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Club Picture</div>
                <div class="card-body text-center"> 
                    <?php
                    $available = mysqli_query($conn, "SELECT * FROM `clubs`  WHERE club_id='$club_id'") or die('query failed');
                    $user = mysqli_fetch_assoc($available);
                    $club_id = $user["club_id"];
                    $name = $user["club_description"];
                    $image = $user["club_image"];
                     ?>
                    
                    <img class="img-account-profile rounded-circle mb-2" src="../images//<?php echo $image; ?>" width="50%" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 3 MB</div>
                    <!-- Profile picture upload button-->
                    <form class="form" id = "form" class="mb-3" action="" method="post" enctype="multipart/form-data">
      

                            <input type="file"  class="form-control form-control-sm" name="image" id = "image" accept="image/jpg, image/jpeg, image/png" > <br>
                           <button type = "submit" class="btn btn-primary p-2" name = "submit">Submit</button>
    
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Club Details</div>
                <div class="card-body">
                    <form action="" method="post" >
                    <div class="form-floating">
                               <input type="hidden"  class="form-control form-control-sm" name="id" value="<?php echo $club_id; ?>"> 

                                <textarea name="textarea" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                                </div>
                               </br>
                        <button class="btn btn-primary p-2" type = "submit" name = "save_changes">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>