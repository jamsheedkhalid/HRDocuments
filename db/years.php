<?php
include ('../config/dbMarks.php');
$sql = "SELECT  DISTINCT(ACD_CODE) FROM marks";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result))
    echo $row["ACD_CODE"];
$conn->close();