<?php
include ('../config/dbMarks.php');
$sql = "SELECT  DISTINCT(GRADE) FROM marks ORDER BY GRADE ASC";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result))
    echo $row["GRADE"] . "\t";

$conn->close();