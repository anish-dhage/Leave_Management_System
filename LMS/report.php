<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Submit Form Using AJAX and jQuery</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="css/refreshform.css" rel="stylesheet">
	<script src="script.js"></script>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href = "New.css">
    <script type="text/javascript" src="myscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
.wrapper
{

display: flex;
position: relative;
}
.wrapper .side
{
background:#4b4276;
position:fixed;
width:200px;
height:100%;
padding:30px 0;
}
.wrapper ul li
{
padding:15px 10px;
border-bottom: 1px solid rgba(0,0,0,0.05);
border-top: 1px solid rgba(225,255,255,0.05);
}
.wrapper ul li a
{
color:#bdb8d7;
display:block;
}
.wrapper ul li a:hover
{
background:white;
}
table{
border-collapse:collapse;
width:50%;
}
th,td{
text-allign:left;
padding:8px;
}
th{
background-color:#4CAF50;
color:white;
}
#submit
{
background-color:#008CBA;
border-radius:40px ;
width:100px;
color:white;
}
#id1,#l1
{
margin-left:220px;
}
</style>
</head>
<body background="bg.jpg">
<div class="wrapper">
<div class="side">
<ul>
<li class="curr"><a href="#"><i class="fas fa-file-word">Leave Report</i></a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="status.php"><i class="far fa-user"></i>Leave Status</a></li>
<li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
</ul>
</div>
</div>
<div id="mainform">
<div id="form" class="container">
<br>
<br>
	<form method="POST">
        <br><br><br>
        <label style="color: #4b4276"><b >&nbsp&nbsp&nbsp&nbspLeave Start Date</b></label><br><br>
&nbsp&nbsp&nbsp&nbsp<input type="date" id="suru" name="startd">
        <br><br><br>
        <label style="color: #4b4276" ><b >&nbsp&nbsp&nbsp&nbspLeave End Date</b></label><br><br>
&nbsp&nbsp&nbsp&nbsp<input type="date" onchange="No_of_days()" id="endl" name="endd">
        <br><br>
        <div id="diff">
        </div>
                    <br><br>
                    &nbsp&nbsp&nbsp&nbsp<label style="color: #4b4276">Enter your reason here</label>
                    <br>
                    &nbsp&nbsp&nbsp&nbsp
        <textarea rows="10" cols="50" name="comment" class="commentbox"></textarea>
                    <br><br>
                  
                    &nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="submit">
            </form>
		</div>
	</div>
   <?php

    include("sqlConnection.sql");

// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}
 
    if($_POST["startd"]!=NULL)
    {   
        $usr =   mysqli_real_escape_string($conn2, $_SESSION["EnrollID"]);
        $des = mysqli_real_escape_string($conn2, $_POST["comment"]);
        $batch = mysqli_real_escape_string($conn2, $_SESSION["Batch"]);
        $class = mysqli_real_escape_string($conn2, $_SESSION["Class"]);
        $start_date = mysqli_real_escape_string($conn2, $_POST["startd"]);
        $end_date = mysqli_real_escape_string($conn2, $_POST["endd"]);
        $add = mysqli_real_escape_string($conn2, $_SESSION["Address"]);
        $phone = mysqli_real_escape_string($conn2, $_SESSION["Contact"]);

        $sql = "INSERT INTO student_leave_application (Student_ID,From_date,To_date,Description,Batch_name,Class_name,Leave_address,Leave_contact) VALUES ('$usr','$start_date','$end_date','$des','$batch','$class','$add','$phone')";

    if (mysqli_query($conn2, $sql)) {
            header('location:profile.php');
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn2);
     }

    }
  
mysql_close($conn2);
?>

</body>
</html>
