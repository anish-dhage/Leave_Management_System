<?php
session_start();
$user_name = "apoorv";
$password = "Ubuntu@123456";
$database = "lms_1";
$server = "localhost";
$conn2=new mysqli($server, $user_name, $password, $database);
if(!$conn2){
	die("Connection Failed!");
}
$type = mysqli_real_escape_string($conn2, $_POST["type"]);
$name = mysqli_real_escape_string($conn2, $_POST["name"]);
$pass = mysqli_real_escape_string($conn2, $_POST["pass"]);

if ($type === "Student") {
		# code...
		$query = "SELECT * FROM `Student` WHERE EnrollID='".$name."' AND Password='".$pass."'";
		$result = mysqli_query($conn2, $query);
		if (mysqli_num_rows($result) !== 0) {
			# code...
			echo "Student";
			$row = $result->fetch_assoc();

			$_SESSION["EnrollID"]=$row["EnrollID"];
			$_SESSION["Class"]=$row["Class"];
			$_SESSION["Name"]=$row["Name"];
			$_SESSION["Batch"]=$row["Batch"];
			$_SESSION["Mentor"]=$row["Mentor"];
			$_SESSION["ClassCordinator"]=$row["ClassCordinator"];
			$_SESSION["Address"]=$row["Address"];
			$_SESSION["Contact"]=$row["Phone"];
			
		}
		else {
			# code...
			echo "Failed";
		}
	}
elseif ($type === "Faculty") {
		# code...
		$query = "SELECT * FROM `Staff` WHERE EmpID='".$name."' AND Password='".$pass."'";
		$result = mysqli_query($conn2, $query);
		if (mysqli_num_rows($result) !== 0) {
			# code...
			$row = $result->fetch_assoc();
			if ($row["Designation"] === "4" ) {
			    # code...
			    echo "Head";
			}
			else if ($row["Designation"] === "1" || $row["Designation"] === "2") {
				# code...
				echo "Admin";
			}
			else {
				echo "Faculty";
			}
			$_SESSION['emplogin'] = $row["Name"];
			$_SESSION['eid']=$row["EmpID"];
			$_SESSION["EmpID"]=$row["EmpID"];
			$_SESSION["Name"]=$row["Name"];
			$_SESSION["Designation"]=$row["Designation"];
			$_SESSION["cc_of"]=$row["cc_of"];
			$_SESSION["mentor_of"]=$row["mentor_of"];
			$_SESSION['hodlogin'] = $row["Name"];
			$_SESSION['hid']=$row["EmpID"];

		}
		else {
			# code...
			echo "Failed";
		}

	}	
?>