<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
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
            <span class="heading">Students Result Management System</span>
            <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x" id="log" >Logout</span></a>
        </div>
        
        <div class="main">
            <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table class='data-table'>
                <caption>Manage Students</caption>
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                </tr>";

                $rowNum = 1;
                while($row = mysqli_fetch_array($result))
                  {
                    $rowClass = ($rowNum % 3 === 1) ? 'pink-row' : (($rowNum % 3 === 2) ? 'green-row' : 'purple-row');
                    echo "<tr class='$rowClass'>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                    $rowNum++;
                  }

                echo "</table>";
            } else {
                echo "0 Students";
            }
           ?>
        </div>
    </div>
</body>
</html>


