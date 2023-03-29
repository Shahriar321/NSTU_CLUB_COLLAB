<?php
$club_image=$_SESSION['club_image'];
$club_id=$_SESSION['club_id'];
$member_type=$_SESSION['member_type'];
?>  
 <!-- ---------------------------------------------------navbar---------------------------------------------------- -->
  <nav class="navbar navbar-expand-lg  p-3 fixed-top  navbar-light bg-light">  
  <a href="#" class="navbar-brand logo">
                <!-- <img src="images/nstu.png" class="align-middle px-0 mainlogo" height="90"     alt="logo" /> -->
                 <?php echo $club_name;?>
            </a>

    <div class="container-fluid"> 
      <div class="collapse navbar-collapse"  > 
        <ul class="navbar-nav ms-auto mb-0 mb-lg-0 "> 
            <!-- -------------------------------notification-------------------------------- -->
          <li class="nav-item dropdown">
            <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <i class="fa fa-bell " style="font-size:33px"></i> 
            </a>
                <ul class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="#">Some news</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Another news</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
          </li>
          <!-- -----------------------------------------Club Profile------------------------------------------ -->
          <li class="nav-item dropdown">
            <a  class="dropdown-toggle d-flex align-items-center hidden-arrow"href="#"id="navbarDropdownMenuAvatar"role="button"data-bs-toggle="dropdown"  aria-expanded="false">
                 <img src="../images//<?php echo$club_image; ?>"  class="rounded-circle" height="36" alt="user icon" loading="lazy"/>
             </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar" >
            <li>
              <a class="dropdown-item" href="../club/clubshowmembers.php?club_id=<?php echo  $club_id; ?> && member_type=<?php echo  $member_type; ?>" id="profilebutton">CLub profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="../admin/admineditclub.php" id="profilebutton">Edit Club</a>
            </li>
            <li>
              <a class="dropdown-item" href="../member/leaveclub.php">Leave club!</a>
            </li>
          </ul>
           </li>
           </ul>  
      </div> 
    </div>
 
  </nav>
   
 