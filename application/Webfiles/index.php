<?php 
	session_start();

	function passwordCheck($pass) {
		$myfile = "10-million-password-list-top-1000.txt";
		$myFileLink = fopen($myFile, 'r');

		$myFileContents = file_get_contents($myFileLink);
		if( preg_match_all('/('.preg_quote($search,'/').')/i', $myFileContents, $matches)){
			if(!empty($matches))
			{
				exit;
			}
			else
			{
				return;
			}
		}
	}
	

	

	
	if(isset($_POST['submit']))
	{
		if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
		{
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			
			if (strlen($password > 9))
			{
				passwordCheck($password);
				$errorMsg = "Login failed";
				exit;
				if($email == "user@example.com")
					{	
						if($password == "password1234")
						{
							$_SESSION['user_id'] = $email;
							
							header('location:dashboard.php');
							exit;
							
						}
					}

				
				
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page | PHP Login and logout example with session</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<div class="container">
		<h1>PHP Login and Logout with Session</h1>
		<?php 
			if(isset($errorMsg))
			{
				echo "<div class='error-msg'>";
				echo $errorMsg;
				echo "</div>";
				unset($errorMsg);
			}
			
			if(isset($_GET['logout']))
			{
				echo "<div class='success-msg'>";
				echo "You have successfully logout";
				echo "</div>";
			}
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<div class="field-container">
				<label>Email</label>
				<input type="email" name="email" required placeholder="Enter Your Email">
			</div>
			<div class="field-container">
				<label>Password</label>
				<input id= "password" type="password" name="password" required placeholder="Enter Your Password">
			</div>
			<div class="field-container">
				<button type="submit" name="submit">Submit</button>
			</div>
			
		</form>
	</div>
</body>
</html>