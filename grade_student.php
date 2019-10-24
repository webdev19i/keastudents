<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
require_once(dirname(__FILE__) . '/includes/Students_class.php');
$students = new Students();
/* Get students with id = $_GET["id"] */
$sid = $_GET["sid"];
$cid = $_GET["cid"];
?>

<body>
    <?php
    /* Include <head></head> */
    require_once(dirname(__FILE__) . '/includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Finish code so student and his or hers course enrollments are shown</div>
            <h3>Grade Student ID: <?php echo $sid ?></h3>
            <h4>Course ID: <?php echo $cid ?></h4>

            <form action="student_graded.php" method="POST">

                <div class="form-group">
                    <label for="plot" class="col-sm-2 control-label">Grade</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control"  name="sid" value=<?php echo $sid ?>>
                        <input type="hidden" class="form-control"  name="cid" value=<?php echo $cid ?>>
                        <input type="text" class="form-control" placeholder="Grade" name="grade">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Grade">
                    </div>
                </div>




            </form>
            <?php

            ?>

        </div>
    </div>
</body>

</html>