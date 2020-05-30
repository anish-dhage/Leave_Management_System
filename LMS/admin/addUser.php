<?php include("sqlConnection.php"); ?>
<?php $def_pass="password"; ?>

<?php
    session_start();
    $type = (isset($_SESSION["type"]))?$_SESSION["type"]:"";
?>

<?php if(isset($_POST["submitType"])){
    $type = $_POST["type"];
    $_SESSION["type"] = $_POST["type"];
} ?>

<?php if(isset($_POST["addUser"])){

    //Common Details
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $designation = $_POST["designation"];
    $collegeid = $_POST["collegeid"];

    $securityquestion = $_POST["securityquestion"];
    $securityanswer = $_POST["securityanswer"];

    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phonenumber"];
    $department = $_POST["department"];
    $dob = $_POST["dob"];

    //Test Query
    //$sql2 = $conn2->prepare("insert into test values ('$firstname'),('$lastname'),('$designation'),('$collegeid'),('$securityquestion'),('$securityanswer'),('$gender'),('$email'),('$address'),('$phonenumber'),('$department'),('$dob'),('$year'),('$division'),('$batch'),('$ccof'),('$mentorof')");
    //$sql2->execute();

    if($designation==="6"){
    
        //Exclusive to Students
        $year = $_POST["year"];
        $division = $_POST["division"];
        $batch = $_POST["batch"];

        //Student Query
        $sql2 = $conn2->prepare("INSERT INTO Student (EnrollID, Password, Name, Class, Batch, Mentor, ClassCordinator, HintQ, Answer, Gender, Email, Phone, Address, Department, DOB) values ('$collegeid','$def_pass','$firstname $lastname','$year$division','$batch$division',' ',' ','$securityquestion','$securityanswer','$gender','$email','$phonenumber','$address','$department','$dob')");
        $sql2->execute();
    }
    else{

    //Exclusive to Staff
    $ccof = $_POST['ccof'];
    $mentorof = $_POST['mentorof'];
    
    //Staff Query
    $sql2 = $conn2->prepare("INSERT INTO Staff (EmpID, Password, Name, Designation, cc_of, mentor_of, HintQ, Answer, Gender, Email, Phone, Address, Department, DOB) values ('$collegeid','$def_pass','$firstname $lastname','$designation','$ccof','$mentorof','$securityquestion','$securityanswer','$gender','$email','$phonenumber','$address','$department','$dob')");
    $sql2->execute();
    } 


    //ADDITION TO LMS_1 - END

?>
    <script type="text/javascript">
        alert("User added successfully!");
    </script>
<?php } ?>


?>
    <script type="text/javascript">
        alert("Password changed successfully to '<?php echo $def_pass; ?>'!");
    </script>
<?php } ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/layout.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <style media="screen">
        #c1{
            display: grid;
            grid-gap: 10px;
            grid-template-columns: 1fr 2fr 1fr 1fr;
            box-sizing: border-box;
        }
        </style>
    </head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function showDiv(elem){
           if(elem.value == "6"){
              $('#year').show();
              $('#division').show();
              $('#batch').show();
              $('#ccof').toggle();
              $('#mentorof').toggle();
            }
           if(elem.value == "3" || elem.value == "4" ){
              $('#year').hide();
              $('#division').hide();
              $('#batch').hide();
              $('#ccof').show();
              $('#mentorof').show();
            }
        }            
    </script>


    <body>
        <!-- ADD USER -->
        <fieldset class="myFieldset">
            <legend class="myLegend">Add User</legend>
            <form class="" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                <!-- EXTRA STUFF I AM ADDING STARTS HERE-->

                <!-- DETAILS COMMON FOR EVERYONE -->
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">First Name</div>
                    <input required type="text" name="firstname" class="myText" placeholder="Enter your first name here">
                </div><br>

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Last Name</div>
                    <input required type="text" name="lastname" class="myText" placeholder="Enter your last name here">
                </div><br>

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Designation</div>
                    <select required name="designation" class="myText" onchange="showDiv(this);">
                        <option disabled selected>Designation</option>
                        <option value="3">Professor</option>
                        <option value="4">HoD</option>
                        <option value="6">Student</option>
                        <!--option>Principal</option-->
                    </select>
                </div><br>

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">College Id</div>
                    <input required type="text" name="collegeid" class="myText" placeholder="Enter your College ID here">
                </div><br>

                <!-- Default Password to save time -->

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Security Question</div>
                    <select required name="securityquestion" class="myText">
                        <option disabled selected>Select Security Question</option>
                        <option value="1">What is your pet name?</option>
                        <option value="2">Which site do you visit the least?</option>
                        <option value="3">What is your favourite color?</option>
                        <option value="4">What was your mother's maiden name?</option>
                        <option value="5">Where did you go for pre-school?</option>
                    </select>
                </div><br>
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Security Answer</div>
                    <input required type="text" name="securityanswer" class="myText" placeholder="Enter your answer">
                </div><br>

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Gender</div>
                    <select required name="gender" class="myText">
                        <option disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female" >Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div><br>
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Email</div>
                    <input required type="email" name="email" class="myText" placeholder="Enter your email">
                </div><br>
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Address</div>
                    <input required type="text" name="address" class="myText" placeholder="Enter your address">
                </div><br>
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Phone Number</div>
                    <input required type="number" name="phonenumber" class="myText" placeholder="Enter your phone number">
                </div><br>

                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Department</div>
                    <select required name="department" class="myText">
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
                    <option value="Applied Science">Applied Science</option>
                    </select>
                </div><br>
                
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Date of Birth</div>
                    <input required type="date" name="dob" class="myText" placeholder="Enter your date of Birth">
                </div><br>



                <!-- DETAILS EXCLUSIVE TO STUDENTS -->

                <div class="gridTabItem" id="year">
                    <div style="grid-column:2" class="tab2">Year</div>
                    <select required name="year" class="myText">
                        <option disabled selected>Year</option>
                        <option value="FE">First Year</option>
                        <option value="SE">Second Year</option>
                        <option value="TE">Third Year</option>
                        <option value="BE">Fourth Year</option>
                    </select>
                </div><br>

                <div class="gridTabItem" id="division">
                    <div style="grid-column:2" class="tab2">Division</div>
                    <select required name="division" class="myText">
                        <option disabled selected>Division</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                </div><br>

                <div class="gridTabItem" id="batch" >
                    <div style="grid-column:2" class="tab2">Batch</div>
                    <select required name="batch" class="myText">
                        <option disabled selected>Batch</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>

                        <option>E</option>
                        <option>F</option>
                        <option>G</option>
                        <option>H</option>
                        
                        <option>I</option>
                        <option>J</option>
                        
                        <option>K</option>
                        <option>L</option>
                        <option>M</option>
                        <option>N</option>
                    </select>
                </div><br>

                <!-- DETAILS EXCLUSIVE TO FACULTY -->

                <!-- INCLUDE REGEX -->
                
                <div class="gridTabItem" id="ccof" >
                    <div style="grid-column:2" class="tab2">Class Coordinator of</div>
                    <input required type="text" name="ccof" class="myText" placeholder="Enter the class (Eg-TE1)">
                </div><br>
                
                <div class="gridTabItem" id="mentorof" >
                    <div style="grid-column:2" class="tab2">Mentor of</div>
                    <input required type="text" name="mentorof" class="myText" placeholder="Enter the batch (Eg-K1)">
                </div><br>

                <!-- EXTRA STUFF I AM ADDING ENDS HERE-->


                <button class="primaryButton" style="float:right" type="submit" name="addUser"><b>ADD USER</b></button>
            </form>
        </fieldset>


    </body>
</html>
