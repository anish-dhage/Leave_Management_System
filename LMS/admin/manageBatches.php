
<?php
    session_start();
    include("sqlConnection.php");
    $dep = (isset($_SESSION["dep"]))?$_SESSION["dep"]:"";
    $year = (isset($_SESSION["year"]))?$_SESSION["year"]:"";
?>

<?php if(isset($_POST["addBatch"])){

    $sql2 = $conn2->prepare("insert into batches(name,department,year,division) values(?,?,?,?)");
    $sql2->bind_param("ssss",$_POST["name"],$_POST["department"],$_POST["year"],$_POST["division"]);
    $sql2->execute();
    ?>
    <script type="text/javascript">
    alert("Batch added successfully!");
    </script>
<?php } ?>

<?php if(isset($_POST["submitType"])){
    $dep = $_POST["department"];
    $year = $_POST["year"];
    $_SESSION["dep"] = $dep;
    $_SESSION["year"] = $year;
} ?>

<?php  if (isset($_POST["del_btn"])) {

    $name = $_POST["name"];
    $sql2 = $conn2->prepare("delete from batches where name=?");
    $sql2->bind_param("s",$name);
    $sql2->execute();
}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel = "stylesheet" href = "css/layout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
</head>
<body>
    <!-- ADD -->
    <fieldset class="myFieldset">
        <legend class="myLegend">Add Batch</legend>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="gridTabItem">
                <div style="grid-column:2" class="tab2">Name</div>
                <input required placeholder="Enter the name of batch" class="myText" type="text" name="name"/>
            </div>
            <br>
            <div class="gridTabItem">
                <div style="grid-column:2" class="tab2">Department</div>
                <input required placeholder="Enter the department" class="myText" type="text" name="department"/>
            </div>
            <br>
            <div class="gridTabItem">
                <div style="grid-column:2" class="tab2">Year</div>
                <input required placeholder="Enter the year" class="myText" type="text" name="year"/>
            </div>
            <br>
            <div class="gridTabItem">
                <div style="grid-column:2" class="tab2">Division</div>
                <input required placeholder="Enter the division" class="myText" type="text" name="division"/>
            </div>
            <button style="float:right" class="primaryButton" type="submit" name="addBatch"><b>ADD BATCH</button>
            </form>
        </fieldset>
        <!-- VIEW AND DELETE -->
        <fieldset class="myFieldset" style="margin-top:5vh">
            <?php if(!isset($_SESSION["dep"])){ ?>
                <div class="info" style="margin-top:0vh">
                    Please select the department and year whose batches you want to manage.
                </div><br>
            <?php } ?>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <?php

                $sql2 = "select distinct department from batches";
                $deps = $conn2->query($sql2);
                $sql2 = "select distinct year from batches";
                $years = $conn2->query($sql2);
                ?>
                <div class="selects2btn">
                    <select required name="department" class="mySelect">
                        <option disabled selected>Department</option>
                        <?php while($row = $deps->fetch_assoc()){ ?>
                            <option
                            <?php if($dep==$row["department"]){ ?> selected="true" <?php } ?>
                            >
                            <?php echo $row["department"]; ?>
                        </option>
                    <?php } ?>
                    </select>
                    <select required style="grid-column:2" name="year" class="mySelect">
                        <option disabled selected>Year</option>
                        <?php while($row = $years->fetch_assoc()){ ?>
                            <option <?php if($year==$row["year"]){ ?> selected="true" <?php } ?>>
                                <?php echo $row["year"]; ?>
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
                    <th>NAME</th>
                    <th>DIVISION</th>
                    <th>CC</th>
                    <th>MENTOR</th>
                    <!-- <th>EDIT</th> -->
                    <th>DELETE</th>
                </tr>
                <?php
                $sql2 = $conn2->prepare("select * from batches where department=? and year=?");
                $sql2->bind_param("ss",$dep,$year);
                $sql2->execute();
                $result = $sql2->get_result();
                while($row = $result->fetch_assoc()){
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <tr>
                            <input type="hidden" name="name" value=<?php echo $row["name"]; ?>>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["division"]; ?></td>
                            <?php
                                $cc_id = $row["cc_id"];
                                $mentor_id = $row["mentor_id"];
                                if($cc_id!=null){
                                    $sql2 = $conn2->prepare("select name from staff where id=?");
                                    $sql2->bind_param("s",$cc_id);
                                    $sql2->execute();
                                    $cc = $sql2->get_result()->fetch_row()[0];
                                }
                                if($mentor_id!=null){
                                    $sql2 = $conn2->prepare("select Name from Staff where EmpID=?");
                                    $sql2->bind_param("s",$mentor_id);
                                    $sql2->execute();
                                    $mentor = $sql2->get_result()->fetch_row()[0];
                                }
                            ?>
                            <td><?php if($cc_id==null){echo "--";}else{echo "{$cc} ({$cc_id})";} ?></td>
                            <td><?php if($mentor_id==null){echo "--";}else{echo "{$mentor} ({$mentor_id})";} ?></td>
                            <!-- <td>
                                <button type="submit" name="edit_btn" id="edit_btn">
                                    <span class="material-icons">
                                        create
                                    </span>
                                </button>
                            </td> -->
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
