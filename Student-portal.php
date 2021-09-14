<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
  header("location:Student-login.php");
}
else
{
?>
<?php
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $username = $_SESSION['sess_user'];
  $result_student_login = mysqli_query($con,"SELECT USN FROM student_login WHERE username='".$username."' ");
  $row = mysqli_fetch_assoc($result_student_login);

  $query_student = "SELECT Firstname,Lastname,USN,Sem,Branch,Section,Email FROM Student WHERE USN='".$row['USN']."' ";
  $result_student = mysqli_query($con,$query_student);
  $rows = mysqli_fetch_assoc($result_student);

  $query_candidate_CR = "SELECT c.CID,c.USN,s.Firstname,s.Lastname,s.Branch,s.Sem,s.Section,c.Position
  FROM candidate c,student s
  WHERE s.USN=c.USN AND s.Sem='".$rows['Sem']."' AND s.Branch='".$rows['Branch']."' AND s.Section='".$rows['Section']."' AND c.Position='CR' ";
  $result_candidate_CR = mysqli_query($con,$query_candidate_CR);

  $query_candidate_P = "SELECT c.CID,c.USN,s.Firstname,s.Lastname,s.Branch,s.Sem,s.Section,c.Position
  FROM candidate c,student s
  WHERE s.USN=c.USN AND c.Position='President' ";
  $result_candidate_P = mysqli_query($con,$query_candidate_P);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Student-portal.css"></link>
    <title>Student Portal</title>
  </head>
  <body>
    <div class="logout" style="float: right;
    width: 30%;
    padding-top: 35px;">
      <ul>
        <li><a href="winner-details-student.php">Results</a></li>
        <li><a href="vote.php" style="width: 80px;">Vote</a></li>
        <li><a class="active" href="logout.php" style="width: 80px;">Logout</a></li>
      </ul>
    </div>
    <div class="student-details">
      <label>Name: </label>&emsp;<label><?php echo $rows['Firstname']?> <?php echo $rows['Lastname'] ?></label><br><br>
      <label>USN:</label>&emsp;<label style="text-transform: uppercase;"><?php echo $rows['USN'] ?> </label><br><br>
      <label>Branch:</label>&emsp;<label style="text-transform: uppercase;"><?php echo $rows['Branch'] ?> </label><br><br>
      <label>Section:</label>&emsp;<label style="text-transform: uppercase;"><?php echo $rows['Sem']?><?php echo $rows['Section'] ?> </label><br><br>
      <label>Email:</label>&emsp;<label><?php echo $rows['Email'] ?> </label><br><br>
    </div>
    <div class="candidate-details">
      <label>Candidates: </label><br><br><br>
      <table style="width: 100%">
        <tr>
          <th>CID</th>
          <th>USN</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Post</th>
        </tr>
        <?php
        while($row_candidate_CR = mysqli_fetch_assoc($result_candidate_CR))
        {
        ?>
        <tr>
          <td><center><?php echo $row_candidate_CR['CID'] ?></center></td>
          <td style="text-transform: uppercase;"><center><?php echo $row_candidate_CR['USN'] ?></center></td>
          <td><center><?php echo $row_candidate_CR['Firstname'] ?> <?php echo $row_candidate_CR['Lastname'] ?></center></td>
          <td><center style="text-transform: uppercase;"><?php echo $row_candidate_CR['Branch'] ?> &emsp; <?php echo $row_candidate_CR['Sem'] ?><?php echo $row_candidate_CR['Section'] ?></center></td>
          <td><center><?php echo $row_candidate_CR['Position'] ?></center></td>
        </tr>
        <?php
        }
       ?>
        <?php
       while($row_candidate_P = mysqli_fetch_assoc($result_candidate_P))
       {  ?>
            <tr>
              <td><center><?php echo $row_candidate_P['CID'] ?></center></td>
              <td style="text-transform: uppercase;"><center><?php echo $row_candidate_P['USN'] ?></center></td>
              <td><center><?php echo $row_candidate_P['Firstname'] ?> <?php echo $row_candidate_P['Lastname'] ?></center></td>
              <td><center style="text-transform: uppercase;"><?php echo $row_candidate_P['Branch'] ?> &emsp; <?php echo $row_candidate_P['Sem'] ?><?php echo $row_candidate_P['Section'] ?></center></td>
              <td><center><?php echo $row_candidate_P['Position'] ?></center></td>
            </tr>
       <?php
       }
      ?>
      </table>
    </div>

  </body>
</html>
<?php
}
?>
