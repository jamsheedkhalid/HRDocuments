

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
    echo " <thead style='text-align:right' >
    <tr align=center>                                           
                                            <th scope=col rowspan=2>الاجمالي </th>
                                            <th scope=col rowspan=2>الدفعة الثالثة</th>
                                            <th scope=col rowspan=2>الدفعة الثانية</th>
                                            <th scope=col colspan=4>الدفعة الأولى</th>
                                            <th scope=col rowspan=2>الصف</th>
                                            <th scope=col rowspan=2>المنهج</th>
                                            <th scope=col class='name' rowspan=2>الأسم</th>
                                        </tr>
                <tr align=center>
<th scope=col>رسوم الحافلة</th>
            <th scope=col>رسوم اللباس</th>
<th scope=col>رسوم الكتب</th>
<th scope=col>رسوم الدراسية</th>

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
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td class='tdstyle'><label contentEditable class=form-control></label></td>"
        . "<td><select onchange='applyfeesAr(this.options[this.selectedIndex].value);' class='form-control btn-select ' >"
        . "<option disabled selected>" . $course . "</option>"
        . "<option value='KG1'>روضة  ١</option>"
        . "<option value='KG2'>روضة  ٢</option>";
        for ($gr = 1; $gr < 13; $gr++) {
            $grade = engtoarabic1($gr);
            echo"<option value='GR".$gr."'>الصف " . $grade . "</option>";
        }
        echo "</select></td>"
        . "<td><select class='form-control selectprint ' ><option>أمريكي</option><option>وزارة التعليم</option></select></td>"
        . "<td class='tdstyle name'>" . $row['first_name'] . "</td>"
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





