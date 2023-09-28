<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Dashboard</title>
    
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
            <span class="heading">Dashboard</span>
            <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x" id="log" >Logout</span></a>
        </div>

        <div class="main">
    <table class="data-table">
        <tr>
            <th>Category</th>
            <th>Count</th>
        </tr>
        <tr>
            <td>Number of classes</td>
            <td><?php echo $no_of_classes[0]; ?></td>
        </tr>
        <tr>
            <td>Number of students</td>
            <td><?php echo $no_of_students[0]; ?></td>
        </tr>
        <tr>
            <td>Number of results</td>
            <td><?php echo $no_of_result[0]; ?></td>
        </tr>
    </table>
</div>

    </div>
</body>
</html>
