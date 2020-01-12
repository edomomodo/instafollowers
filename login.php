<?php
require_once('includes/app.php');
if( $auth->is_logged_in() ){ header('Location: home.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){
    require_once('classes/user.php');
    require_once('includes/database.php');
    if(!isset($db)){$db = getDB();}
    $user = new User($db);

    if (!isset($_POST['email'])) $error[] = "Please fill out all fields";
    if (empty($_POST['email'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

    $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}
		$password = $_POST['password'];
		if($user->loginEmail($email,$password)){
			header('Location: home.php');
			exit;

		} else {
			$error[] = 'Wrong email or password or your account has not been activated.';
		}
	}else{
		$error[] = 'Email are required';
	}

}//end if submit

//define page title
$title = 'Login';

//include header template
require_once('layout/header.php');
?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Login</h2>
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
							echo "<h5 class='bg-success'>Your account is now active you may now log in.</h5>";
							break;
						case 'reset':
							echo "<h5 class='bg-success'>Please check your inbox for a reset link.</h5>";
							break;
						case 'resetAccount':
							echo "<h5 class='bg-success'>Password changed, you may now login.</h5>";
							break;
					}

				}

				?>

				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email"
                           value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="1" required>
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
				<div class="row p-0 m-0">
					<div class="col-12 text-right p-0 m-0">
						 <a href='reset.php'><small>Forgot your Password?</small></a>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
				<div class="row">
					<div class="col-12">
					<?php 
					if(!IS_PRODUCTION){
						echo "<br><br>";
						echo "Email: edo.momodo@gmail.com";
						echo "<br>";
						echo "Password: test123";
						echo "<br>";
						echo "<hr>";
						echo "<small>";
						echo "EN: please check if demo_data.sql has been imported into your mysql and you have changed includes/config.php.<br>";
						echo "</small>";
					}
					?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
require_once('layout/footer.php');
?>
