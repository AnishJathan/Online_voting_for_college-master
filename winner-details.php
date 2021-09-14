<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
  header("Location: admin-portal.php");
}
else
{
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'online_voting_system');

  $result_1A_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=1 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1B_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=1 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2A_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=3 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2B_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=3 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3A_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=5 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3B_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=5 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4A_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=7 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4B_CSE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=7 AND S.Branch='CSE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1A_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=1 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1B_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=1 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2A_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=3 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2B_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=3 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3A_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=5 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3B_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=5 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4A_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=7 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4B_ECE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=7 AND S.Branch='ECE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1A_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=1 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1B_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=1 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2A_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=3 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2B_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=3 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3A_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=5 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3B_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=5 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4A_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=7 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4B_CE=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=7 AND S.Branch='CE'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1A_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=1 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_1B_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=1 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2A_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=3 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_2B_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=3 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3A_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=5 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_3B_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=5 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4A_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='A' AND s.sem=7 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");
  $result_4B_ME=mysqli_query($con,"SELECT sv.Voted_for_CID,c.USN,s.firstname,s.lastname,count(*) as votes
                                FROM student_vote sv,student s,candidate c
                                WHERE sv.Voted_for_CID=c.CID AND c.USN=s.USN AND c.Position='CR' AND s.section='B' AND s.sem=7 AND S.Branch='ME'
                                GROUP BY voted_for_CID,c.Position
                                ORDER BY `votes`  DESC
                                LIMIT 1");

  $winner_1A_CSE = mysqli_fetch_assoc($result_1A_CSE);
  $winner_1B_CSE = mysqli_fetch_assoc($result_1B_CSE);
  $winner_2A_CSE = mysqli_fetch_assoc($result_2A_CSE);
  $winner_2B_CSE = mysqli_fetch_assoc($result_2B_CSE);
  $winner_3A_CSE = mysqli_fetch_assoc($result_3A_CSE);
  $winner_3B_CSE = mysqli_fetch_assoc($result_3B_CSE);
  $winner_4A_CSE = mysqli_fetch_assoc($result_4A_CSE);
  $winner_4B_CSE = mysqli_fetch_assoc($result_4B_CSE);

  $winner_1A_ECE = mysqli_fetch_assoc($result_1A_ECE);
  $winner_1B_ECE = mysqli_fetch_assoc($result_1B_ECE);
  $winner_2A_ECE = mysqli_fetch_assoc($result_2A_ECE);
  $winner_2B_ECE = mysqli_fetch_assoc($result_2B_ECE);
  $winner_3A_ECE = mysqli_fetch_assoc($result_3A_ECE);
  $winner_3B_ECE = mysqli_fetch_assoc($result_3B_ECE);
  $winner_4A_ECE = mysqli_fetch_assoc($result_4A_ECE);
  $winner_4B_ECE = mysqli_fetch_assoc($result_4B_ECE);

  $winner_1A_CE = mysqli_fetch_assoc($result_1A_CE);
  $winner_1B_CE = mysqli_fetch_assoc($result_1B_CE);
  $winner_2A_CE = mysqli_fetch_assoc($result_2A_CE);
  $winner_2B_CE = mysqli_fetch_assoc($result_2B_CE);
  $winner_3A_CE = mysqli_fetch_assoc($result_3A_CE);
  $winner_3B_CE = mysqli_fetch_assoc($result_3B_CE);
  $winner_4A_CE = mysqli_fetch_assoc($result_4A_CE);
  $winner_4B_CE = mysqli_fetch_assoc($result_4B_CE);

  $winner_1A_ME = mysqli_fetch_assoc($result_1A_ME);
  $winner_1B_ME = mysqli_fetch_assoc($result_1B_ME);
  $winner_2A_ME = mysqli_fetch_assoc($result_2A_ME);
  $winner_2B_ME = mysqli_fetch_assoc($result_2B_ME);
  $winner_3A_ME = mysqli_fetch_assoc($result_3A_ME);
  $winner_3B_ME = mysqli_fetch_assoc($result_3B_ME);
  $winner_4A_ME = mysqli_fetch_assoc($result_4A_ME);
  $winner_4B_ME = mysqli_fetch_assoc($result_4B_ME);


  $resultP=mysqli_query($con,"CALL `voteCount`()");
  $winner_president=mysqli_fetch_assoc($resultP);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Congratulations....!!!!</title>
    <link rel="stylesheet" href="voting-results.css"></link>
  </head>
  <body>
    <center><h1>Congratulations for the Winners...</h1></center><br><br>

    <center><h2 style="font-family: 'Comic Sans MS', Times, serif;"><u>President</u></h2></center>
    <center><label style="font-size: 17px;">CID:&emsp; <?php echo $winner_president['Voted_for_CID'] ?></label><br><br>
    <label style="font-size: 17px;">USN:&emsp; <?php echo $winner_president['USN'] ?></label><br><br>
    <label style="font-size: 17px;">Name:&emsp; <?php echo $winner_president['firstname'] ?> <?php echo $winner_president['lastname'] ?></label><br><br>
    <label style="font-size: 17px;">Votes:&emsp; <?php echo $winner_president['votes'] ?></label></center><br><br>

    <center><h2 style="font-family: 'Comic Sans MS', Times, serif;"><u>Class Representatives</u></h2></center>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 1A: </label>  <br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1A_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1A_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1A_CSE['firstname'] ?> <?php echo $winner_1A_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1A_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 1B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1B_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1B_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1B_CSE['firstname'] ?> <?php echo $winner_1B_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1B_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 3A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2A_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2A_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2A_CSE['firstname'] ?> <?php echo $winner_2A_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2A_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 3B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2B_CSE['voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2B_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2B_CSE['firstname'] ?> <?php echo $winner_2B_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2B_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 5A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_CSE['firstname'] ?> <?php echo $winner_3A_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 5B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3B_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3B_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3B_CSE['firstname'] ?> <?php echo $winner_3B_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3B_CSE['votes'] ?> </label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 7A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4A_CSE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4A_CSE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4A_CSE['firstname'] ?> <?php echo $winner_4A_CSE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4A_CSE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CSE 7B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4B_CSE['Voted_for_CID'] ?> </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4B_CSE['USN'] ?> </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4B_CSE['firstname'] ?>  <?php echo $winner_4B_CSE['lastname'] ?> </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4B_CSE['votes'] ?> </label><br><br><br><br>
<br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 1A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1A_ECE['firstname'] ?> <?php echo $winner_1A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 1B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1B_ECE['firstname'] ?> <?php echo $winner_1B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1B_ECE['votes'] ?></label><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 3A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2A_ECE['firstname'] ?> <?php echo $winner_2A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 3B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2A_ECE['firstname'] ?> <?php echo $winner_2A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 5A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_ECE['firstname'] ?> <?php echo $winner_3A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 5B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_ECE['firstname'] ?> <?php echo $winner_3A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_ECE['Votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 7A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_ECE['firstname'] ?> <?php echo $winner_3A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ECE 7B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4B_ECE['firstname'] ?> <?php echo $winner_4B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4B_ECE['votes'] ?></label><br><br><br><br>
<br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 1A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1A_ECE['firstname'] ?> <?php echo $winner_1A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 1B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1B_ECE['firstname'] ?> <?php echo $winner_1B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 3A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2A_ECE['firstname'] ?> <?php echo $winner_2A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 3B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2B_ECE['firstname'] ?> <?php echo $winner_2B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 5A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_ECE['firstname'] ?> <?php echo $winner_3A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 5B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3B_ECE['firstname'] ?> <?php echo $winner_3B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 7A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4A_ECE['firstname'] ?>  <?php echo $winner_4A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">CIV 7B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4B_ECE['firstname'] ?> <?php echo $winner_4B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4B_ECE['votes'] ?></label><br><br><br><br>
<br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 1A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name:  &emsp;<?php echo $winner_1A_ECE['firstname'] ?> <?php echo $winner_1A_ECE['lastname'] ?> </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 1B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_1B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_1B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_1B_ECE['firstname'] ?> <?php echo $winner_1B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_1B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 3A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2A_ECE['firstname'] ?> <?php echo $winner_2A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 3B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_2B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_2B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_2B_ECE['firstname'] ?> <?php echo $winner_2B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_2B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 5A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3A_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3A_ECE['firstname'] ?> <?php echo $winner_3A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 5B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_3B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_3B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_3B_ECE['firstname'] ?> <?php echo $winner_3B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_3B_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 7A: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4A_ECE['Voted_for_CID'] ?> </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4A_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4A_ECE['firstname'] ?> <?php echo $winner_4A_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4A_ECE['votes'] ?></label><br><br><br><br>
    &emsp;&emsp;&emsp;<label style="font-size: 18px;">ME 7B: </label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>CID: &emsp;<?php echo $winner_4B_ECE['Voted_for_CID'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>USN: &emsp;<?php echo $winner_4B_ECE['USN'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Name: &emsp;<?php echo $winner_4B_ECE['firstname'] ?> <?php echo $winner_4B_ECE['lastname'] ?></label><br><br>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Votes: &emsp;<?php echo $winner_4B_ECE['votes'] ?></label><br><br><br><br>
  </body>
</html>
