<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

</head>
<body>
    <header>
        <?php
        if(isset($_SESSION['login_user']))
        {?>


            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                
                    <div class="navbar-header">
                        <a class="navbar-brand active"><img style="width:30px;height:30px; margin:-5px -15px 12px 0;" src="./images/library.png" alt=""></a>
                    </div>

            
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Online Library Management</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <!-- <li><a href="students.php">Student-Infomation</a></li> -->
                    <!-- <li><a href="profile.php">Profile</a></li> -->


                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="profile.php"><div style="color: white;">
                    <?php
                        echo "<img class='img-circle profile_img' style='width: 30px;height:30px;'  src='images/".$_SESSION['img']."'>";
                        echo " " .$_SESSION['login_user'];
                        ?>
                    </div></a></li>
                    
                    <li><a href="logout.php">Logout</a></li>

                    <!-- <li><a href="registration.php">SIGN UP</a></li> -->

                </ul>
                </div>
            </nav>
        <?php
        }
        else{?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand active"><img style="width:30px;height:30px; margin:-5px -15px 12px 0;" src="./images/library.png" alt=""></a>
                    </div>

            
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Online Library Management</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="feedback.php">Feedback</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login_student.php">Login</a></li>
                    <!-- <li><a href="logout.php">LOGOUT</a></li> -->
                    <li><a href="registration.php">Sign Up</a></li>

                </ul>
                </div>
            </nav>
        <?php
        }
        ?>
        
        
    </header>
    
</body>
