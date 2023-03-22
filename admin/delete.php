<?php
    require "connection.php";
    if(isset($_GET['Del'])){
        $id = $_GET['Del'];
        $query = "DELETE FROM BOOKS where bid='".$id."'";
        $result = mysqli_query($db,$query);
    }
    if($result){
        header("location: books.php");
    }
    else{
        echo "Please check code again";
    }
?>