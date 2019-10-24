<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <title>Kea Students management</title>
</head>

<body>
<?php  /* Include <head></head> */
            require_once(dirname(__FILE__) .'/includes/menu.php');
     ?>
    <div class="container">
        <div class="row top-buffer">
            <h1>Students Management System</h1>

            <p>Administrate Courses at kea, including students enrollments and grading</p>

            <a class='btn btn-primary' href='students.php'>Students</a>
            <a class='btn btn-primary' href='courses.php'>Courses</a>
            <a class='btn btn-primary' href='teachers.php'>Teachers</a>
        </div>
    </div>
</body>

</html>