<?php

    require_once './include/connect.php';

    if(isset($_POST['submit'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];

        if(!preg_match("/^[A-Za-z]*$/", $fname) || !preg_match("/^[A-Za-z]*$/", $lname) ){
            header ("location: ./register.php?invalid");
        }else{
            if(!filter_var($uname, FILTER_VALIDATE_EMAIL)){
                header("location: ./register.php?email_validity");
            }else{
                $sql = "SELECT * FROM register where uname='$uname'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_fetch_assoc($result)){
                    header("location: ./register.php?emailExist");
                }else{
                    $hash = password_hash($passwd, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO register(fname, lname, uname, passwd) VALUES('$fname', '$lname', '$uname', '$hash')";
                    mysqli_query($conn, $sql);
                    header('Location: ./login.php');
                }
            }
        }

        


    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register Page</title>
    </head>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        body{
            background-image: url('./images/back.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6" class="register-div" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 10px;"><br><br>
                    <h4 class="register-text">Register</h4><br><br>
                    
                    <?php
                        if(isset($_GET['invalid'])){
                            $message=$_GET['invalid'];
                            $message = " Please use valid characters to fill the name ";
                        
                    ?>
                        <div class="alert-danger alert text-center"> <?php echo $message ?> </div>
                    <?php
                        }
                    ?>

                    <?php
                        if(isset($_GET['email_validity'])){
                            $message = $_GET['email_validity'];
                            $message = "Please enter a valid email!";
                    ?>
                        <div class="alert-danger alert text-center"><?php echo $message ?></div>
                    <?
                        }
                    ?>


                    <?php
                        if(isset($_GET['emailExist'])){
                            $message = $_GET['emailExist'];
                            $message = "Email already exists";
                    ?>
                        <div class="alert-danger alert text-center"><?php echo $message ?></div>
                    <?
                        }
                    ?>

                    <form action="" method="POST" name="form-register" onSubmit = "return checkPassword(this)">
                        <input type="text" name="fname" class="login-form" placeholder="First Name" required><br><br>
                        <input type="text" name="lname" class="login-form" placeholder="Last Name" required><br><br>
                        <input type="email" id="email" name="uname" onClick="emailValidate" class="login-form" placeholder="Email" required><br><br>
                        <input type="password" name="passwd" class="login-form" placeholder="Password" required><br><br>
                        <input type="password" name="confirm_passwd" class="login-form" placeholder="Re-type password" required><br><br>
                        <input type="submit" name="submit" value="Register" class="btn btn-primary" style="margin-left: 40%; margin-right: 45%;"><br>
                        <h4 style="font-family: cursive; color: white; font-size: 18px;">Already a registered user?</h4><a href="./login.php" style="color: lightblue;">Sign in</a><br><br>
                    </form>
                </div>
        <div class="col-3"></div>
            </div>
        </div>

        <script>
            function checkPassword(form){
                passw1 = form.passwd.value;
                passw2 = form.confirm_passwd.value;

                if(passw1.length < 8){
                    alert("Please make your password of atleast 8 characters");
                }
                else if(passw1 != passw2){
                    alert("Please enter the same password");
                    return false;
                }   
                else{
                    return true;
                }
            }
        </script>

    </body>

</html>