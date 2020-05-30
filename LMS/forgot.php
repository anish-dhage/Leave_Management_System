<?php
session_start();
include("sqlConnection.php");
$type = mysqli_real_escape_string($conn2, $_POST["type"]);
$name = mysqli_real_escape_string($conn2, $_POST["name"]);
$pass = mysqli_real_escape_string($conn2, $_POST["pass"]);
$hintq = mysqli_real_escape_string($conn2, $_POST["hintq"]);
$answer = mysqli_real_escape_string($conn2, $_POST["answer"]);



if ($type === "Student") {
		# code...
		$query = "SELECT * FROM `Student` WHERE HintQ='".mysqli_real_escape_string($conn2, $hintq)."' AND Answer='".mysqli_real_escape_string($conn2, $answer)."' AND EnrollID='".mysqli_real_escape_string($conn2, $name)."'";
		$result = mysqli_query($conn2, $query);
		if (mysqli_num_rows($result) !== 0) {
			# code...
			$update = "UPDATE `Student` SET Password='".$pass."' where EnrollID ='".$name."'";
			$except=mysqli_query($conn2, $update);
			if ($except) {
				# code...
				echo "Successfully Updated";
			}
			else
			{
				echo "Failed...";
			}
		}
		else {
			# code...
			echo "Incorrect question or answer";
		}
	}
elseif ($type === "Faculty") {
		# code...
		$query = "SELECT * FROM `Staff` WHERE HintQ='".mysqli_real_escape_string($conn2, $hintq)."' AND Answer='".mysqli_real_escape_string($conn2, $answer)."' AND EmpID='".mysqli_real_escape_string($conn2, $name)."'";
		$result = mysqli_query($conn2, $query);
		if (mysqli_num_rows($result) !== 0) {
			# code...
			$update = "UPDATE `Staff` SET Password='".$pass."'";
			$except=mysqli_query($conn2, $update);
			if ($except) {
				# code...
				echo "Successfully Updated";
			}
			else
			{
				echo "Failed...";
			}
		}
		else {
			# code...
			echo "Incorrect question or answer";
		}
	}	
?>
