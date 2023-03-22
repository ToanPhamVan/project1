<?php
    require "connection.php";
    if(isset($_POST['update'])){
         $b_id = $_GET['ID'];
         $id = $_POST['bid'];
         $img = $_POST['img'];
         $name = $_POST['name'];
         $authors = $_POST['authors'];
         $edition = $_POST['edition'];
         $status = $_POST['status'];
         $quantity = $_POST['quantity'];
         $Links = $_POST['Links'];
         $query = "UPDATE BOOKS SET bid='".$id."',img='".$img."',name='".$name."',authors='".$authors."',edition='".$edition."',status='".$status."',quantity='".$quantity."',links='".$Links."' WHERE bid='".$b_id."'";
         $result = mysqli_query($db,$query);
         if($result){
            header("location: books.php");
         }
         else{
            echo 'please check your query';
         }
    }
    else{
        header("location: book.php");
    }
?>