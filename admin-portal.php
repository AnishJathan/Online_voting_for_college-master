<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
  header("location:Admin-login.php");
}
else
{
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $query_student = "SELECT * FROM student ";
  $result_student = mysqli_query($con,$query_student);

  $query_candidate = "SELECT c.CID,c.USN,s.Firstname,s.Lastname,c.Position,s.Branch,s.Sem,s.Section
  FROM Candidate c,student s
  WHERE s.USN=c.USN";
  $result_candidate = mysqli_query($con,$query_candidate);

  if(isset($_POST["search"]))
  {
    if(!empty($_POST['search_usn']))
    {

      $_SESSION['usn'] = $_POST['search_usn'];
      header("Location: student-candidate-search.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="admin-portal.css"></link>

  </head>
  <body>
    <div class="menu">
      <ul>
        <li><a href="voting-results.php">Results</a></li>
        <li><a href="Add-student.php">Add student</a></li>
        <li><a href="Remove-student-portal.php">Remove student</a></li>
        <li><a href="add-candidate.php">Add candidate</a></li>
        <li><a href="remove-candidate-portal.php">Remove candidate</a></li>
        <li><a class="active" href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="search" style="width: 40%;padding-top: 10px;">
      <center>
      <form class="" action="" method="post" style="width: 100%; height:38px;" >
        <input type="text" name="search_usn" placeholder="Search USN" maxlength="10"
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
        border: none;
        outline: none;
        font-size: 18px;
        cursor: pointer;">Search</button>
      </form></center>
    </div><br><br><br>
    <div class="student-details">
      <label>Students: </label><br><br><br>
      <table style="width: 100%">
        <tr>
          <th>USN</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Section</th>
          <th>Date of birth</th>
          <th>Mobile No</th>
          <th>Email</th>
        </tr>
        <?php
       while($row_student = mysqli_fetch_assoc($result_student))
       {  ?>
            <tr>
              <td style="text-transform: uppercase;"><center><?php echo $row_student['USN'] ?></center></td>
              <td><center><?php echo $row_student['Firstname'] ?> <?php echo $row_student['Lastname'] ?></center></td>
              <td style="text-transform: uppercase;"><center><?php echo $row_student['Branch'] ?></center></td>
              <td style="text-transform: uppercase;"><center><?php echo $row_student['Sem']?><?php echo $row_student['Section'] ?></center></td>
              <td><center><?php echo $row_student['DOB'] ?></center></td>
              <td><center><?php echo $row_student['Phone_No'] ?></center></td>
              <td><center><?php echo $row_student['Email'] ?></center></td>
            </tr>
        <?php
          }
        ?>
      </table>
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
          <!--<th>Votes</th>-->
        </tr>
        <?php
       while($row_candidate = mysqli_fetch_assoc($result_candidate))
       {  ?>
            <tr>
              <td><center><?php echo $row_candidate['CID'] ?></center></td>
              <td style="text-transform: uppercase;"><center><?php echo $row_candidate['USN'] ?></center></td>
              <td><center><?php echo $row_candidate['Firstname'] ?> <?php echo $row_candidate['Lastname'] ?></center></td>
              <td style="text-transform: uppercase;"><center><?php echo $row_candidate['Branch'] ?>&emsp;<?php echo $row_candidate['Sem']?><?php echo $row_candidate['Section']?></center></td>
              <td><center><?php echo $row_candidate['Position'] ?></center></td>
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
