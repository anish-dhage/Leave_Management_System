            <div class="sidebar">
            
                <header>
                   <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/img/teacher.jpg" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php 
$eid=$_SESSION['eid'];
$sql = "SELECT Name,EmpID from  Staff where EmpID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                <p><?php echo htmlentities($result->Name);?></p>
                                <span><?php echo htmlentities($result->EmpID)?></span>
                         <?php }} ?>
                        </div>
                    </div>
                   
                </header>
                
                
                <?php
                $stat=0;
                
                
         $sql = "SELECT * from batch where Mentor_ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);                
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $batch = $result->Batch_ID;
}
}


                
                
                
                $sql = "SELECT ID from student_leave_application where Status=:stat and Batch_name =:batch";
$query = $dbh -> prepare($sql);
$query->bindParam(':stat',$stat,PDO::PARAM_STR);
$query->bindParam(':batch',$batch,PDO::PARAM_STR);                
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$count=$query->rowCount();
                
                ?>
                
                    <ul>
                     
                     <li><a href="Employee_apply_leave.php">Apply for Leave</a> 
                     <li><a href="Check_applications.php">Check Applications<?php echo htmlentities("(".$count.")");?></a>
                    <li><a href="Leave_history.php">Leave History</a>     
                     <li><a href="Edit_profile.php">Edit Profile</a>
                     <li><a href="Change_password.php">Change Password</a>
                     <li><a href="Logout.php">Logout</a>         
                    </ul>
            </div>