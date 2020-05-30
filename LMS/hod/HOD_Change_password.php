<?php
session_start();
error_reporting(0);
include('HOD_Database_configuration.php');
//echo $_SESSION['emplogin'];
if(strlen($_SESSION['hodlogin'])==0)
    {   
      header('location:HOD_Home_page.php');
     //echo "<script>alert('Invalid Details dfsdfsdf');</script>";
    
}
else{
if(isset($_POST['Confirm']))
    {
$password=($_POST['Current_Password']);
$newpassword=($_POST['New_Password']);
$username=$_SESSION['hid'];
    $sql ="SELECT Password FROM Staff WHERE EmpID=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update Staff set Password=:newpassword where EmpID=:username";
$changepwd1 = $dbh->prepare($con);
$changepwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$changepwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$changepwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";    
}
}
}
?>





<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
      <link type="text/css" rel="stylesheet" href="General.css"/>
    <style>
            .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    
    </style>
</head>
<body>
      <?php include('HOD_Top_header.php');?>
<?php include('HOD_Sidebar.php');?>
    
  
    <form name="change_password_form" id="change_password_form"  method="post">
  <div class="container">
      <h1>Change Password</h1>
    
    <p>Please fill in this form to change the password.</p>
       <?php if($error)
{?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
</div>
<?php 
}
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
    <hr>

    <label for="Current Password"><b>Current Password</b></label>
    
         <input type="password" placeholder="Enter the Current Password" name="Current_Password" required/>

    <label for="New Password"><b>New Password</b></label>
    <input type="password" placeholder="Enter the New Password" name="New_Password" required>

    <label for="Confirm New Password"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter the Confirm Password" name="Confirm_New_Password" required>
    <hr>


   <input type="submit" value="Confirm" name="Confirm"/>
      

      
  </div>
  

</form>
    
    
 <script src="General.js"></script>
    

</body>
</html>