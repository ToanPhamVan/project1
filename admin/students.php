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
    <title>Student Information</title>
    <style type="text/css">
        .search_bar{
            float: right;
        }
    </style>
</head>
<body>
    <!-- _____________________Serach bar_______________ -->

    <div class="search_bar">
        <form class="navbar-form" method="post" name="form1">
            <div>
                <input class="form-control" type="text" name="search" placeholder="search students..." required>
                <button style="background-color: #b5b733;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
            
        </form>
            
    </div>
    <h2>List Of Students</h2>
     <?php

        if(isset($_POST['submit'])){
            $q=mysqli_query($db, "SELECT firstname, lastname, username, roll, email from student where `username` like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0){
                echo "Sorry! No student found.";
            }
            else {
                echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #b5b733;'>";
                        echo "<th>"; echo "First Name" ;echo"</th>";
                        echo "<th>"; echo "Last Name" ;echo"</th>";
                        echo "<th>"; echo "User Name" ;echo"</th>";
                        // echo "<th>"; echo "Edition" ;echo"</th>";
                        echo "<th>"; echo "Roll" ;echo"</th>";
                        echo "<th>"; echo "Email" ;echo"</th>";
                        // echo "<th style='max-width:100px;'>"; echo "Online Reading";echo"</th>";
                    echo"</tr>";
                while($row=mysqli_fetch_assoc($q))
                {
                    echo"<tr>";
                        // echo "<td>" ;echo $row['bid'];echo "</td>";
                        echo "<td>" ;echo $row['firstname'];echo "</td>";
                        echo "<td>" ;echo $row['lastname'];echo "</td>";
                        echo "<td>" ;echo $row['username'];echo "</td>";
                        echo "<td>" ;echo $row['roll'];echo "</td>";
                        echo "<td>" ;echo $row['email'];echo "</td>";
                        // echo "<td>" ;echo '<a style="max-width:150px"; href= "">'.$row['Links']; echo'</a>';echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

        }
        else
        {
            $res=mysqli_query($db,"SELECT * FROM `student` order by `student`.`username` ASC;");
            echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #b5b733;'>";
                        echo "<th>"; echo "First Name" ;echo"</th>";
                        echo "<th>"; echo "Last Name" ;echo"</th>";
                        echo "<th>"; echo "User Name" ;echo"</th>";
                        // echo "<th>"; echo "Edition" ;echo"</th>";
                        echo "<th>"; echo "Roll" ;echo"</th>";
                        echo "<th>"; echo "Email" ;echo"</th>";
                        // echo "<th style='max-width:100px;'>"; echo "Online Reading";echo"</th>";
                    echo"</tr>";
            while($row=mysqli_fetch_assoc($res))
            {
                echo"<tr>";
                // echo "<td>" ;echo $row['bid'];echo "</td>";
                    echo "<td>" ;echo $row['firstname'];echo "</td>";
                    echo "<td>" ;echo $row['lastname'];echo "</td>";
                    echo "<td>" ;echo $row['username'];echo "</td>";
                    echo "<td>" ;echo $row['roll'];echo "</td>";
                    echo "<td>" ;echo $row['email'];echo "</td>";
                // echo "<td>" ;echo '<a style="max-width:150px"; href= "">'.$row['Links']; echo'</a>';echo "</td>";
                echo "</tr>";
        }
             echo "</table>";
    }
        ?> 

</body>
</html>