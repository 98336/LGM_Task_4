<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <div class="title">
        <span>Students Result Management System</span>
    </div>

    <div class="main">
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="Roll No">
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
