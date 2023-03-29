<?php
$user_image = $_SESSION['user_image'];
?>
<?php if ($_SESSION['in_club'] == 1) {
  $club_name = $_SESSION['club_name']; 
  $club_image = $_SESSION['club_image'];
  $club_id = $_SESSION['club_id'];
  $member_type = $_SESSION['member_type'];
}?>

<style>
  .img {
    width: 22px;
    max-width: 100%;
    margin: auto;
    vertical-align: middle;
  }

  .feedimg {
    width: 19px;
    max-width: 100%;
    margin: auto;
    vertical-align: middle;
  }

  .joinedimg {
    width: 28px;
    max-width: 100%;
    margin: auto;
    vertical-align: middle;
  }

  .link {
    color: Black;
    padding: 0 10px 0 3px;
    text-decoration: none;
  }
  .dropdown-menu {
    max-height: 230px;
    overflow-y: auto;
}
</style>
<!-- ---------------------------------------------------navbar---------------------------------------------------- -->
<nav class="navbar navbar-expand-lg  p-2 fixed-top  bg-light">
  <div class="container">

    <?php if ($_SESSION['in_club'] == 0) : ?>
      <a href="#" class="navbar-brand text-primary logo" style="font-size: 15px ;"><img src="../images/nstu.png" alt="user icon" style="width:25px;border-radius:50%;" /> NSTU CLUB COLLAB</a>
      <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon bg-dark"></span>
      </button>
    <?php else : ?>
      <a href="#" class="navbar-brand text-primary logo"><img src="../images/nstu.png" alt="user icon" style="width:25px;border-radius:50%;" /> <?php echo $club_name; ?>: <?php echo $member_type; ?></a>
    <?php endif; ?>


    <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav ms-auto">
        <?php if ($_SESSION['in_club'] == 0) : ?>
          <li class="nav-item pe-2">
            <img src="../images/newsFeed.png" class="feedimg" alt="logo" />
            <a href="userfeed.php" class="link">
              <span><b>Feed</b></span>
            </a>
          </li>
          <li class="nav-item pe-2">
            <img src="../images/discover.png" class="img" alt="logo">
            <a href="userdiscover.php" class="link">
              <span><b>Discover Club</b></span>
            </a>
        </li>
          <li class="nav-item pe-2">
            <img src="../images/joined.png" class="img" alt="logo" />
            <a href="userjoinedclub.php" class="link">
              <span><b>My Clubs</b></span>
            </a>
          </li>
          <li class="nav-item pe-2">
            <img src="../images/joinedClub.jpg" class="joinedimg" alt="logo" />
            <a href="userjoinclub.php" class="link">
              <span><b>Join Club</b></span>
            </a>
          </li>
        <?php else : ?>
          <?php if ($_SESSION['member_type'] == "member") : ?>
            <li class="nav-item pe-2">
              <img src="../images/createPost.png" class="img" alt="logo">
              <a href="../member/membercreatepost.php" class="link">
                <span><b>Create Post</b></span>
              </a>
            </li>
            <li class="nav-item pe-2">
              <img src="../images/manage.jpg" class="feedimg" alt="logo" />
              <a href="../member/membermanagepost.php" class="link">
                <span><b>Manage Post</b></span>
              </a>
            </li>
            <li class="nav-item pe-2">
              <img src="../images/pay.png" class="img" alt="logo" />
              <a href="../member/memberpayment.php" class="link">
                <span><b>Payment</b></span>
              </a>
            </li>
            <li class="nav-item pe-2">
              <img src="../images/home.jpg" class="joinedimg" alt="logo" />
              <a href="../user/userjoinedclub.php" class="link">
                <span><b>Home</b></span>
              </a>
            </li>
          <?php else : ?>
            <!-- <li class="nav-item pe-2"> -->

            <li class="nav-item dropdown">
              <img src="../images/createPost.png" class="img" alt="logo">
              <a class="link me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b>Post</b>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="../member/membercreatepost.php">Create Post</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../member/membermanagepost.php">Manage Post</a>
                </li>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <img src="../images/member.jpg" class="img" alt="logo">
              <a class="link me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b>Member</b>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="../admin/adminaddmember.php">Add Member</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../admin/adminmanagemember.php">Manage Member</a>
                </li>
              </ul>
            </li>



            <li class="nav-item dropdown">
              <img src="../images/new_arrival.png" class="joinedimg" alt="logo">
              <a class="link me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b>New Arrival</b>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="../admin/adminpublishform.php">Apply Form</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../admin/adminmanageapplicant.php">Manage Applicant</a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <img src="../images/activity.png" class="joinedimg" alt="logo">
              <a class="link me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b>Club Activities</b>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="../member/memberpayment.php">Payment</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../admin/adminsentinvitation.php">Sent Invitation</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../admin/adminpayroll.php">Check Payroll</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <img src="../images/home.jpg" class="joinedimg" alt="logo" />
              <a href="../user/userfeed.php" class="link">
                <span><b>Home</b></span>
              </a>
            </li>
          <?php endif; ?>

        <?php endif; ?>
      </ul>
      <ul class="navbar-nav ms-auto">
        <div style="margin-top:7px;" >
          <li class="nav-item dropdown">
            <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell " style="font-size:20px"></i>
            </a> 
             
            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdownMenuLink" >
            <?php if ($_SESSION['in_club'] == 0){
              include "notification.php";}
              else{
                include "clubnotification.php";
              }?>
               
            </ul>  
          </li>
        </div>


        <?php if ($_SESSION['in_club'] == 0) : ?>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../images//<?php echo $user_image; ?>" class="rounded-circle" height="36" alt="user icon" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="../user/userprofile.php" id="profilebutton">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="../assets/logout.php">Logout</a>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../images//<?php echo $club_image; ?>" class="rounded-circle" height="36" alt="user icon" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="../club/clubshowmembers.php?club_id=<?php echo  $club_id; ?> && member_type=<?php echo  $member_type; ?> && after_login='1' " id="profilebutton">Club profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="../assets/logout.php">Logout</a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>