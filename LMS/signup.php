<?php
include("sqlConnection.php");
$user_name = "root";
$password = "";
$database = "test";
$server = "127.0.0.1";
$conn2=new mysqli($server, $user_name, $password, $database);
if(!$conn2){
	die ('SQL Error: ' . mysqli_error($conn2));
}
if(isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['designation']) && isset($_POST['id']) && isset($_POST['password']) && isset($_POST['hintq']) && isset($_POST['ans']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['dept']) && isset($_POST['dob'])){
	
	$fname=mysqli_real_escape_string($conn2, $_POST['fname']);
	$lname=mysqli_real_escape_string($conn2, $_POST['lname']);
	$designation=mysqli_real_escape_string($conn2, $_POST['designation']);
	$id=mysqli_real_escape_string($conn2, $_POST['id']);
	$password=mysqli_real_escape_string($conn2, $_POST['password']);
	$hintq=mysqli_real_escape_string($conn2, $_POST['hintq']);
	$ans=mysqli_real_escape_string($conn2, $_POST['ans']);
	$class=mysqli_real_escape_string($conn2, $_POST['class']);
	$division=mysqli_real_escape_string($conn2, $_POST['division']);
	$batch=mysqli_real_escape_string($conn2, $_POST['batch']);
	$cc_of=mysqli_real_escape_string($conn2, $_POST['cc_of']);
	$mentor_of=mysqli_real_escape_string($conn2, $_POST['mentor_of']);
	$gender=mysqli_real_escape_string($conn2, $_POST['gender']);
	$email=mysqli_real_escape_string($conn2, $_POST['email']);
	$phone=mysqli_real_escape_string($conn2, $_POST['phone']);
	$address=mysqli_real_escape_string($conn2, $_POST['address']);
	$dept=mysqli_real_escape_string($conn2, $_POST['dept']);
	$dob=mysqli_real_escape_string($conn2, $_POST['dob']);


	
	
	if($designation==="6"){

		$query = "SELECT `EmpID` FROM `Staff` WHERE  cc_of=\"".$class.$division."\"";
		$result = mysqli_query($conn2, $query);
		if (!$result) {
			die ('SQL Error: ' . mysqli_error($conn2));
		}
		$count=mysqli_num_rows($result);
		if($count==1){
			$cc = mysqli_fetch_assoc($result);
		}

		$query = "SELECT `EmpID` FROM `Staff` WHERE  mentor_of=\"".$batch.$division."\"";
		$result = mysqli_query($conn2, $query);
		if (!$result) {
			die ('SQL Error: ' . mysqli_error($conn2));
		}
		$count=mysqli_num_rows($result);
		if($count==1){
			$mentor = mysqli_fetch_assoc($result);
		}

		$sql="INSERT INTO `Student` (`EnrollID`, `Password`,  `Name`, `Class`, `Batch`,`Mentor`,`ClassCordinator`, `HintQ`, `Answer`, `Gender`, `Email` ,`Phone`, `Address`, `Department`, `DOB`) VALUES ('".$id."', '".$password."', '".$fname." ".$lname."', '".$class.$division."' , '".$batch.$division."', '".$mentor['EmpID']."', '".$cc['EmpID']."', '".$hintq."', '".$ans."', '".$gender."', '".$email."', '".$phone."', '".$address."', '".$dept."', '".$dob."')";
		if(mysqli_query($conn2,$sql)){
			echo "<script>window.location.href='homepage.html';</script>";
		}
		else{

			echo "Record insert error";
			echo "<script>
            alert('Duplicate Entry');
            window.location.href='registration.html';
            </script>";
		}
	}
	else{
		$sql="INSERT INTO `Staff` (`EmpID`, `Password`,  `Name`, `Designation`, `cc_of`,`mentor_of`, `HintQ`, `Answer`, `Gender`, `Email` ,`Phone`, `Address`, `Department`, `DOB`) VALUES ('".$id."', '".$password."', '".$fname." ".$lname."', '".$designation."' , '".$cc_of."', '".$mentor_of."', '".$hintq."', '".$ans."', '".$gender."', '".$email."', '".$phone."', '".$address."', '".$dept."', '".$dob."')";
		if(mysqli_query($conn2,$sql)){
			echo "<script>window.location.href='homepage.php';</script>";

		}
		else{

			echo "Record insert error";
			echo "<script>
            alert('Duplicate Entry');
            window.location.href='registration.html';
            </script>";
		}
	}
}
else
{
	echo "<script>window.location.href='registration.html';</script>";

}

?>