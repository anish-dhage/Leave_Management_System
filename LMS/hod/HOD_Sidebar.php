            <div class="sidebar">
            
                <header>
                   <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/img/teacher.jpg" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php 
$hid=$_SESSION['hid'];
$sql = "SELECT Name,EmpID from  Staff where EmpID=:hid";
$query = $dbh -> prepare($sql);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);
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
                
                
         $sql = "SELECT * from departments where HOD_ID=:hid";
$query = $dbh -> prepare($sql);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);                
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $de_name = $result->Department_name;
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
    $emp_id = $result->Emp_ID;
    
                    
     $sql2 = "SELECT ID from employee_leave_application where Status=:stat and Emp_ID =:emp_id";
    $query2 = $dbh -> prepare($sql2);
    $query2->bindParam(':stat',$stat,PDO::PARAM_STR);
    $query2->bindParam(':emp_id',$emp_id,PDO::PARAM_STR);                
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
    $count2= $count2 + $query2->rowCount();

}
}                
                


                
                

                
                ?>
                
                    <ul>

                     <li><a href="HOD_Check_applications.php">Check Applications<?php echo htmlentities("(".$count2.")");?></a>    
                     <li><a href="HOD_Edit_profile.php">Edit Profile</a>
                     <li><a href="HOD_Change_password.php">Change Password</a>
                     <li><a href="HOD_Logout.php">Logout</a>         
                    </ul>
            </div>