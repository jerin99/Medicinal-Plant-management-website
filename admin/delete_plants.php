<?php

include '../include/connect.php';

if(isset($_POST['submit'])){
    
    $head = $_POST['plant'];
    $sql = "DELETE FROM plants WHERE heading='$head'";
    mysqli_query($conn, $sql);
 
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
                        <h4 class="head-tag">Delete Plants</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 panelBack">
                                    <form action="./delete_plants.php" method="POST" enctype="multipart/form-data"><br><Br>

                                        <?php
                                            $sql = "SELECT * FROM plants";
                                            $result = mysqli_query($conn, $sql);
                                            $rowCount = mysqli_num_rows($result);
                                        ?>
                                        <select name="plant" class="input-txt">
                                            <option value="">Select the plant which you want to delete</option>

                                            <?php
                                                for($i=1; $i<=$rowCount; $i++){
                                                    $row = mysqli_fetch_array($result);
                                            ?>
                                                <option value="<?php echo $row['heading'] ?>"> <?php echo $row['heading'] ?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <input type="submit" name="submit" value="Delete Plants" class="btn btn-primary" style="margin-left: 80%;">
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