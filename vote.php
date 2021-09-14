<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
  header("Location: student-login.php");
}
else
{
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $username = $_SESSION['sess_user'];
  $result_student_login = mysqli_query($con,"SELECT USN
  FROM student_login
  WHERE username='".$username."' ");
  $row = mysqli_fetch_assoc($result_student_login);

  $query_student = "SELECT Branch,Section,Sem
  FROM Student
  WHERE USN='".$row['USN']."' ";
  $result_student = mysqli_query($con,$query_student);
  $rows = mysqli_fetch_assoc($result_student);

  $query_candidate = "SELECT c.CID,c.USN,s.Firstname,s.Lastname,s.Branch,s.Sem,s.Section,c.Position
  FROM candidate c,student s
  WHERE s.USN=c.USN AND s.Branch='".$rows['Branch']."' AND s.Section='".$rows['Section']."' AND s.Sem='".$rows['Sem']."' AND c.Position='CR' ";
  $result_candidate = mysqli_query($con,$query_candidate);

  $result_president_vote = mysqli_query($con,"SELECT c.CID,s.USN,s.Firstname,s.Lastname,c.Position
  FROM candidate c,student s
  WHERE s.USN=c.USN AND c.Position='President'");

  if(isset($_POST["vote"]))
  {
    if(!empty($_POST['voteCR']) || !empty($_POST['voteP']))
    {
      $username_vote = $_SESSION['sess_user'];

      $result_student_vote = mysqli_query($con,"SELECT USN
      FROM student_login
      WHERE username='".$username_vote."' ");
      $row_vote = mysqli_fetch_assoc($result_student_vote);

      $usn_Vote=$row_vote['USN'];
      $cid_vote_CR=$_POST['voteCR'];
      $cid_vote_P=$_POST['voteP'];

      $query_vote=mysqli_query($con,"SELECT * FROM student_vote WHERE USN='".$usn_Vote."' AND Position='CR' AND Position='President'");
      $numrows_vote=mysqli_num_rows($query_vote);
      if($numrows_vote==0)
      {
        $sql_CR="INSERT INTO student_vote VALUES('$usn_Vote','$cid_vote_CR','CR',NOW())";
        $sql_P="INSERT INTO student_vote VALUES('$usn_Vote','$cid_vote_P','President',NOW())";
        $result_vote_CR=mysqli_query($con,$sql_CR);
        $result_vote_P=mysqli_query($con,$sql_P);
        if($result_vote_CR && $result_vote_P)
        {
          $message = "You have successfully voted...";
				 	echo "<script type='text/javascript'>
	 					alert('$message');
            window.location='student-portal.php';
	 				</script>";
        }
        else
				{
					$message = "you have already voted..";
					echo "<script type='text/javascript'>
				 		alert('$message');
            window.location='student-portal.php';
			 	</script>";
				}
      }
      else
	  	{
				$message = "you can vote only once.";
				echo "<script type='text/javascript'>
			 		alert('$message');
          window.location='student-portal.php';
		 		</script>";
	  	}
    }
    else
  	{
      $message = "please select a candidate..!!";
      echo "<script type='text/javascript'>
        alert('$message');
    </script>";
  	}
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vote For The Best....!!!</title>
    <link rel="stylesheet" href="vote.css"></link>
  </head>
  <body>
    <center><h1>Vote For The Best....</h1></center>
    <div class="voting">
      <form action="" method="post">
        <label style="font-size: 23px;">Class Representative: </label><br><br>
        <?php while($row_candidate_CR = mysqli_fetch_assoc($result_candidate))
        {
        ?>
        <input type="radio" name="voteCR" value="<?php echo $row_candidate_CR['CID'];?>">&emsp;<label>CID:&emsp; <?php echo $row_candidate_CR['CID'];?></input> </label><br>
        <br>&emsp;&emsp;&nbsp;<label style="text-transform: uppercase;">USN:&emsp; <?php echo $row_candidate_CR['USN'];?> </label><br>
        <br>&emsp;&emsp;&nbsp;<label>Name:&emsp; <?php echo $row_candidate_CR['Firstname'];?> <?php echo $row_candidate_CR['Lastname'];?></label><br>
        <br>&emsp;&emsp;&nbsp;<label>Position:&emsp; <?php echo $row_candidate_CR['Position'];?> </label><br><br>
        <?php
        }
        ?><br><br>
        <label style="font-size: 23px;">President: </label><br><br>
        <?php while($result_president = mysqli_fetch_assoc($result_president_vote))
        {
        ?>
        <input type="radio" name="voteP" value="<?php echo $result_president['CID'];?>">&emsp;<label>CID:&emsp; <?php echo $result_president['CID'];?></input> </label><br>
        <br>&emsp;&emsp;&nbsp;<label style="text-transform: uppercase;">USN:&emsp; <?php echo $result_president['USN'];?> </label><br>
        <br>&emsp;&emsp;&nbsp;<label>Name:&emsp; <?php echo $result_president['Firstname'];?> <?php echo $result_president['Lastname'];?></label><br>
        <br>&emsp;&emsp;&nbsp;<label>Position:&emsp; <?php echo $result_president['Position'];?> </label><br><br>
        <?php
        }
        ?><br><br>
        <center><button type="submit" name="vote" value="vote">Vote</button></center>
      </form>
    </div>
  </div>
</html>
