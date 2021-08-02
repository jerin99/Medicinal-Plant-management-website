<?php

    require_once './include/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Our Search</title>
</head>
<link rel="stylesheet" href="./css/css/bootstrap.min.css">
<link rel="stylesheet" href="./style.css">
<body>

    <?php require './navigation.php'; ?>

    <div class="container-fluid">
        <div class="row new_arrivals_div">

            <?php

                $sql = "SELECT * FROM plants ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                    echo "<div class='col new_arrival_col1'>";

                        echo "<div class='card1 middle1'>";

                            echo "<div class='front'>";
                                echo "<img src='./admin/plants/" .$row['image']. "' class='new_arrival_image'>";
                            echo "</div>";
                            echo "<div class='back'>";
                                echo "<div class='back-content middle1'>";
                                ?>
                                    <a href="./details.php?pid=<?php echo $row['heading'] ?>"> <?php echo "<h4 class='plant_name'>" .$row['heading']. "</h4><br><br>" ?> </a>
                                <?php
                                    echo "<h4 class='plant-desc'>Disease : " .$row['disease']. "</h4>";
                                    echo "<h4 class='plant-desc'>Scientific Name : " .$row['scientific_name']. "</h4>";
                                    echo "<h4 class='plant-desc'>Binomial Name : " .$row['binomial_name']. "</h4>";
                                    echo "<h4 class='plant-desc'>Kingdom : " .$row['kingdom']. "</h4>";
                                echo "</div>";
                            echo "</div>";

                        echo "</div>";

                    echo "</div>";
                }

            ?>

        </div>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php require './bottomBar.php'; ?>

</body>
</html>