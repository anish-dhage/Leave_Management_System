<?php
session_start();
error_reporting(0);
include('Database_configuration.php');
if(strlen($_SESSION['emplogin'])==0)
{
    header('location:Edit_profile.php');
}
else{
    
    if(isset($_POST['update']))
    {
        $did=intval($_GET['application_id']);
        $description=$_POST['description'];
        $status=$_POST['status'];
        date_default_timezone_set('Asia/Kolkata');
        $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
        $sql="update student_leave_application set Staff_remark=:description,Status=:status,Staff_remark_date=:admremarkdate where id=:did";
        $query = $dbh->prepare($sql);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
        $query->bindParam(':did',$did,PDO::PARAM_STR);
        $query->execute();
        $msg="Leave updated Successfully";
    }
    
    
    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Applications details
        </title>
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
        
        
        
           <form name="applications_details_form" id="applications_details_form"  method="post">
  <div class="container">
      <h1>Applications details</h1>
    
    
       <?php if($error)
{?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
</div>
<?php 
}
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
    <hr>
      
      <?php 
     $lid=intval($_GET['application_id']);
$sql = "SELECT * from  student_leave_application where ID=:lid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':lid',$lid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
      
    
          <label for="StudentID"><b>Student ID</b></label>
         <input type="text" name="Student_ID" value="<?php echo htmlentities($result->Student_ID);?>" readonly required/>
      
      
          <label for="To_date"><b>To Date</b></label>
         <input type="text" name="To_date" value="<?php echo htmlentities($result->To_date);?>" readonly required/>
      
              <label for="From_date"><b>From Date</b></label>
         <input type="text" name="From_date" value="<?php echo htmlentities($result->From_date);?>" readonly required/>
      
             <label for="Attendance"><b>Attendance</b></label>
         <input type="text" name="Attendance" value="<?php echo htmlentities($result->Attendance);?>" readonly required/>
      
      
            <label for="Description"><b>Reason</b></label> <br/>   
      <textarea name="Description" rows="3"  readonly required><?php echo htmlentities($result->Description);?></textarea>
      
        <label for="Leave_address"><b>Leave Address</b></label> <br/>   
      <textarea name="Leave_address" rows="3"  readonly required><?php echo htmlentities($result->Leave_address);?></textarea>
      
         <label for="Leave_contact"><b>Leave contact</b></label> <br/>
      <input value="<?php echo htmlentities($result->Leave_contact);?>" readonly  name="Leave_contact" type="tel" maxlength="10"  required>
      
                <label for="Batch_name"><b>Batch name</b></label>
         <input type="text" name="Batch_name" value="<?php echo htmlentities($result->Batch_name);?>" readonly required/>
      
                <label for="Class_name"><b>Class name</b></label>
         <input type="text" name="Class_name" value="<?php echo htmlentities($result->Class_name);?>" readonly required/>
      
             <label for="Status"><b>Status</b></label>
         <input type="text" name="Status" value="<?php
                if($result->Status==1){
                        echo htmlentities("Approved");
                }
             if($result->Status==2){
                        echo htmlentities("Not Approved");
                }
               if($result->Status==0){
                        echo htmlentities("Waiting for approval");
                }
                ?>" readonly required/>
      
      
      
             <label for="Staff_reamark"><b>Teacher Remark</b></label> <br/> 
      <textarea name="Staff_remark" rows="3"  readonly required><?php if($result->Staff_remark==""){
                    echo "waiting for Approval";  
                }
            else{
            echo htmlentities($result->Staff_remark);
            }?></textarea>
      
      
      
      
         <label for="Staff_remark_date"><b>Teacher remark date</b></label>
         <input type="text" name="Status" value="<?php
                     if($result->Staff_remark_date==""){
                      echo "-------";  
                    }
                    else{
                    echo htmlentities($result->Staff_remark_date);
                    }
                ?>" readonly required/>

    <hr>

      
<?php }}?>    
     <h1>Take Action</h1>
    
    <p>Please fill this to respond</p>
      
      <hr>
      
            <label for="Approval"><b>Approval</b></label><br/>
      <select  name="status" required="">
       <option value="">Choose your option</option>
             <option value="1">Approved</option>
            <option value="2">Not Approved</option>
      </select>
      
            <label for="description"><b>Description</b></label> <br/>   
      <textarea name="description" rows="3" placeholder="Enter the description here..." required></textarea>
      

   <input type="submit" value="update" name="update"/>
      

      
  </div>
  

</form>
        
        
        
        
        
        
        
        
    </body>






</html>

<?php } ?>