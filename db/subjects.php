<?php
include ('../config/dbMarks.php');
$sql = "SELECT  DISTINCT(SUBJECT_NAME) FROM marks ORDER BY SUBJECT_NAME ASC";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result))
    echo $row["SUBJECT_NAME"];

$conn->close();