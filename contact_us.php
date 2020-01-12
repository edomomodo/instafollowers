<?php require_once('includes/app.php');

//if form has been submitted process it
if(isset($_POST['submit'])){
    require_once('classes/user.php');
    require_once('includes/mail.php');

    if (!isset($_POST['content'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['email'])) $error[] = "Please fill out all fields";
	if (empty($_POST['email'])) $error[] = "Please fill out all fields";
	if (empty($_POST['content'])) $error[] = "Please fill out all fields";

	$content = $_POST['content'];

	//email validation
	$email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} 


	//if no errors have been created carry on
	if(!isset($error)){

		try {

			//prepare email
			$to = MAIL_CONTACT_US;
			$subject = "Contact Us";
			$body = "<p>email: ". $email ."</p><p>content: " . $content ."</p>";

			//send email
           $mail = new Mail();
           $mail->init($to, $subject, $body);
		   $mail->send();
		   
			//redirect to index page
			header('Location: index.php?action=contact');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Demo';

//include header template
require_once('layout/header.php');
?>


<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Contact Us</h2>

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
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<textarea cols="50" rows="10" name="content" id="content" class="form-control input-lg" placeholder="Content"  tabindex="2"></textarea> 
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Send" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>

</div>

<?php
require_once('layout/footer.php');
?>
