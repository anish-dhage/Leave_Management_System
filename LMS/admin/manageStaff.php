<?php include("sqlConnection.php");
?>



<?php
    session_start();
    if(isset($_SESSION["dep"])){
    $dep = $_SESSION["dep"];
}
else {
    $dep = "";
} ?>

<?php if(isset($_POST["submitType"])){
    $dep = $_POST["department"];
    $_SESSION["dep"] = $dep;
} ?>

<?php  if (isset($_POST["del_btn"])) {
    $dep = $_SESSION["dep"];
    $id = $_POST["id"];
    $sql2 = $conn2->prepare("delete from Staff where EmpID=?");
    $sql2->bind_param("s",$id);
    $sql2->execute();
}?>

<?php if(isset($_POST["submitEdit"])){
    $sql2 = $conn2->prepare("update Staff set Name=?,Designation=?,Department=? where EmpID=?");
    $sql2->bind_param("ssss",$_POST["name"],$_POST["designation"],$_POST["department"],$_POST["id"]);
    $sql2->execute();
}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
        #c1{
            display: grid;
            grid-gap: 10px;
            grid-template-columns: 1fr 2fr 1fr 1fr;
            box-sizing: border-box;
        }
        #c2{
            margin-top: 5vh;
            z-index: 1;
            display: flex;
            justify-content: center;
        }
        </style>
        <link rel="stylesheet" href="css/layout.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#close").click(function(){
                $("#myModal").hide();
            });
        });
        </script>
    </head>
    <body>
        <!-- MODAL -->
            <?php if(isset($_POST["edit_btn"])){
                $id = $_POST["id"];
                $sql2 = $conn2->prepare("select * from Staff where EmpID=?");
                $sql2->bind_param("s",$id);
                $sql2->execute();
                $result = $sql2->get_result()->fetch_row();
            ?>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="hidden" name="id" value=<?php echo $result[0]; ?>>
                        <div class="gridTabItem" style="margin-top:30px">
                            <div style="grid-column:2" class="tab2">Name:</div>
                            <input required size="50" value="<?php echo $result[2]; ?>" placeholder="Enter the name" class="myText" type="text" name="name"/>
                        </div>
                        <br>
                        <div class="gridTabItem">
                            <div style="grid-column:2" class="tab2">Designation:</div>
                            <input required value="<?php echo $result[3]; ?>" placeholder="Enter the designation" class="myText" type="text" name="designation"/>
                        </div>
                        <br>
                        <div class="gridTabItem">
                            <div style="grid-column:2" class="tab2">Department</div>
                            <select required class="myText" name="department" id="dep">
                                <option value="" disabled selected>Department</option>
                                <?php
                                    $sql2 = "select distinct department from batches";
                                    $result2 = $conn2->query($sql2);
                                    while ($row = $result2->fetch_assoc()) { ?>
                                        <option <?php if($row["department"]==$result[12]){ ?> selected="true" <?php } ?>>
                                            <?php echo $row["department"]; ?>
                                        </option>
                                    <?php }?>
                            </select>
                        </div>
                        <br>
                        <button style="float:right;width:10vw" class="primaryButton" type="submit" name="submitEdit">
                            <b>SUBMIT</b>
                        </button>
                    </form>
                </div>
                <span id="close" style="float: right;color:white" class="material-icons">cancel</span>
            </div>
        <?php } ?>

        <!-- MANAGE -->
        <fieldset class="myFieldset" style="margin-top:5vh">
            <legend class="myLegend">Edit Staff</legend>
            <?php if(!isset($_SESSION["dep"])){ ?>
                <div class="info" style="margin-top:0vh">
                    Please select the department whose staff you want to manage.
                </div><br>
            <?php } ?>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div id="c1">
                    <?php
                    $sql2 = "select distinct department from batches";
                    $deps = $conn2->query($sql2);
                    ?>
                    <select required style="grid-column:2" name="department" class="mySelect">
                        <option disabled selected>Department</option>
                        <?php while($row = $deps->fetch_assoc()){ ?>
                            <option
                                <?php if($dep==$row["department"]){ ?> selected="true" <?php } ?>
                            >
                                <?php echo $row["department"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button class="primaryButton" type="submit" name="submitType">SUBMIT</button>
                </div>
            </form>
        <!-- TABLE -->
            <div class="container">
                <table border="1" class="myTable">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DESIGNATION</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
                    $sql2 = $conn2->prepare("select * from Staff where Department=?");
                    $sql2->bind_param("s",$dep);
                    $sql2->execute();
                    $result = $sql2->get_result();
                    while($row = $result->fetch_assoc()){
                        ?>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <tr>
                                <td><?php echo $row["EmpID"]; ?></td>
                                <td><?php echo $row["Name"]; ?></td>
                                <td><?php echo $row["Designation"]; ?></td>
                                <input type="hidden" name="id" value=<?php echo $row["EmpID"]; ?>>
                                <td>
                                    <button type="submit" name="edit_btn" id="edit_btn">
                                        <span class="material-icons">
                                            create
                                        </span>
                                    </button>
                                </td>
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
    </fieldset>
    </body>
</html>
