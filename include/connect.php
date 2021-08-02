<?php

    $local = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "roborant";

    $conn = mysqli_connect($local, $user, $pass, $dbname);

    if(!$conn){
        die("Cannot connect to the database".mysqli_error());
    }else{
        echo "Your connection is success";
    }

?>