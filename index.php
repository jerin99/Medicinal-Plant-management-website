<?php

    require_once './include/connect.php';
    session_start();   

    if(isset($_SESSION['fname'])){
        $fname = $_SESSION['fname'];
    }else{
        $fname = "Guest";
    }

    if(isset($_POST['submit'])){
        header ('Location: ./search.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Roborant</title>
    </head>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <body>
        
        <div class="top-image">
            <div class="container-fluid">
                <ul class="navigation-list">
                    <li class="lists">Home</li>
                    <li class="lists">More</li>
                    <li class="lists">About</li>
                    <li class="lists">Contact</li>
                    
                    <?php  
                        if($fname=="Guest"){
                            echo "<a href='./login.php'>";
                            echo "<li class='lists' style='margin-left:60%'>";
                            echo $fname; 
                            echo "</li>";
                            echo "</a>";
                            
                        }else{
                            echo "<li class='lists' style='margin-left:60%'>";
                            echo $fname; 
                            echo "</li>";
                        }
                    ?>
                </ul>
            </div>
            <?php
                        if(isset($_SESSION['fname'])){  
                    ?>
                        <a href="./logout.php"><button class="logout-button btn btn-danger">Log</button></a>
                    <?php
                        }
                    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-8">

                        <form action="" method="POST">
                            <input type="search" name="search-bar" placeholder="Search your desired medicine" class="search-bar">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="Search">
                        </form>

                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
<!---------------------------------------------------------------Navigation Bar Closed-------------------------------------------->
<br><br><br>
    <div class="container">
        <div class="row">

            
            <?php

                $sql = "SELECT * FROM first_section ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                    echo "<div class='col-6'>";
                        echo "<img src='./admin/first_section/" .$row['image']. "' class='first-image'>";
                    echo "</div>";
                    echo "<div class='col-6'>";
                        echo "<h3>".$row['head']."</h3>";
                        echo "<p class='first-desc'>" .$row['description']. "</p>";
                    echo "</div>";
                }

            ?>

        </div>
    </div>
<!-----------------------------------------------------------------First Section End-------------------------------------->
    <br><br><br>
    <h2 class="main_head">Our New Search</h2><br>
    <div class="container">
        <div class="row new_arrivals_div">  

            <?php

                $sql = "SELECT * FROM plants ORDER BY id DESC LIMIT 4";
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

    <br><br><br><br><br><br><br><br>  <br><br>
    </body>
</html>
                        