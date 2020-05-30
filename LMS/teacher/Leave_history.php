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
    
     ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Leave History</title>
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
        
        
        <table id="leave_table">
        
          <tr>
            <th>Sr.no</th>
            <th>Leave Type</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Reason of leave</th>
            <th>Apply date of leave</th>  
            <th>Leave Address</th>
            <th>Leave Contact</th>
            <th>HOD Remark</th>
            <th>Status</th>
        </tr>
            
            <?php 
$eid=$_SESSION['eid'];
$sql = "SELECT Leave_type,To_date,From_date,Description,Posting_date,HOD_remark_date,HOD_remark,Leave_address,Leave_contact,Status from employee_leave_application where Emp_ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
     <tr>
        <td> <?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($result->Leave_type);?></td>
        <td><?php echo htmlentities($result->From_date);?></td>
        <td><?php echo htmlentities($result->To_date);?></td>
        <td><?php echo htmlentities($result->Description);?></td>
        <td><?php echo htmlentities($result->Posting_date);?></td>
         <td><?php echo htmlentities($result->Leave_address);?></td>
         <td><?php echo htmlentities($result->Leave_contact);?></td>
        <td>
            <?php if($result->HOD_remark==""){
                    echo htmlentities('waiting for approval');
                    }
                    else{
                        echo htmlentities(($result->HOD_remark)." "."at"." ".($result->HOD_remark_date));
                        }

        ?></td>
         <td>
            <?php if($result->Status==1){ ?>
                <span style="color: green">Approved !!!</span>
             <?php } 
            if($result->Status==2)  { ?>
                <span style="color: red">Sorry Not Approved !!</span>
            <?php }
            if($result->Status==0)  { ?>
            <span style="color: blue">Still Waiting for Approval</span>
            <?php } ?>
         
         </td>
        
        </tr>
        <?php $cnt++;} }?>
        </table>
    
    
    </body>
</html>
<?php } ?>
    
