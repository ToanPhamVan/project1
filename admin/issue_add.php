<?php

use function PHPSTORM_META\sql_injection_subst;

    include "navbar.php";
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add issue</title>
    <style>
        body{
            height: 100vh;
            width: 100%;
        }
        .issue_form{
            
            margin: 5px auto;
            opacity: 0.6;
            max-width: 600px;
            height: 500px;
            background-color: black;
            margin-top: 30px;
            
            
        }
        
        .form-control {
            display: flex;
            /* justify-content: center; */
           
        }
        
    </style>
</head>
<body>
    <form method="post" class="issue_form" action="">
        <h1 style="text-align:center;color: white">Add new book issue</h1>
        <div class="issue_form_input" style="height: 400px; width: 300px; text-align: center">
            <input class="form-control" style=" margin: 40px auto 0px 50%;" type="text" name="issue_id" placeholder="Issue Id" required> 
            <input class="form-control" style=" margin: 40px auto 0px 50%;" type="text" name="id" placeholder="Student Id" required> 
            <input class="form-control" style=" margin: 40px auto 0px 50%;" type="text" name="bid" placeholder="Book Id" required>
            <label  for="issue" style="margin: 15px auto 0 25%;" >Issue Time</label> 
            <input class="form-control" style=" margin: 0px auto 15px 50%;" type="date" name="issue_time"  min="2023-01-01" max="2030-12-31" required>
            <label for="return" style="margin: 8px auto 0px 25%;">Return Time</label> 
            <input class="form-control" style=" margin: 0px auto 20px 50%;" type="date" name="return_time" min="2023-01-01" max="2030-12-31" required> <br>   
            <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; width: 70px; height: 30px; margin: 5px auto 0px 85%;"> <br> 

        </div>
        
    </form>
    <?php
        

        if(isset($_POST['submit']))
        {
            if(isset($_SESSION['login_user']))
            {
            $count= 0;
            $res=mysqli_query($db,"SELECT * FROM `student`,`books` WHERE roll ='$_POST[id]' && bid='$_POST[bid]';");
            $count=mysqli_num_rows($res);
            $row = mysqli_fetch_assoc($res);
            if($count==0){
                ?>
                <!-- <script type="text/javascript" >
                    alert("The username or password was wrong. ")
                </script> -->
                <div class="alert alert-warning" style="position:relative; background-color:#DC143C;color:#888;height: 45px;max-width:600px;margin: 60px auto; top:-70px;">
                    <strong style="color: white">The student or book doesn't exist</strong>
                </div>
                <?php
            }
            elseif($row['quantity']==0){
                ?>
                <div class="alert alert-warning" style="position:relative; background-color:#DC143C;color:#888;height: 45px;max-width:600px;margin: 60px auto; top:-70px;">
                    <strong style="color: white">The book is not available</strong>
                </div>
                <?php
            }
                else{
                mysqli_query($db,"INSERT INTO `issue_book` VALUES('$_POST[issue_id]','$_POST[id]','$_POST[bid]','$_POST[issue_time]','$_POST[return_time]',DEFAULT, DEFAULT)");
                mysqli_query($db,"UPDATE `books` SET `quantity`= books.quantity-1 WHERE bid = $_POST[bid]");
                header("location: issue_book.php");
                ?>
                <!-- <script type="text/javascript">
                alert("Add issue book successfully");
                </script> -->
                <?php
            }
            
            }
            else{
                ?>
                <script type="text/javascript">
                    alert("You need to login first");
                </script>

                <?php
                 
            }
        }
        ?>
    
</body>
</html>