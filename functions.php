<?php

function checkLoggedIn(){
    
    if (!isset($_SESSION['login'])) {
    $_SESSION['notloggedin'] = 1;
    header('Location: index.php');
} 
}

function employee_details($name) {
    $sql = " SELECT concat(first_name,'', last_name) name, employee_number, id, nationality_id, gender, job_title, joining_date, first_name from employees WHERE employee_number "
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
            . "WHERE employee_id = '$employeeid' AND additional_field_id = 18";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if( $row['additional_info'] == '0' ||  $row['additional_info'] == '')
            {
                $sql = "SELECT additional_info from employee_additional_details "
                    . "WHERE employee_id = '$employeeid' AND additional_field_id = 13";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row1 = $result->fetch_assoc()) {
                        if( $row1['additional_info'] == '0' ||  $row1['additional_info'] == '')
                        {
                            $passport = '-';
                        }
                        else
                            $passport = $row1['additional_info'];
                    }
                }
            }
            else
            $passport = $row['additional_info'];
        }
    } else
        $passport = '';
    echo $sql;

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

function salary_structure($empid, $conn) {
    $sql = "SELECT id from employee_salary_structures WHERE employee_id = '$empid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $structure_id = $row['id'];
        }
        $basic = salary_structure_component($structure_id, $conn);
    } else
        $basic = 0;
    return $basic;
}

function salary_structure_component($structure_id, $conn) {
    $sql = "SELECT amount FROM employee_salary_structure_components WHERE "
            . "employee_salary_structure_id = '$structure_id' AND payroll_category_id = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $basic = $row['amount'];
        }
    } else
        $basic = 0;
    return $basic;
}

function calculate_days($start_date, $end_date) {
    $start_date = strtotime($start_date);
    $end_date = strtotime($end_date);

    return(($end_date - $start_date) / 60 / 60 / 24);
}

function calculate_gratuity($days, $basic) {
    $years = $days / 365;

    if ($years >= 5)
        $gratuitypay = ($basic * 21 * $years) / 30;

    else if ($years >= 3 && $years < 5)
        $gratuitypay = ($basic * 14 * $years) / 30;

    else if ($years >= 1 && $years < 3)
        $gratuitypay = ($basic * 7 * $years ) / 30;
    else
        $gratuitypay = 0;

    return $gratuitypay;
}
