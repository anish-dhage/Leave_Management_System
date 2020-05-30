<?php
session_start();
error_reporting(0);
include('Database_configuration.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:Home_page.php');
}
else
{
    
    
    if(isset($_POST['Apply']))
{
$empid=$_SESSION['eid'];
$leavetype=$_POST['Leave_type'];
$fromdate=$_POST['From_date'];  
$todate=$_POST['To_date'];
$description=$_POST['Description'];  
$leave_address=$_POST['Leave_address'];  
$leave_contact=$_POST['Leave_contact'];        
$status=0;
$isread=0;
if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO employee_leave_application(Leave_type,To_date,From_date,Description,Status,Is_read,Emp_ID,Leave_address,Leave_contact) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid,:leave_address,:leave_contact)";
$query = $dbh->prepare($sql);
$query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':leave_address',$leave_address,PDO::PARAM_STR);
$query->bindParam(':leave_contact',$leave_contact,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
 
if($lastInsertId)
{
$msg="Leave applied successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}






?>





<!DOCTYPE html>
<html>
<head>
    <title>Apply for leave</title>
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
      <?php include('Top_header.php');?>
<?php include('Sidebar.php');?>
    
     <form name="employee_apply_leave_form" id="employee_apply_leave_form"  method="post">
  <div class="container">
      <h1>Apply for leave</h1>
    
    <p>Please fill in this form to apply for leave.</p>
       <?php if($error)
{?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
</div>
<?php 
}
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
    <hr>
      
        <label for="Leave_type"><b>Leave Type</b></label>      
        <select  name="Leave_type" autocomplete="off">
        <option value="">Select the leave type</option>
        <?php $sql = "SELECT  Type from leave_types";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {   ?>                                            
        <option value="<?php echo htmlentities($result->Type);?>"><?php echo htmlentities($result->Type);?></option>
        <?php }} ?>
        </select>
      
        <label for="fromdate"><b>From  Date</b></label>
        <input placeholder=""  name="From_date" type="date"  required>
      
        <label for="fromdate"><b>To  Date</b></label>
        <input placeholder=""  name="To_date" type="date"  required>
      
      <label for="Description"><b>Reason</b></label> <br/>   
      <textarea name="Description" rows="3" placeholder="Enter the reason here..." required></textarea>
      
        <label for="Leave_address"><b>Leave Address</b></label> <br/>   
      <textarea name="Leave_address" rows="3" placeholder="Enter the leave address here..." required></textarea>
      
         <label for="Leave_contact"><b>Leave contact</b></label> <br/>
      <input placeholder=""  name="Leave_contact" type="tel" maxlength="10"  required>
      
      <br/>
      

    <hr>

      
     

   <input type="submit" value="Apply" name="Apply"/>
      

      
  </div>
  

</form>
    
    

    

</body>
</html>
<?php } ?>
    
    
    
    
