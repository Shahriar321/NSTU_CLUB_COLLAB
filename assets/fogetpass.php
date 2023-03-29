<?php

include 'config.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email,$v_code){
      require ("phpMailer/Exception.php");
      require ("phpMailer/PHPMailer.php");
      require ("phpMailer/SMTP.php");

      $mail= new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;  		//Enable SMTP authentication
        $mail->Username   = 'andrewsmith105086@gmail.com';                     //SMTP username
        $mail->Password   = 'tppmkafgklfvdenp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
		);
        //Recipients
        $mail->setFrom('andrewsmith105086@gmail.com', 'NSTU CLUB COLLAB');
        $mail->addAddress($email);     //Add a recipient
	
		
		$mail->From = 'andrewsmith105086@gmail.com';
        $mail->Sender = $email;
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for registration!<br>
        Verify your email my entering this code $v_code
        ";
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }

  }


  function insertToDatabae($conn,$email,$password){

	$v_code=bin2hex(random_bytes(4));
	 
    $user_query= "UPDATE `users` SET v_code = '$v_code' WHERE email = '$email'"; 
    $result2=(mysqli_query($conn,$user_query) && sendMail($email,$v_code));
 
  if($result2){
    session_start();
    $_SESSION['user_name'] =$password; 
    echo
    "
    <script>
    document.location.href = '../assets/validforgetpass.php';
    </script>
    ";

  }
  else{
	echo "<script>
	alert('Not Successfully Registered or Check your internet connection');
	 
	</script>";
  }

  }
  
 ?>
 <?php

 
if(isset($_POST['submit'])){
	 
  $checkpass=$_POST['password'];
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$password_confirm= mysqli_real_escape_string($conn, md5($_POST['password_confirm'])); 
    $email = mysqli_real_escape_string($conn, $_POST['email']);


	if ($password==$password_confirm) { 
    $number = preg_match('@[0-9]@',  $checkpass);
    $uppercase = preg_match('@[A-Z]@', $checkpass);
    $lowercase = preg_match('@[a-z]@', $checkpass);
    $specialChars = preg_match('@[^\w]@', $checkpass);


        if (!preg_match("/^[a-zA-Z0-9+_.-]+@*[a-zA-Z.]+.nstu.edu.bd+$/i", $email)) {

            $message[] = "Must enter Education mail of the university";
        } 
        else if(strlen($checkpass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){ 
          $message[] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      
        }else{ 
           insertToDatabae($conn,$email,$password);
            //mysqli_query($conn, "UPDATE `users` SET password='$password_confirm' WHERE user_id='$user_id'") or die('query failed');
       

        }
       

   }else{
	  $message[] = 'Do not match';
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
<!DOCTYPE html>
<html lang="en">
<head> 

    <!-- ------------------------------------------all link and css-------------------------------------------- -->
    <?php include '../assets//linkheader.php';?>   
    
    <title>user Structure</title>
</head>
<body> 
<section class="h-100">
		<div class="container h-100">
		<nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Change Password</a>
        
    </nav>
    <hr class="mt-0 mb-4">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
 
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Change Password</h1>
							<form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
									<label class="mb-2 text-muted" for="email">Nstu email Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" autocomplete="on" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
                            <div class="mb-3">
									<label class="mb-2 text-muted" for="password">New Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
									<div class="invalid-feedback">
										Password is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
								    <div class="invalid-feedback">
										Please confirm your new password
							    	</div>
								</div>

								<div class="d-flex align-items-center">
								 
									<button type="submit" name="submit" class="btn btn-primary ms-auto">
										Reset Password	
									</button>
								</div>
							</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</section>

 
 
</body>
</html>