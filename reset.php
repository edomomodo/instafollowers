<?php require_once('includes/app.php');

//if logged in redirect to members page
if( $auth->is_logged_in() ){ header('Location: home.php'); exit(); }


//if form has been submitted process it
if(isset($_POST['submit'])){
    require_once('classes/user.php');
    require_once('includes/mail.php');
    require_once('includes/database.php');
    if(!isset($db)){
        $db = getDB();
    }
    $user = new User($db);

	//Make sure all POSTS are declared
	if (!isset($_POST['email'])) $error[] = "Please fill out all fields";

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['email'])){
			$error[] = 'Email provided is not recognised.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//create the activation code
		$stmt = $db->prepare('SELECT password, email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$token = hash_hmac('SHA256', $user->generate_entropy(8), $row['password']);//Hash and Key the random data
        $storedToken = hash('SHA256', ($token));//Hash the key stored in the database, the normal value is sent to the user

		try {

			$stmt = $db->prepare("UPDATE members SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $storedToken
			));

			//send email
			$to = $row['email'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".BASE_URL."resetPassword.php?key=$token'>".BASE_URL."resetPassword.php?key=$token</a></p>";
			
			$mail = new Mail();
            $mail->init($to, $subject, $body);
            $mail->send();

			//redirect to index page
			header('Location: login.php?action=reset');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Reset Account';

//include header template
require_once('layout/header.php');
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Reset Password</h2>

				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
				}
				?>

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Sent Reset Link" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>
	</div>


</div>

<?php
//include header template
require_once('layout/footer.php');
?>
