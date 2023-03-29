
<?php

include 'config.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email,$club_name){
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
        $mail->Body    = " The registration process for your club.$club_name. has been finished. You will shortly receive information about additional steps."
        ;
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }

  }
  ?>
<?php

include 'config.php';

if (isset($_POST['submit'])) {

	$club_name = mysqli_real_escape_string($conn, $_POST['club_name']);
	$email = mysqli_real_escape_string($conn, $_POST['admin_email']);
	$totall_members = $_POST['totall_members'];
	$club_description = mysqli_real_escape_string($conn, $_POST['club_description']);
	$club_type = $_POST['club_type'];
	$club_image = "dhrupod.jpg";
	$member_type = "admin";

	if (!preg_match("/^[a-zA-Z0-9+_.-]+@*[a-zA-Z.]+.nstu.edu.bd+$/i", $email)) {

		$message[] = "Must enter Education mail of the university";
	} else {
		$admin = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

		if (!mysqli_num_rows($admin) > 0) {

			echo '<script>alert("Admin must have an account")</script>';
			$message[] = "Admin must have an account";
		} else {
			$select_club = mysqli_query($conn, "SELECT * FROM `clubs` WHERE  club_name = '$club_name'") or die('query failed');

			if (!mysqli_num_rows($select_club) > 0) {
				mysqli_query($conn, "INSERT INTO `clubs`(club_name,totall_members,club_type,club_description,club_image) VALUES('$club_name', '$totall_members', '$club_type','$club_description','$club_image')") or die('query failed');
				$user = mysqli_query($conn, "SELECT user_id FROM `users` WHERE email = '$email'") or die('query failed');

				while ($row = mysqli_fetch_assoc($user)) {
					$user_id = $row["user_id"];
				}

				$club = mysqli_query($conn, "SELECT club_id FROM `clubs` WHERE  club_name = '$club_name'") or die('query failed');

				while ($row = mysqli_fetch_assoc($club)) {
					$club_id = $row["club_id"];
				}

				mysqli_query($conn, "INSERT INTO `club_members`(user_id,club_id,member_type) VALUES('$user_id','$club_id','$member_type')") or die('query failed');
				$result= sendMail($email,$club_name);
				if($result){ 
					header('location:login.php');
				}else{
					$message[] = "Internet connection or other problem!";
					
				} 
			} else {

				$message[] = "This club name already exits!";
			}
		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	 <?php include "linkheader.php";
 ?>

	<style>
		.batch {
			display: none;
		}
		.joinedimg {
    width: 30px;
    max-width: 100%;
    margin: auto;
    vertical-align: middle;}
	</style>
</head>

<body>
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
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7 col-sm-9">
					<div class="text-center my-3">
						<img src="../images//club.png" alt="logo" width="80">
						<h1 class="fs-4 card-title fw-bold mb-4">NSTU Club Collab</h1>
					</div>
					<div class="card shadow-lg mb-1">
						<div class="card-body px-5 pt-4 pb-3">
							<h1 class="fs-4 card-title fw-bold mb-3 text-center">Registration of Club</h1>
							<form action="" method="post" class="form" name="form" autocomplete="on">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="club_name">Club Name</label>
									<input id="club_name" type="text" class="form-control" name="club_name" value="" required autofocus>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="admin_email">Admin Email</label>
									<input id="admin_email" type="email" class="form-control" name="admin_email" value="" required>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="totall_members">Total Members</label>
									<input type="number" min="0" name="totall_members" class="box" placeholder="Total members of the club" required style="width:100% ;">
								</div>
								<div class="dept mb-2">
									<label class="mb-2 text-muted" for="club_type">Club Type</label>
									<select name="club_type" class="mb-3" id="type-option">
										<option value="adventure">Adventure</option>
										<option value="cultural">Cultural</option>
										<option value="educational">Educational</option>
										<option value="religious">Religious</option>
										<option value="social">Social</option>
										<option value="sports">Sports</option>
									</select>
								</div>
								<label class="mb-2 text-muted" for="club_description">Club Description</label>
								<div class="form-outline">
									<textarea class="form-control" id="club_description" name="club_description" rows="4"></textarea>
								</div>
								<div class="d-flex align-items-center">
								<a class="" href="../club/home.php" id="profilebutton">
									<img src="../images/home.jpg" class="joinedimg" alt="logo" /> </a> 
									</a>
									<button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto">
										Register
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center my-3 text-muted">
						Copyright &copy; 2022-2023 &mdash; Team Triangle
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>