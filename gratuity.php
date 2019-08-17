
<?php
 $gratuitybtnactive= 0;
if (isset($_POST['submitgratuity']) && ($_POST['gratuityname'] !== '')) {
    $name = $_POST['gratuityname'];
    $enddate = $_POST['gratuityend'];

    $sql = employee_details($name);
//echo $sql;salary
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $empid = $row['id'];
            $employee_no = $row['employee_number'];
            $jobtitle = $row['job_title'];
            $joiningdate = $row['joining_date'];
            $firstname = $row['first_name'];
            $nationalityid = $row['nationality_id'];
            $gender = $row['gender'];
        }
    } else {
        $empid = '';
        $jobtitle = '';
        $joiningdate = 0;
        $firstname = '';
        $nationalityid = '';
        $gender = '';
    }



    $nationality = employee_nationality($nationalityid, $conn);
    $salary = salary($empid, $conn);
    $basicpay = salary_structure($empid, $conn);


    if ($joiningdate != 0)
        $dayswork = calculate_days($joiningdate, $enddate);
    
    $dayswork = round($dayswork,0);

    $years = $dayswork / 365;
    $years = round($years,2);


    if ($dayswork != 0) {
        $gratuitypay = calculate_gratuity($dayswork, $basicpay);
        $gratuitypay = round($gratuitypay,2);
    }
    



    $gratuitybtnactive = 1;
}
?>

<div id="gratuitydiv" class="container" >
    <div class="row">
        <div class="col-md-4"></div>
        <div  class="col-md-4" >

            <form id="gratuityform" class=" needs-validation" method="post" nonvalidate>

                <p class="h4 mb-4 text-center">Gratuity Calculator</p>

                <label for="gratuityname">Employee Name</label>
                <input type="text" list="gratuitydisplay" id="gratuityname" name="gratuityname" required  class="form-control mb-4" placeholder="Enter employee name" aria-label="name" aria-describedby="basic-addon1">
                <datalist id="gratuitydisplay"></datalist >
                <div class="valid-feedback">
                    Employee Details Fetched.
                </div>
                <div class="invalid-feedback">
                    Please Choose Employee. 
                </div>
                <br>
                <label for="name">Service End Date</label>
                <input type="text" id="gratuityend" name="gratuityend" data-cls-today='today'  required placeholder="Select service end date" data-calendar-button-icon='<i class="far fa-calendar-alt"></i>' data-format='%Y-%m-%d' data-cls-calendar="compact" data-role="calendarpicker"  >
                <div class="invalid-feedback">
                    Please select Date. <br>
                </div>
                <button class="btn btn-info btn-block my-4" name="submitgratuity" type="submit">Calculate</button>

            </form>

        </div>
        <div class="col-md-4">.</div>
    </div>
</div>

<script type="text/javascript" src="js/autoFillGratuity.js"></script>

<?php if ($gratuitybtnactive == 1) { ?>
<div id="gratuitycalcdiv" class="container"  >
    <div class="row">
        <div class="col"></div>
        <div  class="col-6" >


            <form id="gratuitycalcform" class="border needs-validation border-light p-5" nonvalidate>

                <p class="h4 mb-4 text-center">Gratuity Report</p>

                <div class="row">
                    <div class="col">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Employee ID" class="fas fa-address-card prefix "></i>
                            <input type="text" title='Employee ID'   disabled value="<?php if (isset($employee_no)) echo $employee_no; ?>" >
                        </div>
                    </div>
                    <div class="col" style="margin-left:10px">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Employee name" class="fas fa-user prefix"></i>
                            <input type="text" title='Employee name'   disabled value="<?php if (isset($name)) echo $name; ?>" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Job Title" class="fas fa-briefcase prefix "></i>
                            <input type="text"  title="Job Title"   disabled value="<?php if (isset($jobtitle)) echo $jobtitle; ?>" >
                        </div>
                    </div>
                    <div class="col" style="margin-left:10px">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Nationality" class="fas fa-flag prefix"></i> 
                            <input type="text" title='Nationality'   disabled value="<?php if (isset($nationality)) echo $nationality; ?>" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Joining date" class="fas fa-calendar-alt prefix "></i>
                            <input type="text"  title="Joining date"   disabled value="<?php if (isset($joiningdate)) echo $joiningdate; ?>" >
                        </div>
                    </div>
                    <div class="col" style="margin-left:10px">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Resigning Date" class="fas fa-calendar-check prefix"></i> 
                            <input type="text" title='Resigning Date'   disabled value="<?php if (isset($enddate)) echo $enddate; ?>" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Total Working Days" class="fas fa-clock prefix "></i>
                            <input type="text"  title="Total Working Days"   disabled value="<?php if (isset($dayswork)) echo $dayswork; ?>" >
                        </div>
                    </div>
                    <div class="col" style="margin-left:10px">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Years Done" class="far fa-clock prefix"></i> 
                            <input type="text" title='Years Done'   disabled value="<?php if (isset($years)) echo $years; ?>" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Basic Salary" class="fas fa-money-bill prefix "></i>
                            <input type="text"  title="Basic Salary"   disabled value="<?php if (isset($basicpay)) echo $basicpay; ?>" >
                        </div>
                    </div>
                    <div class="col" style="margin-left:10px">
                        <!-- Material input -->
                        <div class="md-form">
                            <i title="Gratuity Pay" class="fab fa-amazon-pay prefix"></i> 
                            <input type="text" title='Gratuity Pay'   disabled value="<?php if (isset($gratuitypay)) echo $gratuitypay; ?>" >
                        </div>
                    </div>
                </div>





                <!--<button class="btn btn-info btn-block my-4" name="printgratuity" type="button" onclick="printJS({printable: 'gratuitycalcformprint', type: 'html', header: null, css: 'css/print.css'})">Print</button>-->

            </form>
            


        </div>
        <div class="col"></div>
    </div>
</div>


<?php $gratuitybtnactive = 0;} 

?>



