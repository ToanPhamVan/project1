<?php
    include "navbar.php";
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new issue book</title>
    <style>
        .navbar-form{
            float: right;
        }
    </style>
</head>
<body>
    <form class="navbar-form" method="post" name="form1">
            <!-- ___________________Search bar____________________  -->
        <div>
            <input class="form-control" type="text" name="search" placeholder="search ..." required>
            <button style="background-color: #b5b733;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
            
    </form>
    <!-- ---------- Add new issue book-------- -->
    <a  href="issue_add.php"><button type="button" class="btn btn-success">Add</button></a>
    <?php
    $res = mysqli_query($db,"SELECT issue_book.issue_id,issue_book.status,issue_book.expired,issue_book.issue_time,issue_book.return_time,issue_book.fine,student.roll,student.username,books.name,books.bid FROM ((issue_book INNER JOIN books ON issue_book.bid = books.bid) INNER JOIN student ON student.roll = issue_book.id);");
        if(isset($_POST['submit'])){
            $q=mysqli_query($db, "SELECT * FROM `issue_book` where `issue_id` like '%$_POST[search]%'");
            if(mysqli_num_rows($q)==0){
            echo "Sorry! No book found.";
            }
            else{
                ?>
                <table class="table table-bordered table-hover">
                    <tr style="background-color: #b5b733;">
                        <th>Issue ID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Issue Time</th>
                        <th>Expected Return Time</th>
                        <th>Status</th>
                        <th>Fine</th>
                        <th>Update</th>
                    </tr>
            <?php        
            $d = date('Y-m-d');
            while($row = mysqli_fetch_assoc($res)){
            $fine_per_day = 1;
            $is_returned = 'Returned';
            $i_id = $row['issue_id'];
            $b_id = $row['bid'];
            $d_fine = strtotime($row['return_time']);
            $c = strtotime(date("Y-m-d"));
            $dif = $c - $d_fine;
            if($dif > 0){
                $day = floor($dif/(60*60*24));
            }
            else
            $day = 0;
            
            $total_fine = $day * $fine_per_day;
            
            if($row['issue_id']==$_POST['search'] || $row['roll'] == $_POST['search']){
                ?>
            
            <tr>
                
                <td><?=$row['issue_id']?></td>
                <td><?=$row['roll']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['bid']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['issue_time']?></td>
                <td><?=$row['return_time']?></td>
                <td><?=$row['status']?><br> <?=$row['expired']?></td>
                <td>$<?=$row['fine']?></td>

                <?php
                if($row['status']==$is_returned){
                    ?>
                    <td><button type="button" class="btn" disabled >Returned</button></td>
                    <?php
                }
                else{
                    ?>
                    <td>
                    <form action="issue_book_update.php" method="get">
                    <input type="hidden" name="GetIID" value="<?= $i_id ?>">
                    <input type="hidden" name="GetBID" value="<?= $b_id ?>">
                    <input type="hidden" name="pressed_button_time" value="<?= date('Y-m-d') ?>">
                    <input type="hidden" name="expected_time" value="<?= $row['return_time'] ?>">
                    <button name="submit1" type="submit" class="btn btn-success">Returned</button>
                    </form>
                    </td>
                    <?php
                    $return = $row['return_time'];
                    $id = $row['issue_id'];
                    if(!isset($_GET['submit1'])){
                        if($return < $d){
                            $query = "UPDATE issue_book SET expired = 'Yes' where issue_id = $id";
                            $query1 = "UPDATE issue_book SET fine = $total_fine where issue_id = $id";
                            mysqli_query($db,$query1);

                            
                        }
        
            }
        }
    }
    }
}
    }
    else{
        ?>
    
        <table class="table table-bordered table-hover">
            <tr style="background-color: #b5b733;">
                <th>Issue ID</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Issue Time</th>
                <th>Expected Return Time</th>
                <th>Status</th>
                <th>Fine</th>
                <th>Update</th>
            </tr>
            <?php
            $d = date('Y-m-d');
            while($row = mysqli_fetch_assoc($res)){
                $fine_per_day = 2;
                $is_returned = 'Returned';
                $i_id = $row['issue_id'];
                $b_id = $row['bid'];
                $d_fine = strtotime($row['return_time']);
                $c = strtotime(date("Y-m-d"));
                $dif = $c - $d_fine;
                if($dif > 0){
                    $day = floor($dif/(60*60*24));
                }
                else
                $day = 0;
                $total_fine = $day * $fine_per_day;
                ?>
                <tr>
                    <td><?=$row['issue_id']?></td>
                    <td><?=$row['roll']?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['bid']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['issue_time']?></td>
                    <td><?=$row['return_time']?></td>
                    <td><?=$row['status']?><br> <?=$row['expired']?></td>
                    <td>$<?=$row['fine']?></td>
                    <?php
                    if($row['status']==$is_returned){
                        ?>
                        <td><button type="button" class="btn" disabled >Returned</button></td>
                        <?php
                    }
                    else{
                        ?>
                        <td>
                        <form action="issue_book_update.php" method="get">
                        <input type="hidden" name="GetIID" value="<?= $i_id ?>">
                        <input type="hidden" name="GetBID" value="<?= $b_id ?>">
                        <input type="hidden" name="pressed_button_time" value="<?= date('Y-m-d') ?>">
                        <input type="hidden" name="expected_time" value="<?= $row['return_time'] ?>">
                        <button name="submit1" type="submit" class="btn btn-success">Returned</button>
                        </form>
                        </td>
                        <?php
                        $return = $row['return_time'];
                        $id = $row['issue_id'];
                        if(!isset($_GET['submit1'])){
                            if($return < $d){
                                $query = "UPDATE issue_book SET expired = 'Yes' where issue_id = $id";
                                $query1 = "UPDATE issue_book SET fine = $total_fine where issue_id = $id";
                                mysqli_query($db,$query1);
                            }
                            else
                                $query = "UPDATE issue_book SET expired = 'No' where issue_id = $id";
                                $query1 = "UPDATE issue_book SET fine = $total_fine where issue_id = $id";
                                mysqli_query($db,$query1);
                        }
                        mysqli_query($db,$query);
                    }
                    ?>
                </tr>
                <?php
            }
           
    
    }
    ?>
        
    
</body>
</html>