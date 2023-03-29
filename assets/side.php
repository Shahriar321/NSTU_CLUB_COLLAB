 <?php
 
 if($_SESSION['in_club']==0){

  
 ?>
  <!-- ----------------------------------------------side bar for all user------------------------------------------ -->
 
        <div class="col-auto side">
        
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
</dr></br></br></br></br>
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto">
                    <span class="fs-3 d-none d-sm-inline meanue">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="../user/userdiscover.php"  class="nav-link align-middle px-0 " id="discoverbutton">
                          <img src="../images//discover.png" class="img" alt="logo" />  <span class="ms-1 d-none d-sm-inline text">Discover club</span>
                        </a>
                    </li>
                    <li>
                    <a href="../user/userfeed.php" id="feedbutton" class="nav-link px-0 align-middle">
                          <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Feed</span></a>
                    </li>
                    <li>
                        <a href="../user/userjoinedclub.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                          <img src="../images//joined.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">My clubs</span></a>
                    </li>
                    <li>
                        <a href="../user/userjoinclub.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                          <img src="../images//joined.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Join clubs</span></a>
                    </li>  
                </ul>
                 
            </div>
            
        </div>


  <!-- -----------------------------------sidebar after club enter ------------------------------------------------------------------------------------------->
        <?php
 
        }else{
//-------------------------------------------------if club member-----------------------------------------------------
            if($_SESSION['member_type']=="member"){
 
        ?> 

 
        
<div class="col-auto side">
        
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
</dr></br></br></br></br>
            <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto">
                <span class="fs-3 d-none d-sm-inline meanue">Member-Menu</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a href="../member/membercreatepost.php"  class="nav-link align-middle px-0 " id="createbutton">
                      <img src="../images//discover.png" class="img" alt="logo" />  <span class="ms-1 d-none d-sm-inline text">Create Post</span>
                    </a>
                </li>
                <li>
                <a href="../member/membermanagepost.php" id="feedbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Manage Post</span></a>
                </li>
                <li>
                    <a href="../member/memberpayment.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//joined.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Payment</span></a>
                </li> 
                <li>
                    <a href="../user/userfeed.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//noti.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Home</span></a>
                </li>   
            </ul>
             
        </div>
        
    </div>


       


     <?php
//--------------------------------------------if clubadmin---------------------------------------------------
            }else{
         
 
      ?> 

<div class="col-auto side">
        
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
</dr></br></br></br></br>
            <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto">
                <span class="fs-3 d-none d-sm-inline meanue">Admin-Menu</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a href="../member/membercreatepost.php"  class="nav-link align-middle px-0 " id="createbutton">
                      <img src="../images//discover.png" class="img" alt="logo" />  <span class="ms-1 d-none d-sm-inline text">Create Post</span>
                    </a>
                </li>
                <li>
                <a href="../member/membermanagepost.php" id="feedbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Manage Post</span></a>
                </li>
                <li>
                    <a href="../member/memberpayment.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//joined.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Payment</span></a>
                </li>  
                <li>
                    <a href="../admin/adminaddmember.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Add Member</span></a>
                </li>
                <li>
                    <a href="../admin/adminmanagemember.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Manage Member</span></a>
                </li>
                <li>
                    <a href="../admin/adminmanageapplicant.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Manage Applicant</span></a>
                </li>
             
                <li>
                    <a href="../admin/adminpublishform.php"  id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Apply Form</span></a>
                </li>  
                <li>
                    <a href="../admin/adminsentinvitation.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Sent invitaion</span></a>
                </li>
                <li>
                    <a href="../admin/adminpayroll.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//feed.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Check Payroll</span></a>
                </li>
                <li>
                    <a href="../user/userfeed.php" id="joinedclubbutton" class="nav-link px-0 align-middle">
                      <img src="../images//noti.png" class="img" alt="logo" /> <span class="ms-1 d-none d-sm-inline text">Home</span></a>
                </li>   
                
            </ul>
             
        </div>
        
    </div>





     <?php
            }
         }
 
      ?> 