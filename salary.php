<?php
$salarybtnactive = 0;
if (isset($_POST['salarysubmit']) && ($_POST['salaryname'] !== '')) {
    $name = $_POST['salaryname'];
    $to = $_POST['fwdto'];


    $sql = employee_details($name);
//echo $sql;salary
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $empid = $row['id'];
            $jobtitle = $row['job_title'];
            $joiningdate = $row['joining_date'];
            $firstname = $row['first_name'];
            $nationalityid = $row['nationality_id'];
            $gender = $row['gender'];
        }
    } else {
        $empid = '';
        $jobtitle = '';
        $joiningdate = '';
        $firstname = '';
        $nationalityid = '';
        $gender = '';
    }

    $nationality = employee_nationality($nationalityid, $conn);
    $schoolname = school($conn);
    $passport = passportnumber($empid, $conn);
    $salary = salary($empid, $conn);


    $salarybtnactive = 1;
}
?>

<!-- Salary Form --> 
<div class="container" style="padding: 20px;" id="salarycontainer"  >
    <div class="row">
        <form  id="salaryform" class="text-center border needs-validation  border-light p-5 col-md-6" action="#!" method="post"  novalidate>

            <p class="h4 mb-4">SALARY CERTIFICATE</p>

            <!-- Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Forwading To</span>
                </div>
                <input  type="text" id="fwdto" name="fwdto" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1">
                <div class="invalid-feedback">
                    Please Enter Address.
                </div>
                <div class="valid-feedback">
                    Address Saved.
                </div>

            </div>


            <!-- Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee</span>
                </div>
                <input type="text" list="salarydisplay" id="salaryname" name="salaryname" required  class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1">
                <datalist  id="salarydisplay"></datalist >
                <div class="valid-feedback">
                    Employee Details Fetched.
                </div>
                <div class="invalid-feedback">
                    Please Choose Employee.
                </div>
            </div>

            <div class="d-flex" center>
                <div style="padding-right: 20px" >
                    <button type="submit" class="btn btn-primary btn-sm" name="salarysubmit" id="salarysubmit" >
                        SUBMIT
                    </button>
                </div>
                <div> 

                </div>
            </div>

        </form>


        <script type="text/javascript" src="js/autoFillSalary.js"></script>
        <!-- Default form login --> </div></div>

<?php  if ($salarybtnactive == 1){ ?>

    <!-- NOL Form --> 

    <div id='printsalary' class="row" >
        <form   class="text-center border needs-validation  border-light p-5 col-md-6" novalidate>

            <p class="h4 mb-4">SALARY CERTIFICATE</p>

            <!-- Fwd To -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Forwading To</span>
                </div>
                <input style="text-transform: capitalize"  type="text"  id="s_printfwdto" name="s_printfwdto" required class="form-control " placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $to ?>" >
                <div class="invalid-feedback">
                    Please Enter Address.
                </div>
            </div>

            <!-- School -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">School</span>
                </div>
                <input  type="text" id="s_printschool" name="s_printschool" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $schoolname ?>" >
                <div class="invalid-feedback">
                    Please Enter School Name.
                </div>
            </div>

            <!-- Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee</span>
                </div>
                <input  type="text"  id="s_printname" name="s_printname" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $name ?>" >
                <div class="invalid-feedback">
                    Please Enter Name.
                </div>
            </div>

            <!-- First Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee First Name</span>
                </div>
                <input  type="text"  id="s_printfirstname" name="s_printfirstname" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $firstname ?>" >
                <div class="invalid-feedback">
                    Please Enter First Name.
                </div>
            </div>

            <!-- Nationality -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Nationality</span>
                </div>
                <input  type="text" id="s_printnationality" name="s_printnationality" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $nationality ?>" >
                <div class="invalid-feedback">
                    Please Enter Nationality.
                </div>
            </div>

            <!-- passport Number -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Passport</span>
                </div>
                <input  type="text" id="s_printpassport" name="s_printpassport" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $passport ?>" >
                <div class="invalid-feedback">
                    Please Enter Passport Number.
                </div>
            </div>

            <!-- Job Title -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Job Title</span>
                </div>
                <input  type="text"  id="s_printjobtitle" name="s_printjobtitle" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $jobtitle ?>" >
                <div class="invalid-feedback">
                    Please Enter Job Title.
                </div>
            </div>

            <!-- Joining Date -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Joining Date</span>
                </div>
                <input  type="text"  id="s_printjoiningdate" name="s_printjoiningdate" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $joiningdate ?>" >
                <div class="invalid-feedback">
                    Please Enter Joining Date.
                </div>                         
            </div>



            <div id='printsalarydiv' class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Salary </span>
                </div>
                <input  type="text"  id="s_printsalary"  onmousemove="wordssalary()" name="s_printsalary" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $salary ?>" >
                <div class="invalid-feedback">
                    Please Enter Salary.
                </div>                        
            </div>


            <!-- Salary in words -->
            <div  class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Salary in words </span>
                </div>
                <input  type="text"  id="s_printsalarywords" required  name="s_printsalarywords" required class="form-control autoCamelCase"  >
                <div class="invalid-feedback">
                    Please Enter Salary.
                </div>  
            </div>


            <button type="button" class="btn btn-amber btn-sm" name="issuecertificate"  id="issuecertificate" data-toggle="modal" data-target="#salaryModalCenter">
                ISSUE CERTIFICATE
            </button>


        </form>

        <?php
        $salarybtnactive = 0; 
    }
    ?>
