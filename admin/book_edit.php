<?php
    // include "books.php";
    include "connection.php";
    include "navbar.php";
    $b_id=$_GET['GetID'];
    $query = "SELECT * FROM BOOKS WHERE bid='".$b_id."'";
    $result = mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc($result)){
        $bid = $row['bid'];
        $img = $row['img'];
        $name = $row['name'];
        $authors = $row['authors'];
        $edition = $row['edition'];
        $status = $row['status'];
        $quantity = $row['quantity'];
        $link = $row['Links'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Edit</title>
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
        <form class="add_book_form" name="add_book_form" action="book_update.php?ID=<?=$bid?>" method="post">
            <h1 style="display:flex;color:white; font-size: 25px;justify-content: center">Edit Book</h1>
            <div class="add_book_input">
                <input class="form-control" type="text" name="bid" placeholder="Book Id" value="<?=$bid?>" required> <br> 
                <input class="form-control" type="text" name="img" placeholder="Book Image Link" value="<?=$img?>" required> <br> 
                <input class="form-control" type="text" name="name" placeholder="Book Name" value="<?=$name?>" required> <br> 
                <input class="form-control" type="text" name="authors" placeholder="Author Name" value="<?=$authors?>" required> <br> 
                <input class="form-control" type="text" name="edition" placeholder="Edition " value="<?=$edition?>" required> <br> 
                <input class="form-control" type="text" name="status" placeholder="Status" value="<?=$status?>" required> <br> 
                <input class="form-control" type="text" name="quantity" placeholder="Quantity" value="<?=$quantity?>" required> <br> 
                <input class="form-control" type="text" name="Links" placeholder="Links"value="<?=$link?>" required> <br> 
                <input class="btn btn-default" type="submit" name="update" value="Edit" style="color: black; width: 70px; height: 30px;margin-left:40%"> <br>

            </div>
        </form>  
    </section>

    <?php
        
    ?>
    
    
</body>
</html>
