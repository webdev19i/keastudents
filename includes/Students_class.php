<?php

/**
 * Students class
 * 
 * @author Claus Bové
 * @date  October 2019
 */
require_once("connection.php");

class Students
{
    /**
     * Retrieves students information
     * 
     * @return all students fields (students_id, first_name, last_name, enrollment_date, cpr) 
     * ordered by first_name as an array
     */
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = array();

            $stmt = $con->prepare("SELECT * FROM students ORDER BY first_name");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["students_id"], $row["first_name"], $row["last_name"], $row["email"], $row["cpr"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }


    /**
     * Retrieves specific student and its enrollments based on the id
     * 
     * @param id of the student
     * @return all students fields (students_id, first_name, last_name, enrollment_date, cpr) as an array
     */

    function get_student_and_enrollments($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $results = array();
            $stmt = $con->prepare("SELECT students.*, courses.*, courses_students.grade FROM students" .
                " LEFT JOIN courses_students ON students.students_id = courses_students.fk_students" .
                " LEFT JOIN courses ON courses.courses_id = courses_students.fk_courses" .
                " WHERE students.students_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $results[] = [$row["students_id"], $row["first_name"], $row["last_name"], $row["email"], $row["cpr"], $row["courses_id"], $row["title"], $row["start_date"], $row["ETCS"], $row["grade"]];
            }

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else { }
    }

    /**
     * Grade a student 
     * 
     * @param id of the student, course id and grade
     * @return 1 if everything went ok, 0 if something went wrong
     */

    function grade_student($id, $cid, $grade)
    {
        echo "" . $id . ", " . $cid . ", " . $grade;

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $stmt = $con->prepare("UPDATE courses_students SET grade = :grade WHERE fk_students = :sid AND fk_courses = :cid");
            $stmt->bindParam(':sid', $id);
            $stmt->bindParam(':cid', $cid);
            $stmt->bindParam(':grade', $grade);
            $ok = $stmt->execute();



            $stmt = null;
            $db->disconnect($con);

            return $ok;
        } else {
            return 0;
        }
    }


    /**
     * Inserts a new student
     * 
     * @param first_name, last_name, enrollment_date, cpr of the new student
     * @return true if the insertion was correct, false if there was an error
     */
    function add($first_name, $last_name, $email, $cpr)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            try {
                $stmt = $con->prepare("INSERT INTO students (first_name, last_name, email, cpr)
                        VALUES (:firstname, :lastname, :email, :cpr)");
                $stmt->bindParam(':firstname', $first_name);
                $stmt->bindParam(':lastname', $last_name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cpr', $cpr);
                $ok = $stmt->execute();

                $stmt = null;
                $db->disconnect($con);

                return ($ok);
            } catch (PDOException $e) {
                echo $e;
            }
        } else {
            $stmt = null;
            $db->disconnect($con);
            return false;
        }
    }

    /**
     * Updates the student 
     * 
     * @param id of the student to update
     * @param name of the student
     * @param lastname of the student
     * @param email of the student
     * @param cpr of the student
     * @return true if the update was correct, false if there was an error
     */
    function update($id, $first_name, $last_name, $email, $cpr)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare('UPDATE students SET first_name = :firstname, last_name = :lastname, email = :email, cpr = :cpr WHERE students_id = :id');

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstname', $first_name);
            $stmt->bindParam(':lastname', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpr', $cpr);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);

            return ($ok);
        } else
            return false;
    }

    /**
     * Delete a Student
     * 
     * @param id of the student to delete
     * @return true if the deletion was correct, false if there was an error
     */
    function delete($id)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $stmt = $con->prepare('DELETE FROM students WHERE students_id = :id');
            $stmt->bindParam(':id', $id);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);

            return ($ok);
        } else
            return false;
    }

    /**
     * Retrieves specific student based on the id
     * Used for edit student input fields
     * @param id of the student
     * @return all students fields (students_id, first_name, last_name, enrollment_date, cpr) as an array
     */
    function get_student($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $result = array();
            $stmt = $con->prepare("SELECT * FROM students WHERE students_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();

           // while ($row = $stmt->fetch()) {
           //     $result = [$row["students_id"], $row["first_name"], $row["last_name"], $row["email"], $row["cpr"]];
           // }
            $stmt = null;
            $db->disconnect($con);

            return $row;
           // return $result;
        } else { }
    }
}
