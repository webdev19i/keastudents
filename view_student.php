<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
require_once(dirname(__FILE__) . '/includes/Students_class.php');
$students = new Students();
/* Get students and its enrollments with id = $_GET["id"] */
$result = $students->get_student_and_enrollments($_GET["id"]);
?>

<body>
    <?php
    /* Include <head></head> */
    require_once(dirname(__FILE__) . '/includes/menu.php');

    

    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Finish code so student and his or hers course enrollments are shown</div>
            <h3>Student</h3>
            <?php 
            $student = $result[0];
            echo "<div><b>Student ID: </b> " . $student[0] . "</div>";
            echo "<div><b>First Name: </b>" . $student[1] . "</div>";
            echo "<div><b>Last Name: </b>" . $student[2] . "</div>";
            echo "<div><b>Email: </b>" . $student[3] . "</div>";
            echo "<div><b>Cpr: </b>" . $student[4] . "</div>";

            ?>
            <h4>Enrollments</h4>

            <table class="table table-striped">
                <tr>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>ETCS</th>
                    <th>Grade</th>
                </tr>
                <?php
                foreach($result as $val){
                    echo "<tr>";
                    echo "<td>" . $val[5] . "</td>";
                    echo "<td>" . $val[6] . "</td>";
                    echo "<td>" . $val[7] . "</td>";
                    echo "<td>" . $val[8] . "</td>";

                    // Check if there is an enrollment and if it is graded
                    if($val[5] != null & $val[9] == null){
                        echo "<td><a class='btn btn-primary' href='grade_student.php?sid=" . $val[0] ."&cid=" . $val[5] . "'>Grade Student</a></td>"; 
                    } else {
                        echo "<td>" . $val[9] . "</td>";
                    }
                    
                    echo "</tr>";
                }
            ?>

            </table>

            
        </div>
    </div>
</body>

</html>