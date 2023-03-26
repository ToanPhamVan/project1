<?php
    include "connection.php";
    if(isset($_GET['GetIID'])){
        $id = $_GET['GetIID'];
        $query = "UPDATE issue_book SET status = 'Returned' where issue_id = $id";
        $result = mysqli_query($db,$query);
        
        if(isset($_GET['GetBID'])){
            $b_id = $_GET['GetBID'];
            $query = "UPDATE books set `books`.quantity = quantity + 1 where bid=$b_id";
            mysqli_query($db,$query);
        }
       
        // $d = date('m-d-Y');
        
        // Check if pressed_button_time is set and not empty
        if(isset($_GET['pressed_button_time']) && isset($_GET['expected_time'])){
            $pressed_button_time = $_GET['pressed_button_time'];
            $ex_time =$_GET['expected_time'];
            if($pressed_button_time>$ex_time){
                $query = "UPDATE issue_book SET expired = 'Yes' where issue_id = $id";
            }
            else{
                $query = "UPDATE issue_book SET expired = 'No' where issue_id = $id";
                // $query = "UPDATE books set `books`.quantity = quantity + 1 where bid=$b_id";

            }
            $result = mysqli_query($db,$query);
        }
        
        if($result){
            header("location: issue_book.php");
        }
        else{
            echo "Please check code again";
        }
    }
?>
