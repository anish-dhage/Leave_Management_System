<?php session_start(); ?>

<?php include("sqlConnection.php"); ?>

<?php
    if(isset($_POST["logoutButton"])){
        header('location:logout.php');
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Dashboard</title>

        <script src="https://kit.fontawesome.com/fe82330dc9.js" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "css/background.css">
        <link rel = "stylesheet" href = "css/dashboard.css">
        <link rel = "stylesheet" href = "css/layout.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
    </head>


    <body style="background-image: url('images/background1.jpg'); background-size: 100% 100%;">

        <header>
            <img src="images/logo1.png" class="logo_img">
            <b style="float: left;font-size:large">Leave Management</b>
            <b style="margin-left: auto">Admin</b>
            <a href="logout.php"><button class="logout_btn" name="logoutButton" title="Logout"> Logout</button></a>
            <img class="profile_icon" src="images/profile_icon.jpg" title="Profile" onclick="profile()">
            <i class="far fa-question-circle" title="Help"></i>
        </header>


        <?php
            $navlist = ["addNotice" => ["Add Notice","addNotice.php"],
                        "addUser" => ["Add User","addUser.php"],
                        //"assignCC" => ["Assign CC","assignCC.php"],
                        "assignMentor" => ["Assign Mentor","assignMentor.php"],
                        "manageTOL" => ["Manage TOLs","tol.php"],
                        "manageStaff" => ["Manage Staff","manageStaff.php"],
                        "manageBatches" => ["Manage Batches","manageBatches.php"]
                       ];
            $thisPage = "home";
            foreach ($navlist as $key => $value) {
                if(isset($_POST[$key])){
                    $thisPage = $key;
                    session_destroy();
                    break;
                }
            }
        ?>

        <section>
            <nav style="border-right: 1px solid rgb(132, 215, 236); width: 15%; float: left; height: 700px;padding: 5px;">
                <form action="navigation.php" method="post">
                    <table style=" margin-top: 10px; margin-left: 10px; width: 150px;">
                        <?php foreach ($navlist as $key => $value) { ?>
                            <tr class="row">
                                <td>
                                    <button type="submit" class="nav_btn <?php if($thisPage===$key){echo "active";} ?>" name=<?php echo $key; ?>>
                                        <i class="fas fa-feather-alt fa-lg" style="color:  rgb(20, 119, 119); float: left; margin-right: 15px;"></i>
                                        <b><?php echo $value[0]; ?></b>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </nav>

             <!-- <nav style="height: 30px; width: 65% ; margin: 10px; float: left; padding-top: 8px;">
                <button class="function_icon" title="Calendar" onclick="calendar()">
                    <i class="fas fa-calendar-alt fa-2x" style="color: paleturquoise;"></i>
                </button>
                <button class="function_icon" title="Refresh">
                    <i class="fas fa-redo-alt fa-2x" style="color: paleturquoise;"></i>
                </button>
                <button class="function_icon" title="Notes">
                    <i class="fas fa-clipboard fa-2x" style="color: paleturquoise;"></i>
                </button> -->



            </nav>

            <aside>
                <h3 style="padding: 5px;text-align: center;color: white;background-color: rgb(226, 3, 3); letter-spacing: 1.5px; word-spacing: 2px;">Important Notes</h3>
                <ul>
                    <?php

                        $sql2 = "SELECT * FROM notices";
                        $result2 = $conn2->query($sql2);
                        while($row2 = $result2->fetch_assoc()){
                    ?>
                    <li><?php echo $row2["detail"]; ?></li><br>
                <?php } ?>
                </ul>
            </aside>

            <iframe src=<?php echo $navlist[$thisPage][1]; ?> class="request_queue"></iframe>

        </section>

        <footer style="border: 1px solid black; padding: 5px;clear: both;">contact the footer</footer>
    </body>
</html>
