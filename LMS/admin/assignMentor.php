<?php include("sqlConnection.php");
?>

<?php
    if(isset($_POST["submitType"])){
        $dep = $_POST["department"];
        $year = $_POST["year"];
        session_start();
        $_SESSION["dep"] = $dep;
        $_SESSION["year"] = $year;
    }
    else if(isset($_POST["submitDiv"])){
        session_start();
        $dep = $_SESSION["dep"];
        $year = $_SESSION["year"];
        $div = $_POST["division"];
        $_SESSION["div"] = $div;
    }
    else if(isset($_POST["submitMentors"])){
        session_start();
        $div = $_SESSION["div"];
        $dep = $_SESSION["dep"];
        $year = $_SESSION["year"];
        $mentors = $_POST["mentors"];
        $batches = $_POST["batches"];
        for ($i=0; $i < count($mentors); $i++) {
            $sql2 = $conn2->prepare("update batches set mentor_id=? where name=?");
            $sql2->bind_param("ss",$mentors[$i],$batches[$i]);
            $sql2->execute();
        }
    ?>
        <script type="text/javascript">
            alert("Mentors have been changed successfully!");
        </script>
    <?php } ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel = "stylesheet" href = "css/background.css">
    <link rel = "stylesheet" href = "css/layout.css">

    <style media="screen">
    #c2{
        margin-top: 30px;
        display: grid;
        grid-gap: 10px;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        box-sizing: border-box;
    }
    #c3{
        margin-top: 7vh;
        display: grid;
        grid-template-columns: 23% 10% 40% 17% ;
        grid-gap: 10px;
        width: 100%;
        box-sizing: border-box;
    }
    #setButton{
        margin-top: 7vh;
        margin-right: 7vw;
        float: right;
        height: auto;
        width: auto;
        padding: 10px;
        border-radius: 0;
    }
    </style>
</head>
<body>
    <div class="info">Please select the department and year for getting the corresponding divisions.</div>
    <br>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="selects2btn">
            <select required class="mySelect" name="department" id="dep">
                <option value="" disabled selected>Department</option>
                <?php
                $sql2 = "select distinct department from batches";
                $result = $conn2->query($sql2);
                while ($row = $result->fetch_assoc()) { ?>
                    <option
                        <?php if ((isset($_POST["submitType"]) or isset($_POST["submitDiv"]) or isset($_POST["submitMentors"]))&&($dep == $row["department"])) { ?>selected="true" <?php }; ?>
                    >
                    <?php echo $row["department"]; ?>
                </option>
            <?php }?>
        </select>
        <select required class="mySelect" name="year">
            <option disabled selected>Year</option>
            <?php
            $sql2 = "select distinct year from batches";
            $result = $conn2->query($sql2);
            while($row = $result->fetch_assoc()){ ?>
                <option
                    <?php if ((isset($_POST["submitType"]) or isset($_POST["submitDiv"]) or isset($_POST["submitMentors"]))&&($year == $row["year"])) { ?>selected="true" <?php }; ?>
                >
                <?php echo $row["year"]; ?>
            </option>
        <?php } ?>
    </select>
    <button class="primaryButton" type="submit" name="submitType">SUBMIT</button>
</div>
</form>
<?php if(isset($_POST["submitType"]) or isset($_POST["submitDiv"]) or isset($_POST["submitMentors"])){
    $sql2 = $conn2->prepare("select distinct division from batches where department=? and year=?");
    $sql2->bind_param("ss",$dep,$year);
    $sql2->execute();
    $result = $sql2->get_result();
    ?>
    <br>
        <div class="info">Please select the division for getting the corresponding batches.</div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="c2">
            <div id="tab1" style="grid-column:2" class="tab"><b>Division</b></div>
            <select required name="division">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option <?php if((isset($_POST["submitDiv"]) or isset($_POST["submitMentors"])) and $row["division"]==$div){?> selected="true" <?php } ?>>
                        <?php echo $row["division"]; ?>
                    </option>
                <?php } ?>
            </select>
            <button class="primaryButton" type="submit" name="submitDiv">SUBMIT</button>
        </div>
    </form>
<?php } ?>
<?php if(isset($_POST["submitDiv"]) or isset($_POST["submitMentors"])){
    $sql2 = $conn2->prepare("select name,mentor_id from batches where department=? and year=? and division=?");
    $sql2->bind_param("sss",$dep,$year,$div);
    $sql2->execute();
    $result = $sql2->get_result();
    $sql2 = $conn2->prepare("select Name,EmpID from Staff where Department=?");
    $sql2->bind_param("s",$dep);
    $sql2->execute();
    $staff = $sql2->get_result();
?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <?php while($row = $result->fetch_assoc()){ ?>
            <div id="c3">
                <div class="tab" style="grid-column:2">
                    <b>Batch <?php echo $row["name"]; ?> </b>
                </div>
                <input required value=<?php echo $row["name"]; ?> type="hidden" name="batches[]"/>
                <select required class="mySelect" name="mentors[]">
                        <option disabled selected>Teacher</option>   
                    <?php while($t = $staff->fetch_assoc()){ ?>
                        <option
                            value=<?php echo $t["EmpID"]; ?>
                            <?php if($t["EmpID"]==$row["mentor_id"]){ ?> selected="true" <?php } ?>
                        >
                            <?php echo $t["Name"]; ?>
                        </option>
                    <?php } ?>
                </select>
                <?php $staff->data_seek(0); ?>
            </div>
        <?php } ?>
        <button id="setButton" class="primaryButton" type="submit" name="submitMentors">SET MENTORS</button>
</form>

<?php } ?>
</body>
</html>
