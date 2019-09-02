

<?php

include('config/dbConfig.php');
$search = $_GET['q'];


$sql = "SELECT DISTINCT first_name , batch_id "
        . " FROM students WHERE familyid  = '$search' "
        . "ORDER BY first_name ASC ";
//echo $sql;
$ExecQuery = MySQLi_query($conn, $sql); 
if ($ExecQuery->num_rows > 0) {
    $si = 0;
    echo " <thead style='text-align:right' ><tr >
                                           
                                            <th scope=col>المتبقي</th>
                                            <th scope=col>المدفوع</th>
                                            <th scope=col>الاجمالي </th>
                                            <th scope=col>رسوم الدراسة</th>
                                            <th scope=col >رسوم الكتب</th>
                                            <th scope=col>رسوم المواصلات</th>
                                            <th scope=col>رسوم الزي المدرسي</th>
                                            <th scope=col>الصف</th>
                                            <th scope=col>المنهج</th>
                                            <th scope=col>الاسم</th>
                                        </tr>
                                    </thead>";
    $j = 1;
    while ($row = $ExecQuery->fetch_assoc()) {
        $sqlBatch = "SELECT course_id FROM batches WHERE id = '$row[batch_id]'";
        $ExecBatchQuery = MySQLi_query($conn, $sqlBatch);
        if ($ExecQuery->num_rows > 0)
            while ($rowBatch = $ExecBatchQuery->fetch_assoc()) {
                $course_id = $rowBatch['course_id'];
                $sqlBatch = "SELECT course_name FROM courses WHERE id = '$course_id'";
                $ExecBatchQuery = MySQLi_query($conn, $sqlBatch);
                while ($rowBatch = $ExecBatchQuery->fetch_assoc())
                    $course = $rowBatch['course_name'];
            } else
            $course = 'Select Grade';


        echo"<tr style='text-align:right'>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle arabictd'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control ></label></td>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control ></label></td>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control ></label></td>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle arabictd' ><label contentEditable class=form-control ></label></td>"
        . "<td ><select onchange='applyfeesAr(this.options[this.selectedIndex].value);' class='form-control btn-select arabictd' >"
        . "<option disabled selected>" . $course . "</option>"
        . "<option value='KG1'>روضة  ١</option>"
        . "<option value='KG2'>روضة  ٢</option>";
        for ($gr = 1; $gr < 13; $gr++) {
            $grade = engtoarabic1($gr);
            echo"<option value='GR".$gr."'>الصف " . $grade . "</option>";
        }
        echo "</select></td>"
        . "<td><select class='form-control selectprint arabictd' ><option>أمريكي</option><option>وزارة التعليم</option></select></td>"
        . "<td class='tdstyle arabictd'>" . $row['first_name'] . "</td>"
        . "<td id='delstudentAr'><span  onclick='deleteRowAr(this)' title='Remove Student' style='cursor: pointer; color:red' class='close'>&#10008;</span></td>"
        . "</tr>";
        $j++;
    }

    echo "";
} else
    echo "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";

function engtoarabic1($str) {
    $western_arabic = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $eastern_arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

    $str = str_replace($western_arabic, $eastern_arabic, $str);
    return $str;
}
?>     





