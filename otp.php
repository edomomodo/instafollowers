<?php
require_once('includes/app.php');

if (!$auth->is_email_in()) { header('Location: index.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){
	require_once('classes/user.php');
	
    if (!isset($_POST['otp'])) $error[] = "Please fill out all fields";
    if (empty($_POST['otp'])) $error[] = "Please fill out all fields";

	if($auth->is_current_otp($_POST['otp'])){
		$email = $auth->get_email();
		require_once('includes/database.php');
		if(!isset($db)){
			$db = getDB();
		}
		$user = new User($db);
		$user->setActiveEmail($email);

		header('Location: orders.php?email=' . $email);
		exit;

	} else {
		$error[] = 'Wrong OTP.';
	}
	

}else{

	if (!$auth->is_otp_on()){
		
		$min_otp=111111;
		$max_otp=999999;
		$otp=rand($min_otp, $max_otp);
		$auth->set_opt($otp);

		require_once('includes/mail.php');

		//prepare email
		$to = $auth->get_email();
		$subject = "OTP";
		$body = "<p>Please use this number to OTP verification.</p><p>OTP: $otp</p>";

		//send email
		$mail = new Mail();
		$mail->init($to, $subject, $body);
		$mail->send();
	} 	
	
}

//define page title
$title = 'Otp';

//include header template
require_once('layout/header.php');
?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>OTP</h2>
				<p>Please check your email for otp (in inbox or in spam folder)</p>
				<hr>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				?>

				<div class="form-group">
					<input type="number" name="otp" min="111111" max="999999" class="form-control input-lg" placeholder="OTP number" tabindex="1" required>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>

			<br>
				<hr>
				<div class="row">
					<a href="reotp.php" class="btn btn-default">Re-send new OTP</a>
				</div>
		</div>
	</div>
</div>

<?php
require_once('layout/footer.php');
?>
