<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/count.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Add Class</title>
   
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
            <div class="add-class-form">
                <form action="" method="post">
                    <fieldset>
                        <legend>Add Class</legend>
                        <input type="text" name="class_name" placeholder="Class Name">
                        <input type="text" name="class_id" placeholder="Class ID">
                        <input type="submit" value="Submit">
                    </fieldset>        
                </form>
            </div>
        </div>

    </div>
</body>
</html>
<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>