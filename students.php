<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
require_once(dirname(__FILE__) . '/includes/Students_class.php');
$students = new Students();
/* Get a list of all students in DB */
$result = $students->list();
?>

<body>
    <?php
    /* Include <head></head> */
    require_once(dirname(__FILE__) . '/includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">
            <a href="new_student.php" class="btn-primary btn">New Student</a>
            <h3>Students</h3>
            <table class=" table table-striped">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>CPR</th>
                    <th></th>
                </tr>

                <?php

                foreach ($result as $val) {

                    echo "<tr>";
                    echo "<td>" . $val[0] . "</td>";
                    echo "<td>" . $val[1] . "</td>";
                    echo "<td>" . $val[2] . "</td>";
                    echo "<td>" . $val[3] . "</td>";
                    echo "<td>" . $val[4] . "</td>";
                    echo "<td style='text-align: right'> <a class='btn btn-primary' href='view_student.php?id=" . $val[0] . "'>View</a> 
                    <a class='btn btn-danger' href='delete_student.php?id=" . $val[0] . "'>Delete</a> 
                    <a class='btn btn-primary' href='edit_student.php?id=" . $val[0] . "'>Edit</a> </td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>