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
    <title>Student Signup</title>
    <link rel="stylesheet" type ="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

</head>
<body>
    <!-- <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand active">Library Management System</a>
                </div>

        
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Books</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login_student.php">Student-Login</a></li>
                <li><a href="admin_login.php">Admin-Login</a></li>
            </ul>
            </div>
        </nav>
    </header> -->
    
        <section class="registration_section">
            <form class="registration_form" name="registration_form" action="" method="post">
                <!-- <h1 style="text-align: center; font-size: 25px;">Library Management System</h1> <br> -->
                <br><h1 style="font-size: 25px;">Sign up </h1> <br><br>
                    <div class="registration_form_input">
                            <input class="form-control" type="text" name="firstname" placeholder="First Name" required> <br> <br>
                            <input class="form-control" type="text" name="lastname" placeholder="Last Name" required> <br> <br>
                            <input class="form-control" type="text" name="username" placeholder="Username" required> <br> <br>
                            <input class="form-control" type="password" name="password" placeholder="Enter your password" required> <br><br>
                            <input class="form-control" type="text" name="roll" placeholder="Roll No" required> <br> <br>
                            <input class="form-control" type="email" name="email" placeholder="Enter your email" required> <br> 
                            <input class="btn btn-default" type="submit" name="submit" value="Sign up" style="color: black; width: 70px; height: 30px;"> <br>
                    </div>
                </form>
                
                </div> 
            </div>
        </section>
        <?php
            if(isset($_POST['submit']))
        {
            $count = 0;
            $sql="SELECT username from student";
            $res=mysqli_query($db,$sql);
            while($row=mysqli_fetch_assoc($res)){
                if($row['username']==$_POST['username']){
                    $count = $count + 1;
                }
            }
            if($count==0)
            {
                mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','user.png');");
                ?>
                <script type="text/javascript">
                    alert("Sign up successful");
                </script>
                <?php
            }
            else
            {
            ?>
            <script type="text/javascript">
                alert("The username already exist.");
            </script>
        <?php
        }
    }
    ?>

</body>
</html>