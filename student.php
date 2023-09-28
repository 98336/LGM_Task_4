<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

       
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter a valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="result-box">
        <div class="result-header">
            <span class="title">Result</span>
        </div>
        

<div class="result-content">
    <div class="details">
        <span>Name:</span> <?php echo $name ?> <br>
        <span>Class:</span> <?php echo $class; ?> <br>
        <span>Roll No:</span> <?php echo $rn; ?> <br>
    </div>

    <table class="result-table">
        <thead>
            <tr>
                <th>Subjects</th>
                <th>English</th>
                <th>Maths</th>
                <th>Science</th>
                <th>History</th>
                <th>Geography</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Marks</td>
                <td><?php echo $p1; ?></td>
                <td><?php echo $p2; ?></td>
                <td><?php echo $p3; ?></td>
                <td><?php echo $p4; ?></td>
                <td><?php echo $p5; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="result-summary">
        <p>Total Marks: <?php echo $mark; ?></p>
        <p>Percentage: <?php echo $percentage; ?>%</p>
    </div>
</div>

<div class="button">
    <button class="print-button" onclick="window.print()">Print Result</button>
</div>


</div>
</body>
</html>
