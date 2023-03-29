<!-- -----------------------------------payment session backend-------------------------------------- -->
<?php

include '../assets//config.php';

if (isset($_POST['monthysession'])) {

	$month = mysqli_real_escape_string($conn, $_POST['month']);
	$year = $_POST['year'];  
    $pay_number= $_POST['number'];
	//--------------------------------------checks for availability of payment of the month------------------------------
  if(strlen($pay_number)!=11){
    $message[] = 'Not 11 digit' . $month;

  }else{	$available = mysqli_query($conn, "SELECT * FROM `clubmonthypayment`  WHERE  clubmonthypayment.month='$month' AND clubmonthypayment.year='$year' AND clubmonthypayment.club_id='$club_id'") or die('query failed');

    if (!mysqli_num_rows($available) > 0) {
  
         mysqli_query($conn, "INSERT INTO `clubmonthypayment`(club_id,month,year,pay_number) VALUES('$club_id', '$month', '$year', '$pay_number')") or die('query failed');
          $message[] = 'Succesfully inserted  session for month   --->' . $month;
          
      } 
          else{
              $message[] = 'Alredy have payment session for month   --->' . $month;
          }}
 
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


<!---------------------------------------payment session---------------------------------------------------->
<div class="container">
<nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Check Payroll</a>
        
    </nav>
    <hr class="mt-0 mb-4">
<form  action="" method="post"  >
  <h1>Start payment session</h1>
  <div class="row">
    <div class="col-3">
      <input type="text" class="form-control" name="month" placeholder="Month">
    </div>
    <div class="col-3">
      <input type="number" class="form-control" name="year" placeholder="Year">
    </div>
    <div class="col-3">
      <input type="number"  class="form-control" name="number" placeholder="Pay number"> 
    </div>
    <div class="col-3">
    <button type="submit" name="monthysession" class="btn btn-primary mb-4 px-3 py-1">Open Session</button>
    </div>
     
  </div>
  
</form>

</div> 

<!-- ------------------------------------------------payroll show area of monethly pay --------------------------------------->
<div class="container">

<h1>Member Payroll</h1>

<form class="row" action="" method="post"   >

<div class="form-group col-md-3"> 
 
    <select id="inputState" class="form-control" name="month">
    <option  disabled selected value>Select a month</option> 

                        <?php
                        $club=mysqli_query($conn, "SELECT * FROM `clubmonthypayment` WHERE club_id='$club_id'") or die('query failed');
                        if(mysqli_num_rows($club) > 0){ 
                            
                            while($row = mysqli_fetch_assoc($club)){ 
                                $month=$row['month']; 

                        ?> 
                        <option value="<?php echo  $month; ?>"><?php echo  $month; ?></option>

                        <?php
                            }
                        }
                       ?>
                         

</select>
</div>
<div class="form-group col-md-3"> 
 <select id="year" class="form-control" name="year">
    <option>year</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
  </select>
  </div>
  <div class="form-group col-md-3">
      <button type="submit" name="selsectmonth" class="btn btn-primary mb-4 px-3 py-1 ">Show</button>
 </div> 
</form> 

<!-- -------------------------------------------check for session fo selected moth and time--------------------- -->
<?php

if (isset($_POST['selsectmonth'])) { 

	$month = mysqli_real_escape_string($conn, $_POST['month']);
	$year = $_POST['year'];   
	//--------------------------------------checks for availability of payment of the month------------------------------
	$available = mysqli_query($conn, "SELECT * FROM `clubmonthypayment`  WHERE  clubmonthypayment.month='$month' AND clubmonthypayment.year='$year' AND clubmonthypayment.club_id='$club_id'") or die('query failed');
     
	if (mysqli_num_rows($available) > 0) { 
        $row = mysqli_fetch_assoc($available);
        $payment_id=$row['payment_id'];  
      
 
//-- -----------------------table starts------------------------------- --> 
    
         $payment = mysqli_query($conn, "SELECT * FROM `pay`  WHERE payment_id='$payment_id'") or die('query failed');

        if (mysqli_num_rows($payment) > 0) {  ?>
          <div class="col-lg-12">
          <div class="main-box clearfix">
            <div class="table-responsive"> 
            <table class="table user-list">
              <thead>
                  <tr>
                    <th><span>Name</span></th>
                    <th><span>Dp</span></th>
                    <th><span>Payment Amount</span></th>
                                  <th><span>Transaction number</span></th>
                                  <th><span>Payment Status</span></th>
                                  <th><span>User Payment number</span></th> 
                  </tr>
          </thead>
          <?php
           
          $toall=0;
        while ($row = mysqli_fetch_assoc($payment)) {
        $userp_id = $row['user_id'];
        $transiction_number = $row['transiction_number'];
        $bkash_number = $row['mobile_number'];
        $payment_ammount = $row['payment_ammount'];
        $payment_status = $row['payment_status'];
        $toall=$toall+$payment_ammount;
        $user=mysqli_query($conn, "SELECT * FROM `users` WHERE  user_id=' $userp_id'") or die('query failed');
                if(mysqli_num_rows($user) > 0){
                    $rowu= mysqli_fetch_assoc($user); 
                    $user_name=$rowu['name']; 
                    $user_image=$rowu['user_image'];
                    $user_dept=$rowu['department'];
                     
                }
                include "payrolltable.php";
    }
    ?>
    <!-- -------table end --------------------------------->
			</tbody> 
				</table>
			</div>
      <h3 class="text-center">Totall payment of this month till now is:<?php echo $toall;?></h3>
		</div>
	</div> 
    <?php
        
		} 
        else{
          echo " <h3 class='text-center'>No payment has been added yet to this session $month </h3>"; 
        }
        
                
} else{
    $message[] = 'No Session is created for this month  --->' . $month;
}
}

?>
 
</div>
</div>