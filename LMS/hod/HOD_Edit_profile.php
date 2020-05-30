<?php
session_start();
error_reporting(0);
include('HOD_Database_configuration.php');
if(strlen($_SESSION['hodlogin'])==0)
    {   
header('location:HOD_Home_page.php');
}
else{
$hid=$_SESSION['hid'];
if(isset($_POST['Update']))
{

$fname=$_POST['First_name'];
$gender=$_POST['Gender']; 
$dob=$_POST['Date_of_birth']; 
$department=$_POST['Department']; 
$address=$_POST['Address']; 
$mobileno=$_POST['Phone_number']; 

$sql="update Staff set Name ='$fname',Gender='$gender',DOB='$dob',Department='$department',Address='$address',Phone='$mobileno' where EmpID='$hid'";
$query = $dbh->prepare($sql);
$query->execute();
$msg="Employee record updated Successfully";
}

    ?>





<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
    
  
    <form name="edit_profile_form" id="edit_profile_form"  method="post">
  <div class="container">
      <h1>Edit Profile</h1>
    
    <p>Please fill in this form to change the Profile.</p>
       <?php if($error)
{?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
</div>
<?php 
}
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
    <hr>
      
      <?php 
$hid=$_SESSION['hid'];
$sql = "SELECT * from  Staff where EmpID=:hid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':hid',$hid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
      
    
          <label for="First Name"><b> Name</b></label>
         <input type="text" name="First_name" value="<?php echo htmlentities($result->Name);?>" required/>
      
        <label for="Email ID"><b>Email ID</b></label>
         <input type="email"  name="Email_ID" value="<?php echo htmlentities($result->Email);?>" required/>
      
       <label for="Phone Number"><b>Phone Number</b></label>
         <input type="tel"  name="Phone_number" value="<?php echo htmlentities($result->Phone);?>" maxlength="10" required/>
      
             <label for="Date of Birth"><b>Date of Birth</b></label>
         <input type="date"  name="Date_of_birth" value="<?php echo htmlentities($result->DOB);?>"  required/>
      
               <label for="Address"><b>Address</b></label>
         <input type="text"  name="Address" value="<?php echo htmlentities($result->Address);?>" required/>
      
      
      <label for="Gender"><b>Gender</b></label><br/>
      <select  name="Gender" >
          <option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></option>                                          
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
      </select>
      
      
       <label for="Department"><b>Department</b></label><br/>

      <select  name="Department" >
          <option value="<?php echo htmlentities($result->Department);?>"><?php echo htmlentities($result->Department);?></option>
			<option value="comp">Computer Engineering</option>
          <option value="it">Information Technology</option>
          <option value="entc">ENTC</option>
      </select>

    <hr>

      
<?php }}?>      

   <input type="submit" value="Update" name="Update"/>
      

      
  </div>
  

</form>
    
    

    

</body>
</html>
<?php } ?>