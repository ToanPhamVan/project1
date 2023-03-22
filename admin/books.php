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
    
    <title>Books</title>
    <style type="text/css">
        .search_bar{
            float: right;
        }
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        </style>

</head>
<body>
    <!--  ___________side nav_____________-->

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="side_nav_book_img" style="margin-left:5vh;margin-bottom:20px;"><br>

        <?php 
            if(isset($_SESSION['login_user']))
                {
                    echo "<img class='img-circle profile_img' style='width: 100px;height:100px;'  src='images/".$_SESSION['img']."'>"; 
                    echo"<br>";
                    echo $_SESSION['login_user'];
                }
            ?>
                
        </div>
        <a href="profile.php">Profile</a>
        <a href="book_add.php">Add Books</a>
        <a href="#">Delete Request</a>
        <a href="issue_book.php">Issue Information</a>
        </div>  

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        <div class="search_bar">
        <form class="navbar-form" method="post" name="form1">
            <!-- ___________________Search bar____________________  -->
            <div>
                <input class="form-control" type="text" name="search" placeholder="search books..." required>
                <button style="background-color: #b5b733;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
            
        </form>
            
    </div>
    <h2>List Of Books</h2>
     <?php
        
        if(!isset($_SESSION['login_user']))
        {
            if(isset($_POST['submit'])){
                $q=mysqli_query($db, "SELECT * FROM `books` where `name` like '%$_POST[search]%' ");
                if(mysqli_num_rows($q)==0){
                echo "Sorry! No book found.";
                }
                else {
                    ?>
                    <table class="table table-bordered table-hover">
                        <tr style="background-color: #b5b733;">
                            <th>ID </th>
                            <th>Image</th>
                            <th>Book-Name</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th style="max-width:100px">Online Reading</th>
                        </tr>
                <?php
                }
                while($row=mysqli_fetch_assoc($q))
                {
                    if($row['quantity']==0) {
                        mysqli_query($db,"UPDATE `books` SET `status`='Not Available' WHERE quantity =0;");
                    }
                    ?>
                    <tr>

                         <td><?=$row['bid']?></td>
                         <td><img class="img-rounded" style="width: 100px;height:100px;"src="images/<?=$row['img']?>" alt=""></td>
                         <td><?=$row['name']?> </td>
                         <td><?=$row['authors']?> </td>
                         <td><?=$row['edition']?> </td>
                         <td><?=$row['status']?> </td>
                         <td><?=$row['quantity']?> </td>
                         <td><a style="max-width:150px" href=<?=$row['Links']?>>Click here</a></td>
                     </tr>
                     <?php
                }
                ?>
                    </table>
                <?php
            }

            else{
                $res=mysqli_query($db,"SELECT * FROM `books` order by `books`.`bid` ASC;");
                ?>
                <table class="table table-bordered table-hover">
                        <tr style="background-color: #b5b733;">
                            <th>ID </th>
                            <th>Image</th>
                            <th>Book-Name</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th style="max-width:100px">Online Reading</th>
                        </tr>
                <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    
                    if($row['quantity']==0) {
                        mysqli_query($db,"UPDATE `books` SET `status`='Not Available' WHERE quantity =0;");
                    }
                    else{
                        mysqli_query($db,"UPDATE `books` SET `status`='Available' WHERE quantity > 0;");

                    }
                    ?>
                    <tr>
                         <td> <?=$row['bid']?> </td>
                         <td> <img class="img-rounded" style="width: 100px;height:100px;"src="images/<?=$row['img']?>" alt=""></td>
                         <td>  <?=$row['name']?> </td>
                         <td>  <?=$row['authors']?> </td>
                         <td>  <?=$row['edition']?> </td>
                         <td>  <?=$row['status']?> </td>
                         <td>  <?=$row['quantity']?> </td>
                         <td>  <a style="max-width:150px" href=<?=$row['Links']?>>Click here</a></td>
                     </tr>
                     <?php
                }
                ?>
                    </table>
                    <?php
        }
    }

    
            
        
    //    __book after login
        if(isset($_SESSION['login_user']))
        {
            if(isset($_POST['submit'])){
                $q=mysqli_query($db, "SELECT * FROM `books` where `name` like '%$_POST[search]%' ");
                if(mysqli_num_rows($q)==0){
                echo "Sorry! No book found.";
                }
            // echo "<th>"; echo "<button type='submit' name='delete' class='btn btn-danger' onclick='location.reload()'>Delete</button>"; echo"</th>";
                
                else{
                    
                    ?>
                    <table class="table table-bordered table-hover">
                        <tr style="background-color: #b5b733;">
                            <th>ID </th>
                            <th>Image</th>
                            <th>Book-Name</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th style="max-width:100px">Online Reading</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                <?php
                
                while($row=mysqli_fetch_assoc($q))
                {
                    $b_id= $row['bid'];
                    
                    if($row['quantity']==0) {
                        mysqli_query($db,"UPDATE `books` SET `status`='Not Available' WHERE quantity =0;");
                    }
                    ?>
                    ?>
                    <tr>
                         <td><?=$row['bid']?> </td>
                         <td><img class="img-rounded" style="width: 100px;height:100px;"src="images/<?=$row['img']?>" alt=""></td>
                         <td><?=$row['name']?> </td>
                         <td><?=$row['authors']?> </td>
                         <td><?=$row['edition']?> </td>
                         <td><?=$row['status']?> </td>
                         <td><?=$row['quantity']?> </td>
                         <td><a style="max-width:150px" href=<?=$row['Links']?>>Click here</a></td>
                         <td><a href="book_edit.php?GetID=<?=$b_id?>"><button type="button" class="btn btn-warning">Edit</button></a></td>
                         <td><a href="delete.php?Del=<?=$b_id?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

                     </tr>
                     </table>
                     <?php
                }
            }
        }
            else{
                $res=mysqli_query($db,"SELECT * FROM `books` order by `books`.`bid` ASC;");
                ?>
                <table class="table table-bordered table-hover">
                        <tr style="background-color: #b5b733;">
                            <th>ID </th>
                            <th>Image</th>
                            <th>Book-Name</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th style="max-width:100px">Online Reading</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    
                    if($row['quantity']==0) {
                        mysqli_query($db,"UPDATE `books` SET `status`='Not Available' WHERE quantity =0;");
                    }
                    else{
                        mysqli_query($db,"UPDATE `books` SET `status`='Available' WHERE quantity > 0;");

                    }
                    $b_id= $row['bid'];
                    ?>
                    
                    <tr>

                         <td><?=$row['bid']?> </td>
                         <td><img class="img-rounded" style="width: 100px;height:100px;"src="images/<?=$row['img']?>" alt=""></td>
                         <td><?=$row['name']?> </td>
                         <td><?=$row['authors']?> </td>
                         <td><?=$row['edition']?> </td>
                         <td><?=$row['status']?> </td>
                         <td><?=$row['quantity']?> </td>
                         <td><a style="max-width:150px" href=<?=$row['Links']?>>Click here</a></td>
                         <td><a href="book_edit.php?GetID=<?=$b_id?>"><button type="button" class="btn btn-warning">Edit</button></a></td>
                         <td><a href="delete.php?Del=<?=$b_id?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                     </tr>
                     <?php
                }
                ?>
                    </table>
                    <?php
            }
                   
        }
        ?> 
    
    </div>


    

    
    <!-- _____________________Serach bar_______________ -->

    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
    }
    </script>
   

</body>
</html>