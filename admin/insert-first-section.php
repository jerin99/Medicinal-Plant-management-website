<?php

include '../include/connect.php';

if(isset($_POST['submit'])){
    $target_dir = "first_section/";
    $head = $_POST['head'];
    $target = $target_dir . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO first_section(head, image, description) VALUES('$head', '$image', '$desc')";
    mysqli_query($conn, $sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Success";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insert First Section</title>
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
                        <h4 class="head-tag">Insert First Section</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 panelBack">
                                    <form action="./insert-first-section.php" method="POST" enctype="multipart/form-data"><br><Br>
                                        <input type="text" name="head" class="input-txt" placeholder="Enter the heading text"><br><br>
                                        <input type="file" name="image" class="input-txt"><br><br>
                                        <textarea name="desc" cols="10" rows="10" class="input-txt" style="border-style:dashed"></textarea><br><br>
                                        <input type="submit" name="submit" value="Submit First Section" class="btn btn-primary" style="margin-left: 80%;">
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