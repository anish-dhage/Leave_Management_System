<!DOCTYPE html>
<html>
  <head>
  <title>Status</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link href="css/refreshform.css" rel="stylesheet">
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href = "New.css">
          <script type="text/javascript" src="myscript.js"></script>
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
  width:90%;
  }
  th,td{
  text-align:left;
  padding:8px;
  }
  th{
  background-color:#4b4276;
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
  <script>
  	function add()
  	{	var tab=document.getElementById("data");
  	    var x = document.getElementById("data").insertRow(0);
      for (var c = 0; c < 4; c += 1) {
        var y = x.insertCell(c);
      }

  	tab.rows[0].cells[0].innerHTML="aw";
  	tab.rows[0].cells[1].innerHTML="aw";
  	tab.rows[0].cells[2].innerHTML="aw";
  	tab.rows[0].cells[3].innerHTML="aw";
  			}
  </script>
  <body>
    <div class="wrapper">
    <div class="side">
    <ul>
    <li ><a href="report.php"><i class="fas fa-file-word">Leave Report</i></a></li>
    <li><a href="profile.php">Profile</a></li>
    <li class="curr"><a href="#"><i class="far fa-user"></i>Leave Status</a></li>
    <li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
    </div>
    </div>
    <div id="mainform">
    <div id="form" class="container">
    <br>
    <br>
    <center>

     <table border="3" id="id1">
          <tr>
            <th>Start date</th>
            <th>End date</th>
            <th>Reason</th>
            <th>Status</th>
    	  </tr>
    <?php
    session_start();
    include("sqlConnection.php");
    
    $sid=$_SESSION['EnrollID'];
    $sql = "SELECT * FROM student_leave_application where Student_ID='".$sid."'";
    $result = mysqli_query($conn2, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    		if($row['Lid']!=1000)
    		{echo "<tr>";
                      echo "<td>".$row['To_date']." </td>";
                      echo "<td>".$row['From_date']."</td>";
                      echo "<td>".$row['Description']."</td>";
                      echo "<td>".$row['Staff_remark']."</td>";
    				  echo "</tr>";
    		}
        }
    } else {
        echo "0 results";
    }

    $conn2->close();
    ?>


        </table>


    </center>


    </div>
    </div>
  </body>
</html>
