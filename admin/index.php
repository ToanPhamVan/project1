<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library management</title>
    <link rel="stylesheet" type ="text/css" href="style.css">
    <style type="textt/css">
    </style>
</head>
<body>
    <div class="wrapper">
        <header class="index-header">
            <div class="logo">
                <img src=".\images\9.png">
                <h1 class="title" style="color: white">Online Library Management System</h1>
            </div>
            <?php
                if (isset($_SESSION['login_user']))
                {?>
                    <nav class="index-nav">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="books.php">Books</a></li>
                            <li><a href="logout.php">Log-out</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                        </ul>
                    </nav> 
                    <?php                   
                }
                
           
               
                else{
                    ?>
                        <nav class="index-nav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="books.php">Books</a></li>
                                <li><a href="login_admin.php">Login</a></li>
                                <!-- <li><a href="">Admin-Login</a></li> -->
                                <li><a href="feedback.php">Feedback</a></li>
                            </ul>
                        </nav>
                        <?php
                }
                ?>
           
        </header>


        <section class="index-section">
            <br><br><br>
            <div class="admin_section_img">
                <div class="box">
                    <br><br><br><br>
                        <h1 style="text-align: center;font-size:30px">Welcome To Library</h1><br><br>
                        <h1 style="text-align: center;font-size:20px ;">Opens at 09:00</h1><br>
                        <h1 style="text-align: center;font-size:20px ;">Close at 15:00</h1>
                </div>
            </div>
        </section>
        <footer class="index-footer">
            <p>
                Email: library@gmail.com
                <br>
                Hotline: 19001234
            </p>
            
            
        </footer>
    </div>
</body>
</html>