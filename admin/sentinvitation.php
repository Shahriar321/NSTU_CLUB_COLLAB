<?php
include '../assets//config.php';
if(isset($_POST['submit'])){ 
    $invitedclub_id= $_POST['invitedclub_id'];
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']); 
    $invite_msg = mysqli_real_escape_string($conn, $_POST['invite_msg']);
    $invite_date = date("m.d.Y"); 
    $noti_description=$club_name." invitation for club event <b>.$event_name</b> ";
    if($invitedclub_id=="all"){

        $club=mysqli_query($conn, "SELECT * FROM `clubs`") or die('query failed');
        if(mysqli_num_rows($club) > 0){ 
            while($row = mysqli_fetch_assoc($club)){ 
                $club_name=$row['club_name'];
                $invitedclub_id=$row['club_id'];  
        mysqli_query($conn, "INSERT INTO `invitation`(club_id,invitedclub_id,event_name,invite_msg,invite_date) VALUES('$club_id','$invitedclub_id','$event_name','$noti_description','$invite_date')") or die('query failed');
            }
        } 
        $message[] = 'Invitation is sent to all';   
    }else{ 
        
        mysqli_query($conn, "INSERT INTO `invitation`(club_id,invitedclub_id,event_name,invite_msg,invite_date) VALUES('$club_id','$invitedclub_id','$event_name','$noti_description','$invite_date')") or die('query failed');
        $message[] = 'Invitation is sent to selected club'; 
    }
     
    
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
<div class="container">
     <!-- Account page navigation-->
     <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Sent Invitation</a>
        
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row gutters-sm mt-0 ">
        <div class="col-sm-2"></div>
        <div class="col-md-8">
            <div class="card card-body px-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center mb-0"><i class="fa-solid fa-pencil"></i>Invite CLubs</h3>
                    </div>
                </div>
                <hr>
                <!---------------------------------------form for post------------------------------------ -->
                <form class="row" action="" method="post" name="postform" enctype="multipart/form-data" autocomplete="off">

                    <div class="col-sm-12 form-group">
                        <label for="invite_msg" class="mb-2"><b>Description:</b> <sup class="star-color">*</sup></label>
                        <textarea name="invite_msg" class="form-control form-control-lg mb-4" rows="4"></textarea>
                    </div> 
                    <div class="col-sm-12 form-group mb-3">
                        <label for="event_name" class="mb-2"><b>Event name</b></label>
                        <input class="form-control" type="text" placeholder="Enter the event name"  name="event_name">
                    </div>
                    <div class="d-flex mb-0">
                        <label class="mb-2 me-3"><b>Select Clubs</b></label> 
                        <div class="me-3">
                        <select name="invitedclub_id" class="mb-3" id="type-option" required>
                        <option  disabled selected value>Select a club</option>
                        <option value="all">To All Clubs</option>

                        <?php
                        $club=mysqli_query($conn, "SELECT * FROM `clubs`") or die('query failed');
                        if(mysqli_num_rows($club) > 0){ 
                            
                            while($row = mysqli_fetch_assoc($club)){ 
                                $club_name=$row['club_name'];
                                $club_id=$row['club_id'];

                        ?> 
                        <option value="<?php echo  $club_id; ?>"><?php echo  $club_name; ?></option>

                        <?php
                            }
                        }
                       ?>
                         

                        </select>
                        </div> 
                    </div>
                    <div class="align-items-center d-flex">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto"><i class="fas fa-check"></i> Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
 
    <!-- ------------------------------------------error or successfull messege---------------------- -->
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
      <div class="message">
         <span>' . $message . '</span>
         <i  class="fa fa-bell " style="font-size:20px" onclick="this.parentElement.remove();"></i>
      </div>
      ';
        }
    }
    ?>