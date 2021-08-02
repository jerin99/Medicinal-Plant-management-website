<?php

    if(isset($_SESSION['fname'])){
        $fname = $_SESSION['fname'];
    }else{
        $fname = "Guest";
    }


?>
<div class="navigationBar sticky-top">
            <div class="container-fluid">
                <ul class="navigation-list">
                    <a href="./index.php"><li class="list">Home</li></a>
                    <li class="list">More</li>
                    <li class="list">About</li>
                    <li class="list">Contact</li>

                    <?php  
                        if($fname=="Guest"){
                            echo "<a href='./login.php'>";
                            echo "<li class='list' style='margin-left:60%'>";
                            echo $fname; 
                            echo "</li>";
                            echo "</a>";
                            
                        }else{
                            echo "<li class='list' style='margin-left:60%'>";
                            echo $fname; 
                            echo "</li>";
                        }
                    ?>

                </ul>
            </div>
</div>