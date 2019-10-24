<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once(dirname(__FILE__) . '/includes/header.php');

/* New object of Students() */
require_once(dirname(__FILE__) . '/includes/Students_class.php');
$students = new Students();

// Get id from POST 
$id = $_POST["id"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$cpr = $_POST["cpr"];

// Call update method in $students object
$students->update($id, $fname, $lname,$email, $cpr);
?>

<body>
    <?php
    /* Include menu */
    require_once(dirname(__FILE__) . '/includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p class="alert alert-success">Thank you, student is updated</p>
        </div>
    </div>

</body>

</html>