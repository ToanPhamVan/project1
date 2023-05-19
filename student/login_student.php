<?php
    include "connection.php";
    include "navbar.php";
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" type ="text/css" href="style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
        
    <section class="login_student_section">
        <form class="login_student_form" name="login" action="" method="post">
            <h1 >Library Management System</h1> <br>
            <h1>User Login Form </h1>
            <div class="login" >
                <input class="form-control" type="text" name="username" placeholder="Username" autocomplete = "off" required> <br>
                <input class="form-control" type="password" name="password" placeholder="Enter your password" autocomplete = "off" required> <br>
                <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px;"> <br>
                <div class="login-footer">
                    <a href="update_password.php">Forgot password</a>
                    <a href="registration.php">Sign up</a>
                </div>          
                </div>    
                 
        </form>
    </section>
    <?php
    if(isset($_POST['submit']))
    {
        $count= 0;
        $res=mysqli_query($db,"SELECT * FROM `student` WHERE username ='$_POST[username]' && password='$_POST[password]';");
        $count=mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if($count==0){
            ?>
            <!-- <script type="text/javascript" >
                alert("The username or password was wrong. ")
            </script> -->
            <div class="alert alert-warning" style="position:relative; background-color:#DC143C;color:#888;height: 45px;max-width:600px;margin: 0px auto; top:-70px;">
                <strong>The username or password was wrong!</strong>
            </div>
            <?php
        }
        else{
            $_SESSION['login_user'] = $_POST['username'];
            $_SESSION['img'] = $row['img'];

            ?>

            <script type="text/javascript">
                window.location="index.php"
            </script>
            <?php
        }
    }
    ?>
</body>
</html>