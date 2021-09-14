<?php
if(isset($_POST["submit"]))
{

	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$con = mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($con,'online_voting_system') or die("cannot select DB");

		$result_student_login=mysqli_query($con,"SELECT CID,LOWER(username),LOWER(password)
		FROM candidate_login
		WHERE username='".$username."' AND password='".$password."'");
		$numrows = mysqli_num_rows($result_student_login);
		if($numrows != 0)
		{
			while($row = mysqli_fetch_assoc($result_student_login))
			{
				$dbusername = $row['LOWER(username)'];
				$dbpassword = $row['LOWER(password)'];
			}

			if($username == $dbusername && $password == $dbpassword)
			{
				session_start();
				$_SESSION['sess_user']=$username;

				/* Redirect browser */
				header("Location: candidate-portal.php");
			}
		}
		else
		{
			$message = "Invalid username or password";
			echo "<script type='text/javascript'>
				alert('$message');
			</script>";
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="login.css"></link>
  <script src="login.js"></script>
  <title>Login Form</title>

</head>
<body>

  <div class="login-box">
    <h3>Candidate Login</h3>

    <form class="" name="" method="POST">
      <input type="text" placeholder="username" name="username" value="" required>
      <input type="password" placeholder="password" name="password" value="" id="input" required>
      <br>
      <input type="checkbox" onclick="myFunction()"><label> Show password </label><br><br>
      <button type="submit" name="submit" value="Login">Login</button>
    </form>

  </div>
</body>
</html>
