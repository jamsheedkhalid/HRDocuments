

<?php

include('config/dbConfig.php');
$search = $_GET['q'];


$sql = "SELECT DISTINCT CONCAT(last_name) name, batch_id "
        . " FROM students WHERE familyid  = '$search' "
        . "ORDER BY name ASC ";

$ExecQuery = MySQLi_query($conn, $sql);
if ($ExecQuery->num_rows > 0) {
    $si = 0;
    echo " <thead><tr align=center>
                <th scope=col class='name' rowspan=2>Name</th>
                <th scope=col rowspan=2>Curriculum</th>
                <th scope=col rowspan=2>Grade</th>
                <th scope=col colspan=4 align=center>1st Installment</th>
                <th scope=col rowspan=2>2st Installment</th>
                <th scope=col rowspan=2>3st Installment</th>
                <th scope=col rowspan=2>Total</th>

            </tr>
            <tr align=center>
                <th scope=col>Tution Fees</th>
                <th scope=col>Books</th>
                <th scope=col>Uniform</th>
                <th scope=col>Bus</th>
            </tr>       
        </thead>";
    $i = 1;
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


        echo"<tr>"
        . "<td class='name' align=left>" . $row['name'] . "</td>"
        . "<td><select class='form-control selectprint' ><option>American</option><option>MOE</option></select></td>"
        . "<td style='font-size:8px'><select onchange='applyfees(this.options[this.selectedIndex].text);' class='form-control btn-select' ><option disabled selected>" . $course . "</option><option>KG1 </option>"
        . "<option>KG2 </option>";
        for ($gr = 1; $gr < 13; $gr++) {
            echo"<option value='" . $gr . "'> GR" . $gr . " </option>";
        }
        echo "</select></td>"
        . "<td class=tdstyle><label contentEditable class=form-control></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control ></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control ></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control ></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control></label></td>"
        . "<td class=tdstyle ><label contentEditable class=form-control></label></td>"
        . "<td id='delstudent'><span  onclick='deleteRow(this)' title='Remove Student' style='cursor: pointer; color:red' class='close'>&#10008;</span></td>"
        . "</tr>";
        $i++;
    }

    echo "";
} else
    echo "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";
?>  

  