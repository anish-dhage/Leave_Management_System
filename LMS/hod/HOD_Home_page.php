<?php
session_start();
error_reporting(0);
include('HOD_Database_configuration.php');
if(isset($_POST['Login']))
{
$uname=$_POST['Name'];
$password=($_POST['Password']);
$sql ="SELECT HOD_ID,First_name,Password,ID FROM hod_info WHERE HOD_ID=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    
     $_SESSION['hodlogin'] = $result->First_name;
    $_SESSION['hid']=$result->HOD_ID;
  } 
{

echo "<script type='text/javascript'> document.location = 'HOD_Change_password.php'; </script>";
} }

else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}





?>




<!DOCTYPE html>
<html>
<head>
<title>Login and Registeration Form</title>
    <link rel = "stylesheet" href="HOD_Home_page_style.css">
            <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>
    <style>
                .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    
    </style>
</head>
    <body>
        <header>
            <div class="header-div">
                  <h1>
                <img class = "header-logo" src="assets/img/pict-header-logo.png"> &emsp;&emsp;&emsp;&emsp;&emsp;
               leave management system 
              
                </h1>
                
                <nav>
                    <div class="header-menu">
                    <a href="/Home/">Home</a>
                    <a href="/About us/">About us</a>
                    <a href="/Rules/">Rules</a>
                    </div>
                </nav>
            </div>
        </header>
        
        <div class="login-page">
        <div class="form">

            
            <form class="login-form" method ="post">
            <h1 style="color: aqua">Sign-In</h1> 
             <?php if($msg){?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
            <input type="text" placeholder="Name" name="Name"required/>
            <input type="password" placeholder="Password" name="Password" required/>
                <input type="submit" value="Login" name="Login"/>
         
     
            <p class = "message"><input type="checkbox" checked="checked" name="remember"> Remember me</p>      
        
            <p class="message2">Forgot password? <a href="#">click here</a></p> 
            <p class="message2"><a href="#" onclick="myFunction()">click here to reset</a></p> 
            <br/><br/><br/><br/>       
            </form>
            

        </div>
        </div>
        
            <footer id="footer-bottom">
                <div class = "footer-div">
                <nav>
                    <div class="footer-menu">
                    <a href="About_us.html">About us</a> |
                    <a href="Statutory-Requirement-Document.pdf">Terms and conditions</a> |
                    <a href="FAQ.xml">FAQ</a> |
                    <a href="Developers.html">Developers</a>
                    </div>
                </nav>
                </div>
            </footer>

        <!--<script> $1 = jQuery.noConflict(true);</script>-->
     
        
        <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle",opacity: "toggle"},"slow");
        });
            
            $('.message2 a').click(function(){
            $('form')[0].reset();
              $('form')[1].reset();    
        });    
            
        </script>

       

        
        
    </body>
</html>