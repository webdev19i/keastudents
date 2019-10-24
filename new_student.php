<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
//require_once(dirname(__FILE__) . '/includes/Students_class.php');
//$students = new Students();
/* Get a list of all students in DB */
//$result = $students->list();
?>

<body>
    <?php
    /* Include <head></head> */
    require_once(dirname(__FILE__) . '/includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Create new student in the Database from the input fields below</div>
            <h3>New Student</h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal" method="POST" action="new_student_created.php">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="First Name" name="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="year" placeholder="Last Name" name="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email"  class="form-control" id="director" placeholder="email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="plot" class="col-sm-2 control-label">Cpr</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="plot" placeholder="Cpr" name="cpr">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>