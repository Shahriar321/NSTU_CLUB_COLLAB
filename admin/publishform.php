 <?php 
 include '../assets//config.php';
 

$form = mysqli_query($conn, "SELECT * FROM `apply_form` WHERE club_id = '$club_id' AND session_status='running'") or die('query failed');


if (isset($_POST['submit'])) {

    $description= mysqli_real_escape_string($conn, $_POST['description']);
    $bkash_number = $_POST['bkash_number'];
    $ammount = $_POST['ammount'];
    $session_numbergiven = $_POST['session_number'];
    $end_time = $_POST['end_time']; 
    $noti_time = date("Y-m-d"); 

    $check_formnumber = mysqli_query($conn, "SELECT * FROM `apply_form` WHERE club_id = '$club_id' AND session_number='$session_numbergiven'") or die('query failed');
 
 
 
    if (!mysqli_num_rows($form) > 0) {

        if(mysqli_num_rows($check_formnumber) > 0){
            $message[] =  'Already have this number for previous form!';

        }else if(strlen($bkash_number)!=11){
            $message[] =  'Not 11 digit';
    
        } else{
            $create_post = mysqli_query($conn, "INSERT INTO `apply_form`(club_id,description,ammount,bkash_number,end_time,session_number) VALUES('$club_id', '$description', '$ammount','$bkash_number', '$end_time','$session_numbergiven')") or die('query failed');
       
       
            $noti_description=$club_name." has now published a new recruitment form ";
            mysqli_query($conn, "INSERT INTO `notification`(club_id,description,noti_time) VALUES('$club_id', '$noti_description','$noti_time')") or die('query failed');
    
            $message[] =  'session started successfully!';

        }


        
    }else{ 

        $message[] =  'A session is already running!';
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
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Apply form</a>
        
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row gutters-sm mt-0 ">
        <div class="col-sm-2"></div>
        <div class="col-md-8">
            <div class="card card-body px-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center mb-0"><i class="fa-solid fa-pencil"></i>Application Form</h3>
                    </div>
                </div>
                <hr>
                <!---------------------------------------form for post------------------------------------ -->
                <form class="row" action="" method="post" name="apply_form" enctype="multipart/form-data" autocomplete="off">

                    <div class="col-sm-12 form-group">
                        <label for="description" class="mb-2"><b>Application Description:</b> <sup class="star-color">*</sup></label>
                        <textarea name="description" class="form-control form-control-lg mb-4" rows="4" required></textarea>
                    </div>
                    <div class="col-sm-12 form-group mb-3">
                        <label for="" class="mb-2"><b>Form number</b></label>
                        <input class="form-control" type="number" placeholder="Give a unique number to the Application form"  name="session_number" required>
                    </div> 
                    <div class="col-sm-12 form-group mb-3">
                        <label for="bkash_number" class="mb-2"><b>Payment number</b></label>
                        <input class="form-control" type="number" placeholder="bkash number to pay"  name="bkash_number" required>
                    </div> 
                    <div class="col-sm-12 form-group mb-3">
                        <label for="ammount" class="mb-2"><b>Pay Ammount</b></label>
                        <input class="form-control" type="number" placeholder="From Price"  name="ammount" required>
                    </div> 
                    <div class="col-sm-12 form-group mb-3">
                        <label for="end_time" class="mb-2"><b>Ending date</b></label>
                        <input class="form-control" type="date" placeholder="year-month-date"  name="end_time" required>
                    </div>
                    <div class="align-items-center d-flex">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto"><i class="fas fa-check"></i>Publish</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


 