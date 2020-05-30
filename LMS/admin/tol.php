<?php
include("sqlConnection.php");
if(isset($_POST["del_btn"])){
    $leaveid = $_POST["id"];

    $sql2 = $conn2->prepare("INSERT INTO test values ($leaveid)");
    $sql2->execute();

    $sql2 = $conn2->prepare("delete from leave_types where ID=$leaveid");
    $sql2->execute();
}?>


<?php if(isset($_POST["addTOL"])){

    $type = $_POST["type"];
    $startBal = $_POST["startBal"];
    $lapse = $_POST["lapse"];
    $cf = $_POST["cf"];

    $sql2 = $conn2->prepare("insert into leave_types (Type,Description,Carry_forward,start_balance,lapse)  values('$type','$type',$cf,$startBal,$lapse)");
    $sql2->execute();


    ?>



    <script type="text/javascript">
    alert("Leave added successfully!");
</script>
<?php } ?>

<?php if(isset($_POST["submitEdit"])){

    $leavetype = $_POST["type"];
    $startBal = $_POST["startBal"];
    $lapse = $_POST["lapse"];
    $cf = $_POST["cf"];
    $leaveid = $_POST["id"];
    $sql2 = $conn2->prepare("update leave_types set Type='$leavetype',start_balance=$startBal,lapse=$lapse, Carry_forward=$cf where ID=$leaveid");
    $sql2->execute();

?>
    <script type="text/javascript">
        alert("Edited successfully!");
    </script>
<?php } ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .c1{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
        height: auto;
    }
    </style>
    <link rel = "stylesheet" href = "css/layout.css">
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


        $leaveid = $_POST["id"];
        $sql2 = $conn2->prepare("select * from leave_types where ID=$leaveid");
        $sql2->execute();
        $result = $sql2->get_result()->fetch_row();
        $lapse = $result[6];
        $cf = $result[4];
    ?>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="hidden" name="id" value=<?php echo $result[0]; ?>>
                <div class="gridTabItem" style="margin-top:30px">
                    <div style="grid-column:2" class="tab2">Type of Leave:</div>
                    <input required value="<?php echo $result[1]; ?>" placeholder="Enter the type of leave" class="myText" type="text" name="type"/>
                </div>
                <br>
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Starting Balance:</div>
                    <input required value="<?php echo $result[5]; ?>" placeholder="Enter the starting balance" class="myText" type="number" name="startBal"/>
                </div>
                <br>
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Is Lapsable?:</div>
                    <div style="margin-top:auto;margin-bottom:auto">
                        <label for="lapse-yes">Yes</label>
                        <input required <?php if($lapse==1){ ?> checked="true" <?php } ?> name="lapse" value="1" type="radio" id="lapse-yes"/>
                        <label for="lapse-no">No</label>
                        <input required <?php if($lapse==0){ ?> checked="true" <?php } ?>  name="lapse" value="0" type="radio" id="lapse-no"/>
                    </div>
                </div>
                <br>
                <div class="gridTabItem">
                    <div style="grid-column:2" class="tab2">Carry forward?:</div>
                    <div style="margin-top:auto;margin-bottom:auto">
                        <label for="cf-yes">Yes</label>
                        <inpu requiredt <?php if($cf==1){ ?> checked="true" <?php } ?> name="cf" value="1" type="radio" id="cf-yes"/>
                        <label for="cf-no">No</label>
                        <input required <?php if($cf==0){ ?> checked="true" <?php } ?> name="cf" value="0" type="radio" id="cf-no"/>
                    </div>
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
<!-- Add Form -->
<fieldset class="myFieldset">
    <legend class="myLegend">Add Type of Leave</legend>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="gridTabItem">
            <div style="grid-column:2" class="tab2">Type of Leave:</div>
            <input required placeholder="Enter the type of leave" class="myText" type="text" name="type"/>
        </div>
        <br>
        <div class="gridTabItem">
            <div style="grid-column:2" class="tab2">Starting Balance:</div>
            <input required placeholder="Enter the starting balance" class="myText" type="number" name="startBal"/>
        </div>
        <br>
        <div class="gridTabItem">
            <div style="grid-column:2" class="tab2">Is Lapsable?:</div>
            <div style="margin-top:auto;margin-bottom:auto">
                <label for="lapse-yes">Yes</label>
                <input required checked name="lapse" value="1" type="radio" id="lapse-yes"/>
                <label for="lapse-no">No</label>
                <input required name="lapse" value="0" type="radio" id="lapse-no"/>
            </div>
        </div>
        <br>
        <div class="gridTabItem">
            <div style="grid-column:2" class="tab2">Carry forward?:</div>
            <div style="margin-top:auto;margin-bottom:auto">
                <label for="cf-yes">Yes</label>
                <input required checked name="cf" value="1" type="radio" id="cf-yes"/>
                <label for="cf-no">No</label>
                <input required name="cf" value="0" type="radio" id="cf-no"/>
            </div>
        </div>
        <br>
        <button style="float:right;width:10vw" class="primaryButton" type="submit" name="addTOL">
            <b>ADD</b>
        </button>
    </form>
</fieldset>
<!-- TABLE OF LEAVES -->
<div class="container">
    <table border="1" class="myTable">
        <tr>
            <th>TYPE</th>
            <th>STARTING BALANCE</th>
            <th>LAPSE?</th>
            <th>CARRY FORWARD?</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php

        $sql2 = "select * from leave_types";
        $result = $conn2->query($sql2);
        while($row = $result->fetch_assoc()){
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <tr>
                    <td><?php echo $row["Type"]; ?></td>
                    <td><?php echo $row["start_balance"]; ?></td>
                    <td><?php echo $row["lapse"]==0?"False":"True"; ?></td>
                    <td><?php echo $row["Carry_forward"]==0?"False":"True"; ?></td>
                    <input type="hidden" name="id" value=<?php echo $row["ID"]; ?>>
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
</body>
</html>
