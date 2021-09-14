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
			$post=$_POST['position'];

			$con=mysqli_connect('localhost','root','') or die(mysql_error());
			mysqli_select_db($con,'online_voting_system') or die("cannot select DB");

			$query=mysqli_query($con,"SELECT * FROM student WHERE USN='".$usn."'");
			$result_query=mysqli_fetch_assoc($query);
			$numrows=mysqli_num_rows($query);
			if($numrows!=0)
			{
				if($post=="President")
				{
					if($result_query['Sem']==7)
					{
						$sql="INSERT INTO candidate(USN,Position) VALUES('$usn','President')";

						$result=mysqli_query($con,$sql);

						$message = "Candidate added Successfully...";
					 	echo "<script type='text/javascript'>
		 					alert('$message');
							window.location='admin-portal.php';
		 				</script>";
					}
					else
					{
						$message = "Candidate not eligible for President..!!!";
					 	echo "<script type='text/javascript'>
		 					alert('$message');
		 				</script>";
					}
				}
				else
				{
						$sql="INSERT INTO candidate(USN,Position) VALUES('$usn','CR')";

						$result=mysqli_query($con,$sql);

						if($result)
						{
							$message = "Candidate added Successfully";
							echo "<script type='text/javascript'>
							alert('$message');
							</script>";
							header("Location: admin-portal.php");
						}
						else
						{
							$message = "Candidate already exists....!!!";
							echo "<script type='text/javascript'>
				 			alert('$message');
			 			</script>";
					}
				}

	  	}
	  	else
	  	{
				$message = "Provided USN is not a student.";
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
    <title>candidate Registration</title>
    <link rel="stylesheet" href="Add-candidate.css"></link>
  </head>
  <body>
		<div class="menu" style="width: 20%;
  padding-top: 25px;">
			<ul style="list-style-type: none;
    margin: 0;
    overflow: hidden;">
				<li style="float: left;"><a class="active" href="admin-portal.php" style="display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    border-radius: 25px;
    font-size: 18px;
    width: 60px;
    background: #4CAF50;">Back</a></li>
			</ul>
		</div>
    <div class="candidate-form" style="width: 400px;
  height: 300px;
  background: rgb(0,0,0,.7);
  opacity: 50%;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  border-radius: 9px;
  padding: 5px 30px;
  box-shadow: 20px 20px 60px black;">
        <center><h2>candidate Registration</h2></center><br><br>
      <form action="" method="post">
        <input type="text" placeholder="USN" name="usn" value="" maxlength="10" required style="width: 45%;
  background: transparent;
  margin: none;
  outline: none;
  border: none;
  border-bottom: 1px solid #4CAF50;
  color: #fff;
  padding-bottom: 7px;"><br><br>
        <label><input type="radio" name="position" value="President"> President</input></label><br>
        <label><input type="radio" name="position" value="CR"> Class Representative</input></label><br><br>
        <center><button type="submit" name="submit" value="submit" style="background-color: #4CAF50;
  border-radius: 20px;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  outline: none;
  font-size: 18px;
  cursor: pointer;
  width: 60%;
            margin-top: 20px;">Submit</button></center>
      </form>
    </div>
  </body>
</html>
