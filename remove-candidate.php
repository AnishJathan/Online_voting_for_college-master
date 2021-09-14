<?php
session_start();
if(!isset($_SESSION["searchCandidateUSN"]))
{
	header("Location: remove-candidate-portal.php");
}
else {
	$con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');
	$usn=$_SESSION['searchCandidateUSN'];

 	$search_query = mysqli_query($con,"SELECT c.CID,c.USN,s.Firstname,s.Lastname,s.Branch,s.Sem,s.Section,c.Position FROM candidate c,student s WHERE s.USN=c.USN AND c.USN='".$usn."'");
	$numrows = mysqli_num_rows($search_query);
	if($numrows == 0)
	{
		header("Location: remove-candidate-portal.php");
	}
	else {
		$search_row = mysqli_fetch_assoc($search_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Remove Student</title>
    <link rel="stylesheet" href="remove.css"></link>
  </head>
  <body>

		<div class="menu-bar"
		style="width: 20%;
	  padding-top: 25px;">
			<ul style="list-style-type: none;
	    margin: 0;
	    overflow: hidden;">
				<li style="float: left;"><a class="active" href="remove-student-portal.php" style="display: block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		    border-radius: 25px;
		    font-size: 18px;
		    width: 60px;
				background-color: #4CAF50;">Back</a></li>
			</ul>
		</div>

    <div class="remove-Student"
    style="width: 400px;
    height: 470px;
    background: rgb(0,0,0,.7);
    opacity: 50%;
    color: white;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    border-radius: 9px;
    padding: 5px 30px;
    box-shadow: 20px 20px 60px black;">
		<form action="" method="post">
      <h1><center>Candidate details</center></h1>
				<br><br><label>CID: </label>&emsp;<label><?php echo $search_row['CID']?></label><br><br><br>
        <label>USN: </label>&emsp;<label style="text-transform: uppercase;"><?php echo $search_row['USN']   ?></label><br><br><br>
				<label>Name: </label>&emsp;<label> <?php echo $search_row['Firstname']?> <?php echo $search_row['Lastname']?> </label><br><br><br>
				<label>Banch: </label>&emsp;<label style="text-transform: uppercase;"><?php echo $search_row['Branch']?>&emsp;<?php echo $search_row['Sem'] ?><?php echo $search_row['Section']?></label><br><br><br>
				<label>Position: </label>&emsp;<label><?php echo $search_row['Position']?></label>
      <center><button type="submit" name="confirm" value="confirm"
        style="background-color: #4CAF50;
        border-radius: 20px;
        color: white;
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        outline: none;
        font-size: 18px;
        cursor: pointer;
        width: 50%;
        margin-top: 40px;">Confirm</button></center>
			</form>
    <div>

  </body>
</html>
<?php
	}
	if(isset($_POST["confirm"]))
	{
		mysqli_query($con,"DELETE FROM candidate WHERE USN='".$usn."'");
		header("Location: remove-candidate-portal.php");
	}
}
?>
