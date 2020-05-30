<?php 

include("sqlConnection.php"); 

if(isset($_POST["addNotice"])){

    $detail = $_POST["detail"];
    $currentdate = date("Y-m-d");
    $sql2 = $conn2->prepare("insert into notices(detail,date) values('$detail','$currentdate')");
    if($sql2->execute()){
?>
    <script type="text/javascript">
        alert("New notice added!");
    </script>
<?php }} ?>

<?php if(isset($_POST["del_btn"])){

    $dbusername = "apoorv";
    $dbpassword = "Ubuntu@123456";
    $dbname = "lms_1";
    $dbserver = "localhost";
    $conn2 = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if($conn2->connect_error){
        die("Connection failed: ".$conn2->connect_error);
    }

    $sql2 =$conn2->prepare("delete from notices where id=?");
    $sql2->bind_param("s",$_POST["id"]);
    $sql2->execute();
} ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/layout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style media="screen">
    table{
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        box-sizing: border-box;
    }
    #addIcon{
        float: right;
        color: white;
        background-color: blue;
        font-size: 2em;
        padding: 10px;
        border-radius: 50%;
    }
    #addIcon:hover{
        background-color: #3F51B5;
        cursor: pointer;
    }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").hide();
            $("#addIcon").click(function(){
                $("#myModal").show();
            });
            $("#close").click(function(){
                $("#myModal").hide();
            });
        });
    </script>
</head>
<body>
    <div style="padding:10px">
        <span id="addIcon" class="material-icons">
            add_circle
        </span>
    </div>
    <!-- MODAL FOR ADDITION -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="gridTabItem" style="margin-top:30px">
                    <div style="grid-column:2" class="tab2">Notice:</div>
                    <textarea required placeholder="Enter the notice detail here" name="detail" rows="6" cols="100" class="myText"></textarea>
                </div>
                <br>
                <button style="float:right;width:10vw" class="primaryButton" type="submit" name="addNotice">
                    <b>SUBMIT</b>
                </button>
            </form>
        </div>
        <span id="close" style="float: right;color:white" class="material-icons">cancel</span>
    </div>
    <!-- TABLE -->
    <div class="container" style="margin-top:12vh">
        <table class="myTable" style="width:90vw">
            <tr>
                <th width="80%">Notice</th>
                <th>Date<br><p style="font-size:small">(YYYY-MM-DD)</p></th>
                <th></th>
            </tr>
            <?php



            $dbusername = "apoorv";
            $dbpassword = "Ubuntu@123456";
            $dbname = "lms_1";
            $dbserver = "localhost";
            $conn2 = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
            if($conn2->connect_error){
                die("Connection failed: ".$conn2->connect_error);
            }

            $sql2 = "select * from notices";
            $result2 = $conn2->query($sql2);
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="hidden" name="id" value=<?php echo $row2["id"]; ?>>
                    <tr>
                        <td><?php echo $row2["detail"]; ?>
                            <td><?php echo $row2["date"]; ?>
                                <td>
                                    <button style="background:red" type="submit" name="del_btn">
                                        <span style="color:white" class="material-icons">
                                            delete
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            </div>
        </body>
        </html>