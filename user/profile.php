 <?php
    include '../assets//config.php';
    $user = mysqli_query($conn, "SELECT * FROM `club_members` WHERE  user_id='$user_id'") or die('query failed');

    ?>
 <style>
     .mainsection {
         padding-left: 0rem;
         padding-top: 9rem;
     }
 </style>
 <div class="container">
     <!-- Account page navigation-->
     <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        
    </nav>
    <hr class="mt-0 mb-4">
     <div class="main-body">
         <div class="row gutters-sm">
             <div class="col-md-5 mb-3">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex flex-column align-items-center text-center mt-4 mb-4 pt-1">
                             <img src="../images//<?php echo $user_image;?>" alt="Admin" class="rounded-circle" width="150">
                             <div class="mt-3">
                                 <h4> <?php echo $user_name; ?></h4>
                             </div>

                             <div class="col-sm-4 text-secondary">
                                 <a href="userchangepass.php" style="text-decoration: none;">Change Password</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-md-7" style="padding-top: 1px;">
                 <div class="card mb-3">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-3">
                                 <h6 class="mb-0">Full Name</h6>
                             </div>
                             <div class="col-sm-9 text-secondary">
                                 <?php echo $user_name; ?>
                             </div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-sm-3">
                                 <h6 class="mb-0">Email</h6>
                             </div>
                             <div class="col-sm-9 text-secondary">
                                 <?php echo $user_email; ?>
                             </div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-sm-3">
                                 <h6 class="mb-0">Department</h6>
                             </div>
                             <div class="col-sm-9 text-secondary">
                                 <?php echo $user_dept; ?>
                             </div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-sm-3">
                                 <h6 class="mb-0">Batch</h6>
                             </div>
                             <div class="col-sm-9 text-secondary">
                                 <?php echo $user_batch; ?>
                             </div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-sm-3 pb-1">
                                 <h6 class="mb-0">Joined clubs</h6>
                             </div>
                             <div class="col-sm-9 text-secondary pb-1">
                                 <?php echo mysqli_num_rows($user); ?>
                             </div>
                         </div>

                         <div class="d-flex justify-content-end">
                             <a href="usereditprofile.php" style="text-decoration: none;">Edit Profile</a>

                         </div>

                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <?php
                if (mysqli_num_rows($user) > 0) {
                    while ($row = mysqli_fetch_assoc($user)) {

                        $club_id = $row['club_id'];
                        $member_type = $row['member_type'];

                        $club = mysqli_query($conn, "SELECT * FROM `clubs` WHERE club_id='$club_id'") or die('query failed');
                        if (mysqli_num_rows($club) > 0) {
                            $rowc = mysqli_fetch_assoc($club);
                            $club_name = $rowc['club_name']; 
                            $club_image = $rowc['club_image'];
                        }

                ?>

                     <div class="col-md-4">
                         <div class="card user-card">
                             <div class="card-block">
                                 <div class="user-image">
                                     <img src="../images//<?php echo $club_image; ?>" class="img-radius" alt="User-Profile-Image">
                                 </div>
                                 <hr>
                                 <p class=" m-t-15"><?php echo  $club_name ?></p>
                                 <p class=" m-t-15"><?php echo $member_type; ?></p>
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