<?php

include '../include/connect.php';

if(isset($_POST['submit'])){
    $target_dir = "plants/";
    $head = $_POST['head'];
    $disease = $_POST['disease'];
    $target = $target_dir . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $desc = $_POST['desc'];
    $scientific_name = $_POST['scientific_name'];
    $binomial_name = $_POST['binomial_name'];
    $family = $_POST['family'];
    $order = $_POST['order'];
    $kingdom = $_POST['kingdom'];
    $rank = $_POST['rank'];
    $higher_classification = $_POST['higher_classification'];
    $uses = $_POST['uses'];
    $wikipedia = $_POST['wikipedia'];

    $sql = "INSERT INTO plants(heading, disease, image, description, scientific_name, binomial_name, family, plant_order, kingdom, ranking, higher_classification, uses, wikipedia) 
    VALUES('$head', '$disease', '$image', '$desc', '$scientific_name', '$binomial_name', '$family', '$order', '$kingdom', '$rank', '$higher_classification', '$uses', '$wikipedia')";
    mysqli_query($conn, $sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Success";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insert Plants</title>
    </head>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./adminStyle.css">
    <link rel="stylesheet" href="./style.css">

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
                        <h4 class="head-tag">Insert Plants</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 panelBack">
                                    <form action="./insert_plants.php" method="POST" enctype="multipart/form-data"><br><Br>

                                        <input type="text" name="head" class="input-txt" placeholder="Enter the heading text"><br><br>
                                        <input type="text" name="disease" class="input-txt" placeholder="Enter the disease"><br><br>
                                        <input type="file" name="image" class="input-txt"><br><br>
                                        <h4 class="plant-txt">Description</h4><br>
                                        <textarea name="desc" cols="10" rows="10" class="input-txt" style="border-style:dashed"></textarea><br><br>
                                        <input type="text" name="scientific_name" class="input-txt" placeholder="Enter the Scientific name"><br><br>
                                        <input type="text" name="binomial_name" class="input-txt" placeholder="Enter the Binomial name"><br><br>
                                        <input type="text" name="family" class="input-txt" placeholder="Enter the Family name"><br><br>
                                        <input type="text" name="order" class="input-txt" placeholder="Enter the Order"><br><br>
                                        <input type="text" name="kingdom" class="input-txt" placeholder="Enter the Kingdom"><br><br>
                                        <input type="text" name="rank" class="input-txt" placeholder="Enter the rank"><br><br>
                                        <input type="text" name="higher_classification" class="input-txt" placeholder="Enter the Higher Classification"><br><br>
                                        <h4 class="plant-txt">Uses</h4><br>                                   
                                        <textarea name="uses" cols="10" rows="10" class="input-txt" style="border-style:dashed"></textarea><br><br>
                                        <input type="text" name="wikipedia" class="input-txt" placeholder="Enter the Wikipedia Link"><br><br>

                                        <input type="submit" name="submit" value="Enter Plants" class="btn btn-primary" style="margin-left: 80%;">
                                    </form>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</html>