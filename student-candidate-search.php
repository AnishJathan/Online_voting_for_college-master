<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: admin-portal.php");
}
else {
	$con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');
	$usn=$_SESSION['usn'];

 	$search_query = mysqli_query($con,"SELECT * FROM student WHERE USN='".$usn."'");
	$numrows = mysqli_num_rows($search_query);
	if($numrows == 0)
	{
		header("Location: admin-portal.php");
	}
	else {
	$search_row = mysqli_fetch_assoc($search_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Successful</title>
    <link rel="stylesheet" href="student-candidate-search.css"></link>

  </head>
  <body>

		<div class="menu">
			<ul>
				<li><a class="active" href="admin-portal.php">Back</a></li>
			</ul>
		</div>

    <div class="search-portal">
			<center><h1>Student details</h1></center>
    	<br><label>USN: </label>&emsp;<label style="text-transform: uppercase;"><?php echo $search_row['USN']   ?></label><br><br><br>
			<label>Name: </label>&emsp;<label> <?php echo $search_row['Firstname']?> <?php echo $search_row['Lastname']?> </label><br><br><br>
			<label>Banch: </label>&emsp;<label style="text-transform: uppercase;"><?php echo $search_row['Branch']?>&emsp;<?php echo $search_row['Section']?></label><br><br><br>
			<label>Date of Birth: </label>&emsp;<label><?php echo $search_row['DOB']?></label><br><br><br>
			<label>Mobile No: </label>&emsp;<label><?php echo $search_row['Phone_No']?></label><br><br><br>
			<label>Email: </label>&emsp;<label><?php echo $search_row['Email']?></label>
    </div>

  </body>
</html>
<?php
 }
}
?>
