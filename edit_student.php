<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
require_once(dirname(__FILE__) . '/includes/Students_class.php');
$students = new Students();

// Get id from parameter in URL
$id = $_GET["id"];

$result = $students->get_student($id);
?>

<body>
    <?php
    /* Include menu */
    require_once(dirname(__FILE__) . '/includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Edit student in the Database from the input fields below</div>
            <h3>Edit <?php echo $result['first_name'] . ' ' .  $result['last_name'] ?></h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal" method="POST" action="edited_student.php">
                    
                    <input type="hidden" name="id" value="<?php echo $result['student_id'] ?>">
                    
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="First Name" name="firstname" value="<?php echo $result['first_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="year" placeholder="Last Name" name="lastname" value="<?php echo $result['last_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email"  class="form-control" id="director" placeholder="email" name="email" value="<?php echo $result['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="plot" class="col-sm-2 control-label">Cpr</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="plot" placeholder="Cpr" name="cpr" value="<?php echo $result['cpr'] ?>">
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