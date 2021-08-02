<?php

    session_start();

    require_once './include/connect.php';

    $pid = $_GET['pid'];

    $sql = "SELECT * FROM plants WHERE heading LIKE '$pid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $disease = $row['disease'];
        $name = $row['heading'];
        $link = $row['wikipedia'];
    }

        if(isset($_POST['submit'])){
            if(isset($_SESSION['fname'])){
                $userName = $_SESSION['fname'];
                $review = $_POST['reviews'];
                $sql = "INSERT INTO reviews(name, plantName, review) VALUES('$userName', '$name', '$review')";
                mysqli_query($conn, $sql);
            }else{
                echo "<script> alert('You must login first to review') </script>";
            }
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $name ?></title>
    </head>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">

    <body>

       <?php require './navigation.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <?php
                        $sql = "SELECT * FROM plants WHERE heading LIKE '$pid'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<img src='./admin/plants/" .$row['image']. "' class='details-image'>";                        
                            echo "</div>";
                            echo "<div class='col-7'>";
                            echo "<h4 class='detail-head'>" .$row['heading']. "</h4><br><br>";
                            echo "<h4 class='detail-description'>Disease &nbsp;&nbsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['disease']. "</h4>";
                            echo "<h4 class='detail-description'>Scientific Name &numsp;&numsp;&numsp;&numsp;&numsp;&nbsp;:&numsp;&numsp;&numsp;&numsp;" .$row['scientific_name']. "</h4>";
                            echo "<h4 class='detail-description'>Binomial Name &numsp;&numsp;&numsp;&numsp;&numsp;&nbsp;&nbsp;&nbsp;&nbsp;:&numsp;&numsp;&numsp;&numsp;" .$row['binomial_name']. "</h4>";
                            echo "<h4 class='detail-description'>Family  &nbsp;&nbsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['family']. "</h4>";
                            echo "<h4 class='detail-description'>Kingdom  &nbsp;&nbsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['kingdom']. "</h4>";
                            echo "<h4 class='detail-description'>Order  &nbsp;&nbsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['plant_order']. "</h4>";
                            echo "<h4 class='detail-description'>Rank  &nbsp;&nbsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['ranking']. "</h4>";
                            echo "<h4 class='detail-description'>Higher Classification&nbsp;&numsp;&numsp;&numsp;&numsp;:&numsp;&numsp;&numsp;&numsp;" .$row['higher_classification']. "</h4>";
                        
                    ?>
                </div>
            </div>
            <div class="row">
                &numsp;&numsp;&numsp;&numsp;&numsp;<h4 class="detail-head">Description</h4><br><br>
            <?php
                echo "<h4 class='description'>" .$row['description']. "</h4>";
            ?>
            </div>
            <div class="row">
                &numsp;&numsp;&numsp;&numsp;&numsp;<h4 class="detail-head">Uses</h4><br><br>
            <?php
                echo "<h4 class='description'>" .$row['uses']. "</h4>";
                        }
            ?>
            </div><br><br>
            <a href="<?php echo $link ?>"><button class="btn btn-danger" style="margin-left: 60%;">Click to View More about <?php echo $name ?></button></a>
        </div>
<br><br><br><br>
        <div class="container">
            <h4 class="detail-head">Related to Your Search</h4><br><br>
            <div class="row new_arrivals_div" style="border-radius: 10px;">
                <?php
    
                    $sql = "SELECT * FROM plants WHERE disease='$disease' LIMIT 4";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='col new_arrival_col'>";
    
                            echo "<div class='card middle'>";
    
                                echo "<div class='front'>";
                                    echo "<img src='./admin/plants/" .$row['image']. "' class='new_arrival_image'>";
                                echo "</div>";
                                echo "<div class='back'>";
                                    echo "<div class='back-content middle'>";
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
        <br><br><br>
<!---------------------------------------------Review Section Start------------------------------------->
        <div class="container">
            <h4 class="detail-head">Reviews</h4>
            <div class="row">
            <?php 
                $sql = "SELECT * FROM reviews WHERE plantName='$name'";
                $result = mysqli_query($conn, $sql);
                $rowNum = mysqli_num_rows($result);
                if($rowNum==0){
                    echo "No reviews Yet";
                }else{
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='col reviewsDiv'>";
                        echo "<h4 class='reviewer'>" .$row['name']. "</h4>";
                        echo "<h4 class='reviewed'>" .$row['review']. "</h4>";
                        echo "</div>";
                    }
                }
            ?>
            </div>
        </div>

        <div class="container">
            <h4 class="detail-head">Write a Review</h4><br>
            <form action="" method="POST">
                <textarea name="reviews" cols="100" rows="8" class="review"></textarea><br><br> 
                <input type="submit" name="submit" value="Submit" class="btn btn-info">
            </form>    
        </div>

<!--------------------------------------------------------Bottom Navigation----------------------------->

        <?php require './bottomBar.php'; ?>

    </body>
</html>