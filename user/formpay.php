<?php

include '../assets//config.php';
$description=$_GET['description'];
$club_id=$_GET['club_id'];

if (isset($_POST['submit'])) {
 
	$pay_number = $_POST['pay_number'];
	$bkash_number = $_POST['bkash_number'];
	$transiction_number= mysqli_real_escape_string($conn, $_POST['transiction_number']);

	//--------------------------------------checks for user already paid-----------------------------
	$available = mysqli_query($conn, "SELECT * FROM `apply_form`  WHERE   club_id='$club_id'") or die('query failed');
	if(strlen($bkash_number)!=11 || strlen($pay_number)!=11){
		$message[] = 'Not 11 digit';

	}
	elseif (mysqli_num_rows($available) > 0) {

		while ($row = mysqli_fetch_assoc($available)) {
			$session_id = $row['session_id']; 
		} 

		$payed = mysqli_query($conn, "SELECT * FROM `form_pay`  WHERE   user_id='$user_id' AND  session_id='$session_id'") or die('query failed');
		if (mysqli_num_rows($payed) > 0) { 

                $message[] = 'You Have already applyed for this Club form';
		}else{ 
			
            mysqli_query($conn, "INSERT INTO `form_pay`(session_id,user_id,pay_number,bkash_number,transiction_number,description) VALUES('$session_id', '$user_id', '$pay_number','$bkash_number','$transiction_number','$description')") or die('query failed');
			$message[] = 'Succesfully applyed for the form ' ;

        } 
	} else {
		$message[] = 'No Application Available ';
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



<section class="h-100">
	<div class="container h-100">
		 <!-- Account page navigation-->
		 <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Form Payment</a>
        
    </nav>
    <hr class="mt-0 mb-4">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7 col-sm-9">

				<div class="card shadow-lg mb-5">
					<div class="card-body px-5 pt-4 pb-3">
						<h1 class="fs-4 card-title fw-bold mb-4 text-center">Form Payment</h1>

						<!-- -----------------------------check form---------------------------------- -->
						<form action="" method="post" class="checkform" name="checkform" autocomplete="on">
 

							<div class="mb-3">
								<label class="mb-2 text-muted"  >Bkash Number(from which money is sent)</label>
								<input id="pay_numberr" type="number" class="form-control" name="bkash_number" value="" required autofocus>
							</div>

							<div class="mb-1">
								<label class="mb-2 text-muted" for="transiction_number">Transaction number</label>
								<input id="transiction_number" type="text" class="form-control" name="transiction_number" required>
							</div>

                            <div class="mb-1">
								<label class="mb-2 text-muted" for="transiction_number"> Phone Number(for contacting)</label>
								<input id="transiction_number" type="text" class="form-control" name="pay_number" required>
							</div>

							<div class="align-items-center d-flex">
								<button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto">
									Submit
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>