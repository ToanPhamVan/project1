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
    <title>Document</title>
    <style>
        body{
            background-image: linear-gradient(#ddd6f3,#faaca8);
            height: 100%;

        }

        .add_book_section{
            
            border-radius: 2px;
            /* width: 100%; */
            
            height: 100vh;
            width: auto;
            /* margin-top:-20px; */
            
        }
        .add_book_form{
            margin: 5px auto;
            opacity: 0.6;
            width: 600px;
            height: 600px;
            background-color: black;
            margin-top: 30px;
            
           
        }
        .add_book_input{
            margin: 5px 40px;
        }

        
    </style>
</head>
<header>
    
</header>
<body>
    <section class="add_book_section">
        <form class="add_book_form" name="add_book_form" action="" method="post">
            <h1 style="display:flex;color:white; font-size: 25px;justify-content: center">Add new book </h1>
            <div class="add_book_input">
                <input class="form-control" type="text" name="bid" placeholder="Book Id" required> <br> 
                <input class="form-control" type="text" name="img" placeholder="Book Image Link" required> <br> 
                <input class="form-control" type="text" name="name" placeholder="Book Name" required> <br> 
                <input class="form-control" type="text" name="authors" placeholder="Author Name" required> <br> 
                <input class="form-control" type="text" name="edition" placeholder="Edition " required> <br> 
                <input class="form-control" type="text" name="status" placeholder="Status" required> <br> 
                <input class="form-control" type="text" name="quantity" placeholder="Quantity" required> <br> 
                <input class="form-control" type="text" name="Links" placeholder="Links" required> <br> 

                <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; width: 70px; height: 30px;margin-left:40%"> <br>

            </div>
        </form>  
    </section>

    <?php
        if(isset($_POST['submit'])){
            if(isset($_SESSION['login_user']))
            {
                $bid = mysqli_real_escape_string($db,$_POST['bid']);
                $img = mysqli_real_escape_string($db,$_POST['img']);
                $name = mysqli_real_escape_string($db,$_POST['name']);
                $authors = mysqli_real_escape_string($db,$_POST['authors']);
                $edition = mysqli_real_escape_string($db,$_POST['edition']);
                $status = mysqli_real_escape_string($db,$_POST['status']);
                $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
                $Links = mysqli_real_escape_string($db,$_POST['Links']);

                mysqli_query($db,"INSERT INTO books VALUES ('$bid','$img','$name','$authors','$edition','$status','$quantity','$Links');");
                ?>
                <script type="text/javascript">
                    alert("Book Added Successfully.");
                </script>
                <?php
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
