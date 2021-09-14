<?php
/*if($_SESSION["loggedIn"]!=true)
{
  header("location:Admin-login.php");
}
else
{*/
	if(isset($_POST["submit"]))
	{

		if(!empty($_POST['usn']))
		{
			$usn=$_POST['usn'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$branch=$_POST['branch'];
			$sem=$_POST['sem'];
			$section=$_POST['section'];
			$date=$_POST['date'];
			$phone=$_POST['phone_no'];
			$email=$_POST['mail'];

			$con=mysqli_connect('localhost','root','') or die(mysql_error());
			mysqli_select_db($con,'online_voting_system') or die("cannot select DB");

			$query=mysqli_query($con,"SELECT * FROM student WHERE USN='".$usn."'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
			{

				$sql="INSERT INTO student VALUES('$usn','$firstname','$lastname','$branch','$sem','$section','$date','$phone','$email')";

				$result=mysqli_query($con,$sql);

				if($result)
				{
				 	$message = "Account Successfully Created";
				 	echo "<script type='text/javascript'>
	 					alert('$message');
	 				</script>";
					header("Location: admin-portal.php");
				}
				else
				{
					$message = "Failure!!!!";
					echo "<script type='text/javascript'>
				 		alert('$message');
			 	</script>";
				}

	  	}
	  	else
	  	{
				$message = "That username already exists! Please try again with another.";
				echo "<script type='text/javascript'>
			 		alert('$message');
		 		</script>";
	  	}

  	}
  	else
  	{
	  	echo "All fields are required!";
  	}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="Add-student.css"></link>
  </head>
  <body>
		<div class="menu">
			<ul>
				<li><a class="active" href="admin-portal.php">Back</a></li>
			</ul>
		</div>
    <div class="student-form">
      <h2>Student Registration</h2>
      <form action="" method="post">
        <input type="text" placeholder="USN" name="usn" value="" maxlength="10" required><br><br>
        <input type="text" placeholder="Firstname" name="firstname" value="" required><br><br>
        <input type="text" placeholder="Lastname" name="lastname" value="" required><br><br>
        <label>Branch:</label><br>
        <label><input type="radio" name="branch" value="CSE"> Computer Science</label><br>
        <label><input type="radio" name="branch" value="ECE"> Electronics and Communication</label><br>
        <label><input type="radio" name="branch" value="ME"> Mechanical</label><br>
        <label><input type="radio" name="branch" value="CE"> Civil</label><br><br>
				<label>Semester: </label><br>
				<label><input type="radio" name="sem" value="1"> 1</label>
				<label><input type="radio" name="sem" value="3"> 3</label>
				<label><input type="radio" name="sem" value="5"> 5</label>
				<label><input type="radio" name="sem" value="7"> 7</label><br><br>
				<label>Section: </label><br>
        <label><input type="radio" name="section" value="A"> A</label><br>
        <label><input type="radio" name="section" value="B"> B</label><br><br>
        <label >Date of Birth</label><br>
        <input type="date" name="date" value=""><br><br>
        +91    <input type="text" placeholder="Mobile no" name="phone_no" value="" pattern="[0-9]{10}" maxlength="10" required><br><br>
        <input type="email" placeholder="Email" name="mail" value="" required><br><br>
        <button type="submit" name="submit" value="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
<!--<?php
#}
?>-->
