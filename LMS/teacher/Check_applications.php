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
    
          <?php include('Top_header.php');?>
          <?php include('Sidebar.php');?>
        
        
        <table id="leave_table">
        
          <tr>
            <th>Sr.no</th>
            <th>Student ID</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Reason of leave</th>
            <th>Status</th>
            <th>Action</th>  
        </tr>
            
            <?php 
            $eid=$_SESSION['eid'];
    
             $sql = "SELECT * from Staff where EmpID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);                
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $batch = $result->mentor_of;

    //TEST QUERY
    $sql = "INSERT INTO test VALUES ('$sql'),('$eid'),('$batch')";
    $query = $dbh -> prepare($sql);               
    $query->execute();

}
}
    
    
    
    

$sql = "SELECT * from student_leave_application where Batch_name ='$batch'";
$query = $dbh -> prepare($sql);          
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
     <tr>
        <td> <?php echo htmlentities($cnt);?></td>
        <td> <?php echo htmlentities($result->Student_ID);?></td>
        <td><?php echo htmlentities($result->From_date);?></td>
        <td><?php echo htmlentities($result->To_date);?></td>
        <td><?php echo htmlentities($result->Description);?></td>
    

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
        
                  <td><a href="Application_details.php?application_id=<?php echo htmlentities($result->ID);?>"> CHECK</a></td>
         
         
        </tr>
        <?php $cnt++;} }?>
        </table>
    
    
    </body>
</html>
<?php } ?>
    
