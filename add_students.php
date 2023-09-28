<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/count.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>
<body>
<div class="sidebar">
        
        <ul>
            <li><a href="add_classes.php">Add Class</a></li>
            <li><a href="manage_classes.php">Manage Class</a></li>
            <li><a href="add_students.php">Add Students</a></li>
            <li><a href="manage_students.php">Manage Students</a></li>
            <li><a href="add_results.php">Add Results</a></li>
            <li><a href="manage_results.php">Manage Results</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="title">
            <a href="dashboard.php"><img src="./images/LGM.png" alt="" class="logo"></a>
            <span class="heading">Students Result Management System</span>
            <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x" id="log">Logout</span></a>
        </div>

        <div class="main">
            <form action="" method="post">
                <fieldset>
                    <legend>Add Student</legend>
                    <input type="text" name="student_name" placeholder="Student Name">
                    <input type="text" name="roll_no" placeholder="Roll No">
                    <?php
                        include('init.php');
                        include('session.php');
                        
                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>
                    <input type="submit" value="Submit">
                </fieldset>
            </form>
        </div>

        
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

       
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter a valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                echo '<p class="error">No numbers or symbols allowed in name</p>'; 
            }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }

    }
?>
