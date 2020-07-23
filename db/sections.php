<?php
include ('../config/dbMarks.php');
$sql = "SELECT  DISTINCT(SECTION) FROM marks ORDER BY SECTION ASC";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result))
    echo $row["SECTION"] . "\t";

$conn->close();