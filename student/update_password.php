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
    <title>Update your password</title>
    <style type="text/css">
        body{
            background-color: #00b8ff8c;
            height: 600px;
        }
        .wrapper{
            
            height: 400px;
            width: 400px;
            margin: auto auto;
            background-color: #0400ffb3;
            opacity: 0.6;
            text-align: center;
            
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="" style="text-align: center;">
            <h1 style="color: white;text-align: center;font-size:35px;padding-top: 30px">Change your password</h1><br>
        </div>
        <form  action="" method="post">
           
                <input style="margin-left:45px; width: 300px" sty type="text" name="username" class="form-control" placeholder="Username" required> <br> <br>
                <input style="margin-left:45px; width: 300px" type="email" name="email" class="form-control" placeholder="Email" required><br><br>
                <input style="margin-left:45px; width: 300px" type="password" name="password" class="form-control" placeholder="New password" required><br><br>
            
            <button class="btn btn-default" type="submit" name="submit">Update</button>

        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password = mysqli_real_escape_string($db, $_POST['password']);
        
            $query = "SELECT * FROM student WHERE username='$username' AND email='$email'";
            $result = mysqli_query($db, $query);
        
            if(mysqli_num_rows($result) == 1){
                $update_query = "UPDATE student SET password='$password' WHERE username='$username' AND email='$email'";
                if(mysqli_query($db, $update_query)){
                    ?>
                    <script type="text/javascript" >
                    alert("Success");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript" >
                    alert("Failure");
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script type="text/javascript" >
                alert("Invalid username or email");
                </script>
                <?php
            }
        }
        
    ?>

    
</body>
</html>