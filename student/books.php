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
    </style>
</head>
<body>
    <!-- _____________________Search bar_______________ -->

    <div class="search_bar">
        <form class="navbar-form" method="post" name="form1">
            <div>
                <input class="form-control" type="text" name="search" placeholder="search books..." required>
                <button style="background-color: #20B8F3;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
    </div>

    <h2>List Of Books</h2>

      <div style="overflow:scroll; height: 600px;width: 100%">
        <?php
            if(isset($_POST['submit'])){
                $q=mysqli_query($db, "SELECT * FROM `books` where `name` like '%$_POST[search]%' ");
                if(mysqli_num_rows($q)==0){
                    echo "Sorry! No book found.";
                } else {
                    echo "<table class='table table-bordered table-hover'>";
                        echo "<tr style='background-color: #20B8F3;'>";
                            echo "<th>"; echo "ID" ;echo"</th>";
                            echo "<th>"; echo "Image" ;echo"</th>";
                            echo "<th>"; echo "Book-Name" ;echo"</th>";
                            echo "<th>"; echo "Author" ;echo"</th>";
                            echo "<th>"; echo "Edition" ;echo"</th>";
                            echo "<th>"; echo "Status" ;echo"</th>";
                            echo "<th>"; echo "Quantity" ;echo"</th>";
                            echo "<th style='max-width:100px;'>"; echo "Online Reading";echo"</th>";
                        echo"</tr>";
                    while($row=mysqli_fetch_assoc($q)) {
                        echo "<tr>";
                            echo "<td>"; echo $row['bid']; echo "</td>";
                            echo "<td>"; ?> <img class="img-rounded" style="width: 100px;height:100px;"src="images/<?php echo $row['img'];?>" alt=""> <?php echo "</td>";
                            echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['authors']; echo "</td>";
                            echo "<td>"; echo $row['edition']; echo "</td>";
                            echo "<td>"; echo $row['status']; echo "</td>";
                            echo "<td>"; echo $row['quantity']; echo "</td>";
                            echo "<td>"; ?> <a style="max-width:150px" href=<?php echo $row['Links'];?>>Click here</a> <?php echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

            } else {
                $res=mysqli_query($db,"SELECT * FROM `books` order by `books`.`name` ASC;");
                echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #20B8F3;'>";
                        echo "<th>"; echo "ID" ;echo"</th>";
                        echo "<th style='hegiht: 70px; width: 60px'>"; echo "Image" ;echo"</th>";
                        echo "<th>"; echo "Book-Name" ;echo"</th>";
                        echo "<th>"; echo "Author" ;echo"</th>";
                        echo "<th>"; echo "Edition" ;echo"</th>";
                        echo "<th>"; echo "Status" ;echo"</th>";
                        echo "<th>"; echo "Quantity" ;echo"</th>";
                        echo "<th style='max-width:100px;'>"; echo "Online Reading";echo"</th>";  
                    echo"</tr>";

                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row['bid']; echo "</td>";
                            echo "<td>"; ?> <img class="img-rounded" style="width: 100px;height:100px;"src="images/<?php echo $row['img'];?>" alt=""> <?php echo "</td>";
                            echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['authors']; echo "</td>";
                            echo "<td>"; echo $row['edition']; echo "</td>";
                            echo "<td>"; echo $row['status']; echo "</td>";
                            echo "<td>"; echo $row['quantity']; echo "</td>";
                            echo "<td>"; ?> <a style="max-width:150px" href=<?php echo $row['Links'];?>>Click here</a> <?php echo "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }
        ?>
      </div>
</body>
</html> 

