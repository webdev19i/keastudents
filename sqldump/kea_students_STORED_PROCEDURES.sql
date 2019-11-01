-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2019 at 02:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kea_students`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStudents` ()  BEGIN

	SELECT * FROM students ORDER BY first_name;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStudentsAndEnrollments` (IN `id` INT)  BEGIN
	
    SELECT students.*, courses.*, courses_students.grade FROM students
                LEFT JOIN courses_students ON students.students_id = courses_students.fk_students
                LEFT JOIN courses ON courses.courses_id = courses_students.fk_courses
                WHERE students.students_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeStudent` (IN `sid` INT, IN `cid` INT, IN `grade` INT)  BEGIN
	
    IF grade > 12 THEN
    	SET grade = 12;
    ELSEIF grade < -3 THEN
    	SET grade = -3;    
    END IF;
    
	UPDATE courses_students SET grade = grade WHERE fk_students = sid AND fk_courses = cid; 

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courses_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `ETCS` int(11) DEFAULT NULL,
  `fk_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courses_id`, `title`, `start_date`, `ETCS`, `fk_teacher`) VALUES
(1, 'Node.js', '2020-01-15', 10, NULL),
(2, '.Net Core', '2020-01-12', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses_students`
--

CREATE TABLE `courses_students` (
  `fk_courses` int(11) NOT NULL,
  `fk_students` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `courses_students`
--

INSERT INTO `courses_students` (`fk_courses`, `fk_students`, `grade`) VALUES
(1, 1, NULL),
(1, 2, -3),
(2, 1, 12),
(2, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `log_time`
--

CREATE TABLE `log_time` (
  `excute_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `log_time`
--

INSERT INTO `log_time` (`excute_time`) VALUES
('2019-11-01 11:31:22'),
('2019-11-01 11:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `students_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `cpr` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `first_name`, `last_name`, `email`, `cpr`) VALUES
(1, 'Claus', 'Bove', 'clbo@kea.dk', '221070-1109'),
(2, 'Anna', 'Malena', 'anna@kea.dk', '21115345324'),
(4, 'Esther', 'Fallon', 'xtra109@icloud.com', '4990'),
(23, 'tjedgfkgsjlksdj', 'fdsgkjsdflkgj', 'clausbove@gmail.com', '4990'),
(24, 'alkjsdflkjdalksdj', 'asædkasældkjaslkj', 'clbo@kea.dk', '2400'),
(25, 'ooooo', 'ooooo', 'clausbove@gmail.com', '4990');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `stud_log_trig` BEFORE INSERT ON `students` FOR EACH ROW INSERT INTO log_time VALUES(NOW())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `courses_students`
--
ALTER TABLE `courses_students`
  ADD PRIMARY KEY (`fk_courses`,`fk_students`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
