<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
  header("Location:admin-portal.php");
}
else
{
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $vote_result_CR=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,s.Branch,s.Section,s.Sem,sv.Position,count(*) as votes
                                  FROM student_vote sv,student s,candidate c
                                  WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR'
                                  GROUP BY voted_for_CID,c.Position");

  $num_result_CR=mysqli_num_rows($vote_result_CR);
  if($num_result_CR==0)
  {
    $message = "Voting not yet started yet...";
    echo "<script type='text/javascript'>
      alert('$message');
      window.location='admin-portal.php';
    </script>";
  }

  $vote_result_P=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,s.Branch,s.Section,s.Sem,sv.Position,count(*) as votes
                                  FROM student_vote sv,student s,candidate c
                                  WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='President'
                                  GROUP BY voted_for_CID,c.Position");

  if(isset($_POST["voteResult"]))
  {
    header("location: winner-details.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Results!!!!!</title>
    <link rel="stylesheet" href="voting-results.css"></link>
  </head>
  <body>
    <center><h1 style="color:white;font-family: 'Comic Sans MS', Times, serif">Results are out </h1></center>
    <div class="result-table" style="width: 100%;
    padding: 20px 100px;
    box-sizing: border-box;
    color: white;">
      <h2>Class Representative</h2>
      <table style="width: 100%" style="border: 1px solid White;
      border-collapse: collapse;">
        <tr>
          <th>CID</th>
          <th>USN</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Position</th>
          <th>Votes</th>
        </tr>
        <?php
       while($vote_candidate_CR = mysqli_fetch_assoc($vote_result_CR))
       {  ?>
        <tr>
          <td><center><?php echo $vote_candidate_CR['Voted_for_CID'] ?></center></td>
          <td style="text-transform: uppercase;"><center><?php echo $vote_candidate_CR['USN'] ?></center></td>
          <td><center><?php echo $vote_candidate_CR['firstname'] ?> <?php echo $vote_candidate_CR['lastname'] ?></center></td>
          <td style="text-transform: uppercase;"><center><?php echo $vote_candidate_CR['Branch'] ?>&emsp;<?php echo $vote_candidate_CR['Sem'] ?><?php echo $vote_candidate_CR['Section'] ?></center></td>
          <td><center><?php echo $vote_candidate_CR['Position'] ?></center></td>
          <td><center><?php echo $vote_candidate_CR['votes'] ?></center></td>
        </tr>
        <?php
          }
        ?>
      </table>
      <h2>President</h2>
      <table style="width: 100%">
        <tr>
          <th>CID</th>
          <th>USN</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Position</th>
          <th>Votes</th>
        </tr>
        <?php
       while($vote_candidate_P = mysqli_fetch_assoc($vote_result_P))
       {  ?>
        <tr>
          <td><center><?php echo $vote_candidate_P['Voted_for_CID'] ?></center></td>
          <td style="text-transform: uppercase;"><center><?php echo $vote_candidate_P['USN'] ?></center></td>
          <td><center><?php echo $vote_candidate_P['firstname'] ?> <?php echo $vote_candidate_P['lastname'] ?></center></td>
          <td style="text-transform: uppercase;"><center><?php echo $vote_candidate_P['Branch'] ?>&emsp;<?php echo $vote_candidate_P['Sem'] ?><?php echo $vote_candidate_P['Section'] ?></center></td>
          <td><center><?php echo $vote_candidate_P['Position'] ?></center></td>
          <td><center><?php echo $vote_candidate_P['votes'] ?></center></td>
        </tr>
        <?php
      }
        ?>
      </table>
      <form action="" method="post">
        <center><button type="submit" name="voteResult" value="voteResult" style="background-color: #4CAF50;
        border-radius: 20px;
        color: white;
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        outline: none;
        font-size: 18px;
        cursor: pointer;
        width: 20%;
        margin-top: 50px;">Winners</button></center>
      </form>
    </div>
  </body>
</html>
