<?php
include('../config/dbConfig.php');
session_start();

if (isset($_POST['submit']) && ($_POST['name'] !== '')) {
    $name = $_POST['inname'];

    $sql = " SELECT nationality_id, job_title, joining_date, first_name from employees WHERE employee_number "
            . "LIKE '$name%' OR first_name LIKE '%$name%' OR middle_name LIKE '%$name%' "
            . "OR last_name LIKE '%$name%'  ";

//echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['title'] = $row['job_title'];
        }
    }

    $conn->close();
}
?>
