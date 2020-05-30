<?php
session_start();
error_reporting(0);
include('HOD_Database_configuration.php');
if(strlen($_SESSION['hodlogin'])==0)
{
    header('location:HOD_Home_page.php');
}
else
{
    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check Leave Applications</title>
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
        
        
        <table id="leave_table">
        
          <tr>
            <th>Sr.no</th>
            <th>Staff ID</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Reason of leave</th>
            <th>Status</th>
            <th>Action</th>  
        </tr>
            
            <?php 
            $hid=$_SESSION['hid'];

         $sql = "SELECT * from Staff where EmpID=:hid";
$query = $dbh -> prepare($sql);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);                
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $de_name = $result->Department;
}
}
    
              $count2=0;     
         $sql = "SELECT * from Staff where Department=:de_name";
$query = $dbh -> prepare($sql);
$query->bindParam(':de_name',$de_name,PDO::PARAM_STR);               
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $emp_id = $result->EmpID;
    
    


    
                    
     $sql2 = "SELECT * from employee_leave_application where Emp_ID =:emp_id";
    $query2 = $dbh -> prepare($sql2);
   
    $query2->bindParam(':emp_id',$emp_id,PDO::PARAM_STR);                
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{               ?>  
     <tr>
        <td> <?php echo htmlentities($cnt);?></td>
        <td> <?php echo htmlentities($result2->Emp_ID);?></td>
        <td><?php echo htmlentities($result2->From_date);?></td>
        <td><?php echo htmlentities($result2->To_date);?></td>
        <td><?php echo htmlentities($result2->Description);?></td>
    

         <td>
            <?php if($result2->Status==1){ ?>
                <span style="color: green">Approved !!!</span>
             <?php } 
            if($result2->Status==2)  { ?>
                <span style="color: red">Sorry Not Approved !!</span>
            <?php }
            if($result2->Status==0)  { ?>
            <span style="color: blue">Still Waiting for Approval</span>
            <?php } ?>
         
         </td>
        
                  <td><a href="HOD_Application_details.php?application_id=<?php echo htmlentities($result2->ID);?>"> CHECK</a></td>
         
         
        </tr>
        <?php $cnt++;} }?>
              <?php } }?>
        </table>
    
  
    </body>
</html>
<?php } ?>
    
