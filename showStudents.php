


<?php
include('config/dbConfig.php');
$search = $_GET['q'];


$sql= "SELECT DISTINCT  last_name en_name, first_name ar_name, "
        . "admission_no, familyid FROM students WHERE admission_no LIKE '$search' "
        . "OR familyid LIKE '$search' "
        . "OR first_name LIKE N'$search%' OR middle_name LIKE N'$search%' "
        . "OR last_name LIKE N'$search%'  ORDER BY familyid ASC ";
//echo $sql;
$ExecQuery = MySQLi_query($conn, $sql);
if ($ExecQuery->num_rows > 0) {
    $si =0;
     echo " <table class='table table-bordered ' style='text-align:center'> <thead class=thead-dark ><tr>
                                            <th>SI No. <br> رقم</th>
                                            <th>Name </th>
                                            <th style='font-size:20px'>اسم</th>
                                            <th>Admission Number <br> رقم القبول</th>
                                            <th>Family ID <br> رقم العائلة</th>
                                            <th>Action <br> عمل</th>
                                        </tr>
                                    </thead>";
     while ($row = $ExecQuery->fetch_assoc()) {
         echo"<tr><td>".++$si."</td>".
                 "<td style='text-align:left'>".$row['en_name']."</td>".
                 "<td style='text-align:right'>".$row['ar_name']."</td>".
                 "<td>".$row['admission_no']."<br>". engtoarabic($row['admission_no'])."</td>".
                 "<td>".$row['familyid']."<br>". engtoarabic($row['familyid'])."</td>"
                 ."<td><button title='Print Students Fee Certificate' onclick='showFeeTable(this.value)' data-toggle='modal' value=". $row['familyid']." data-target='#feeModalCenter' class='btn btn-primary btn-sm'>View Certificate</button>"
                 . "<button title='اطبع شهادة رسوم الطلاب' onclick='showFeeTableAr(this.value)' data-toggle='modal' value=". $row['familyid']." data-target='#feeModalCenterArabic' class='btn btn-warning btn-sm'>عرض الشهادة</button></td></tr>";
     }
     
     echo "</table>";
} else echo "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";

?>

<?php 
function engtoarabic($str){
  $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
$eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

$str = str_replace($western_arabic, $eastern_arabic, $str);
return $str;
}