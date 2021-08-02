<?php

    require_once '../include/connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin || Dashboard</title>
    </head>
    <style>
        body{
            background-image: url('./back.jpg');
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./adminStyle.css">

    <div class="top-bar">
        <h4 class="dash">Dashboard</h4>
        <a href="./logout.php"><input type="button" name="button" value="Logout" class="logout btn btn-primary"></a>
    </div>

<!----------------------------------------------------------Top Bar End------------------------------------------>

    <section>
        <div class="container-fluid">
            <div class="row">
                <?php require './sidebar.php';  ?>
                <div class="col-md-9">
                    <h4 style="font-family: cursive; font-size: 30px; padding: 30px; color: white;">Website Overview</h4>
                    <div class="col-3">
                        <div class="card admin-cards">
                            <div class="card admin-head-card">
                                <h4 class="admin-card-head-text">Plants</h4>
                            </div>
                            <h4 class="admin-card-text">
                                <?php
                                    $sql = "SELECT COUNT(id) FROM plants";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                        echo $row['COUNT(id)'];
                                    }
                                ?>
                            </h4>
                        </div>
                    </div><br><br>

                    <div class="row">
                    <?php
                        $sql = "SELECT DISTINCT disease FROM plants";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $dis = $row['disease'];
                            echo "<div class=col-3>";
                                echo "<div class='card admin-cards'>";
                                    echo "<div class='card admin-head-card'>";
                                        echo "<h4 class='admin-card-head-text'>" .$row['disease']. "</h4>";
                                    echo "</div>";
                                    echo "<h4 class='admin-card-text'>";
                                        $query = "SELECT disease FROM plants WHERE disease='$dis'";
                                        $query_result = mysqli_query($conn, $query);
                                        $rowNums = mysqli_num_rows($query_result);
                                            echo $rowNums;
                                        
                                    echo "</h4>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

</html>