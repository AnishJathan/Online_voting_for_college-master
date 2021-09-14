<?php
/*if($_SESSION["loggedIn"]==true)
{*/
  session_start();
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $query_student = "SELECT c.CID,c.USN,s.Firstname,s.Lastname,s.Branch,s.Sem,s.Section,c.Position FROM candidate c,student s WHERE s.USN=c.USN ";
  $result_student = mysqli_query($con,$query_student);

  if(isset($_POST["search"]))
  {
    if(!empty($_POST['searchUSN']))
    {
      $_SESSION['searchCandidateUSN']=$_POST['searchUSN'];
      header("Location: remove-candidate.php");
    }
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>student page</title>
    <link rel="stylesheet" href="remove-student-portal.css"></link>
  </head>
  <body>

    <div class="search" style="width: 40%;height: 38px;padding-top: 25px;float:right;">
      <center>
      <form class="" action="" method="post" style="width: 100%; height:38px;" >
        <input type="text" name="searchUSN" placeholder="Enter USN" maxlength="10"
        style="height: 37px;
        outline: none;
        border: none;
        margin: none;
        background: white;
        border-radius: 15px;
        font-size: 14px;
        line-height: 40px;
        color: #2f3640;
        padding-left: 10px;
        ">
        <button type="submit" name="search" value="Search"
        style="background-color: #4CAF50;
        border-radius: 20px;
        color: white;
        padding: 7px 20px;
        height: 42px;
        border: none;
        outline: none;
        font-size: 16px;
        cursor: pointer;">Delete</button>
      </form></center>
    </div>
    <div class="menu-bar" style="width: 20%;padding-top: 25px;">
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
				background-color: #4CAF50;">Back</a></li>
			</ul>
		</div><br><br><br>
    <div class="remove-student-data">
      <label>Students: </label><br><br><br>
      <table style="width: 100%">
        <tr>
          <th>Candidate ID</th>
          <th>USN</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Position</th>
        </tr>
        <?php
       while($row_student = mysqli_fetch_assoc($result_student))
       {  ?>
         <tr>
           <td><center><?php echo $row_student['CID'] ?></center></td>
           <td style="text-transform: uppercase;"><center><?php echo $row_student['USN'] ?></center></td>
           <td><center><?php echo $row_student['Firstname'] ?> <?php echo $row_student['Lastname'] ?></center></td>
           <td style="text-transform: uppercase;"><center><?php echo $row_student['Branch'] ?> &emsp; <?php echo $row_student['Sem'] ?><?php echo $row_student['Section'] ?></center></td>
           <td><center><?php echo $row_student['Position'] ?></center></td>
         </tr>
        <?php
          }
        ?>
      </table>
    </div>

  </body>
</html>
<?php
/*}
else
{
  header("Location: admin-login.php");
}*/
?>
