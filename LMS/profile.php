<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

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
text-align:left;
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
#student_details,#l1,#id1
{
margin-left:220px;
}
 
</style>
</head>
<body  background="bg.jpg">
<div class="wrapper">
<div class="side">
   
<ul>
<li><a href="report.php"><i class="fas fa-file-word">Leave Report</i></a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="status.php"><i class="far fa-user"></i>Leave Status</a></li>
<li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
</ul>
</div>
</div>
<!-- <div id="mainform">
<div id="form">
<h4 id="id1">STUDENT MAIN PAGE (LMS)</h4>
    <h4 id="id1">Enter your REG-ID to display details!</h4>

<form id="getform">
<label id ="l1">REG-ID :</label>
<input id="rid" type="text">
<input id="submit" type="button" value="Submit">
</form > 
<br>
<br>
<center>
    <div class="table-responsive" id="student_details" style="display:none">
        <table class="table table-bordered">
         <tr>
          <td width="10%" align="right"><b>Name</b></td>
          <td width="90%"><span id="name"></span></td>
         </tr>
         <tr>
          <td width="10%" align="right"><b>Email</b></td>
          <td width="90%"><span id="email"></span></td>
         </tr>
     
         <tr>
          <td width="10%" align="right"><b>Reg_id</b></td>
          <td width="90%"><span id="regid"></span></td>
         </tr>
       
        </table>
        </div>
    </center>
</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
 $('#submit').click(function(){
  var id= $('#rid').val();
  if(id != '')
  {
   $.ajax({
    url:"data.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
        if(data.val!='')
        {
            $('#student_details').css("display", "block");
            $('#name').text(data.name);
            $('#email').text(data.email);
            $('#regid').text(data.regid);
  
        }
    },
 
   })
  }
  else
  {
   alert("Please Select Student");
   $('#student_details').css("display", "none");
  }
 });
});

</script> -->
  <div class="card " style="max-width: 100rem; margin-left: 300px;" >
    <div class="card-body">
      <div class="row">
        <div class="col" style="margin-top: 200px;">
          <ul class="list-group">
            <li class="list-group-item"><img class="avatar" src="pict.png"></li>
            <li class="list-group-item">User : <?php echo $_SESSION["Name"];?></li>
            <li class="list-group-item">Registration Id : <?php echo $_SESSION["EnrollID"];?></li>
            <li class="list-group-item">Class : <?php echo $_SESSION["Class"];?></li>
            <li class="list-group-item">CC : <?php echo $_SESSION["ClassCordinator"];?></li>

            <li class="list-group-item">Batch : <?php echo $_SESSION["Batch"];?></li>
            <li class="list-group-item">Mentor : <?php echo $_SESSION["Mentor"];?></li>

            <li class="list-group-item">Address : <?php echo $_SESSION["Address"];?></li>

            <li class="list-group-item">Contact : <?php echo $_SESSION["Contact"];?></li>

          </ul>
        </div>
      </div>
    </div>
  </div>

</body>
</html>