</div>

<!-- Modal -->
<div   class="modal fade " id="salaryModalCenter" tabindex="-1" role="dialog" aria-labelledby="salaryModalCenterTitle"
       aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">SALARY CERTIFICATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="salaryprint" style="font-size: 12px">
                <!-- Default form login -->
                <form id="nolform" class=" border border-light p-5" action="" method="post">

                    <p id="salarydate" align="right" class="h8 mb-4"></p>
                    <br><br>
                    <h3  align="center" ><u>SALARY CERTIFICATE</u></h3>
                    <div >
                        <p  >
                            <label  id="s_toaddress" name="s_toaddress" class="printInput"  class="form-control"></label>
                        </p>

                        <div>
                            <p  >
                                To Whom It May Concern </p>

                            <p>
                                This is to confirm that <?php
    if ($gender == 'f')
        echo 'Ms.';
    else
        echo 'Mr.';
    ?>
                                <label id='s_pname'></label>, holder of Nationality 
                                <label id="s_nationality"></label> , Passport Number 
                                <label id="s_passportnumber"></label> is working full time at 
                                <label id="s_schoolname"></label> as an 
                                <label id="s_jobtitle"></label>. He has been employed since 
                                <label id="s_joiningdate"></label>  
                                <label id="s_salarywords"></label>
                                <label  id="s_salary"></label>
                            </p>

                            <p>
                                This letter has been given upon <?php
                                if ($gender == 'f')
                                    echo 'her';
                                else
                                    echo 'his.';
    ?>  request without any responsibility on our part   
                            </p>

                            <p>
                                Please feel free to contact us if you require any further information.
                            </p>
                            <br><br>
                        </div>
                        <div align="left"> 

                            <p>Sincerely,</p>
                            <p>Ms Rima Sarieddine</p>
                            <p>Director</p>
                            <p>Al Sanawbar School</p>
                        </div>
                    </div>
                </form>
                <!-- Default form login -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" 
                        onclick="printJS({printable: 'salaryprint', type: 'html', header: null, css: 'css/print.css'})">PRINT</button>
            </div>
        </div>
    </div>
</div>

<script>
    var d = new Date();
    document.getElementById("salarydate").innerHTML = d.toDateString();

</script>

<script>
    $('#issuecertificate').click(function () {
        var to = document.getElementById('s_printfwdto').value;
        document.getElementById('s_toaddress').textContent = 'ADDRESSED TO: ' + to;


        var schoolname = document.getElementById('s_printschool').value;
        document.getElementById('s_schoolname').textContent = schoolname;

        var name = document.getElementById('s_printname').value;
        document.getElementById('s_pname').textContent = name;

        var passportnumber = document.getElementById('s_printpassport').value;
        document.getElementById('s_passportnumber').textContent = passportnumber;

        var nationality = document.getElementById('s_printnationality').value;
        document.getElementById('s_nationality').textContent = nationality;


        var jobtitle = document.getElementById('s_printjobtitle').value;
        document.getElementById('s_jobtitle').textContent = jobtitle;

        var joiningdate = document.getElementById('s_printjoiningdate').value;
        document.getElementById('s_joiningdate').textContent = joiningdate;

        var salary = document.getElementById('s_printsalary').value;
        document.getElementById('s_salary').textContent = '(AED ' + salary + ').';

        var salarywords = document.getElementById('s_printsalarywords').value;
        document.getElementById('s_salarywords').textContent = 'with a total monthly salary of ' + salarywords;





    });

</script>
<script>
    var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
    var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    function inWords(num) {
        if ((num = num.toString()).length > 9)
            return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n)
            return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + '' : '';
        return str;
    }

    function withDecimalSalary(n) {
        var nums = n.toString().split('.')
        var whole = inWords(nums[0])
        if (whole != '')
            dhs = ' Dirhams ';
        else
            dhs = ' ';
        if (nums.length == 2) {
            var fraction = inWords(nums[1]);
            if (fraction != '')
                return  whole + dhs + fraction + ' Fils';
            else
                return  whole + dhs;
        } else {
            return  whole + dhs;
        }
    }

    document.getElementById('s_printsalary').onkeyup = function () {
        words();
    };

    function wordssalary() {
        document.getElementById('s_printsalarywords').value = withDecimal(document.getElementById('s_printsalary').value);
    }
</script>