<?php
include ('../config/dbMarks.php');

$year = $_REQUEST['year'];
$grade = $_REQUEST['grade'];
$section = $_REQUEST['section'];
$subject = $_REQUEST['subject'];


// echo "SEARCH FUNCTION - $year - $grade - $section - $subject<br>";

$sql = "SELECT * FROM marks WHERE ACD_CODE = '$year' AND GRADE = '$grade' AND SECTION = '$section' AND SUBJECT_NAME = '$subject'";
// echo $sql;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped table-hover' id='formerResults'>
        <thead class='thead-dark'>
            <tr>
            <th>SN.</th>
            <th>ID</th>
            <th>NAME-EN</th>
            <th>NAME-AR</th>
            <th>DOB</th>
            <th>YEAR</th>
            <th>GRADE</th>
            <th>SECTION</th>
            <th>SUBJECT-EN</th>
            <th>SUBJECT-AR</th>
            <th>MARK</th>
        </tr>
    </thead>";
    $mark = 0;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['STUDENT_ID'] . "</td>";
        echo "<td>" . $row['STUDENT_NAME_E'] . "</td><td>" . $row['STUDENT_NAME_A'] . "</td>";
        echo "<td>" . $row['DOB'] . "</td><td>" . $row['ACD_CODE'] . "</td>";
        echo "<td>" . $row['GRADE'] . "</td><td>" . $row['SECTION'] . "</td>";
        echo "<td>" . $row['SUBJECT_NAME'] . "</td><td>" . $row['SUBJECT_NAME_A'] . "</td>";
        if(empty($row['EXAM_MARK'])){$mark = '-';} else {$mark = $row['EXAM_MARK'];}
        echo "<td>" . $mark . "</td></tr>";
    }
    echo "</table>";
}
$conn->close();