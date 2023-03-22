<?php 
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            height: 450px;
            margin: 0 auto;
            color: white;
            background-color: #7233b7c7;
            border-radius: 5px;
            opacity: .8;
        }

    </style>
</head>
<body style="background-color: #33b79f; min-width: 600px;">
        <div class="container">
            <form action="" method="post">
                <button class="btn btn-default" style="float: right; width: 70px" name="submit1">Edit</button>
            </form>
        </div>
        <div class="wrapper">
            <?php
            $q = mysqli_query($db,"SELECT * FROM STUDENT where username='$_SESSION[login_user]';");
            ?>
            <h2 style= "text-align:center;">My Profile</h2>
            <?php
                $row = mysqli_fetch_assoc($q);
                echo "<div style='text-align: center'>
                    <img class='img-circle profile_img' style='width:80px;' src='images/".$_SESSION['img']."'>
                </div>";
            ?>
            <div style="text-align:center;">
            <h4>
                <?=$_SESSION['login_user']?>

            </h4>

            </div>
            <?php
                echo "<div>";
           
                echo "<table class='table table-bordered'>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> First Name: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['firstname'];
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Last Name: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['lastname'];
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> User name: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['username'];
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Password: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['password'];
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Roll: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['roll'];
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<b> email: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $row['email'];
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
              echo "</div>";
            ?>


                        
                            
            

        

        
        </div>
</body>
</html>