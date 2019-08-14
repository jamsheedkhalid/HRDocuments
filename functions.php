<?php

function employee_details($name) {
    $sql = " SELECT id, nationality_id, gender, job_title, joining_date, first_name from employees WHERE employee_number "
            . "LIKE '$name%' OR first_name LIKE '%$name%' OR middle_name LIKE '%$name%' "
            . "OR last_name LIKE '%$name%'  ";

    return $sql;
}

function employee_nationality($nationalityid, $conn) {
    $sql = "SELECT name from countries WHERE id = '$nationalityid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nationality = $row['name'];
        }
    } else
        $nationality = '';
    return $nationality;
}

function school($conn) {
    $sql = "SELECT name from schools where id = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $schoolname = $row['name'];
        }
    } else
        $schoolname = '';
    return $schoolname;
}

function passportnumber($employeeid, $conn) {
    $sql = "SELECT additional_info from employee_additional_details "
            . "WHERE employee_id = '$employeeid' AND additional_field_id = 8";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passport = $row['additional_info'];
        }
    } else
        $passport = '';
    return $passport;
}

function salary($employeeid, $conn) {
    $sql = "SELECT net_pay FROM employee_salary_structures WHERE employee_id = '$employeeid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $salary = $row['net_pay'];
        }
    } else
        $salary = '';
    return $salary;
}
