<?php
$nolbtnactive = 0;
if (isset($_POST['nolsubmit']) && ($_POST['name'] !== '')) {
    $name = $_POST['name'];
    $to = $_POST['fwdto'];
    $objective = $_POST['inputobjective'];
    $schooldecl = $_POST['inputdeclaration'];

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



    $nolbtnactive = 1;
}
?>
<!-- NOL Form --> 
<div class="container" style="padding: 20px;" id="nolcontainer"  >
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <form  id="nolform" class="text-center  needs-validation  " action="#!" method="post"  novalidate>

                <p class="h4 mb-4">NO OBJECTION LETTER</p>

                <!-- Name -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Forwading To</span>
                    </div>
                    <input  type="text" list="display" style="max-height: fit-content"id="fwdto" name="fwdto" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1">
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
                    <input type="text" list="display" id="name" name="name" required  class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1">
                    <datalist  id="display"></datalist >
                    <div class="valid-feedback">
                        Employee Details Fetched.
                    </div>
                    <div class="invalid-feedback">
                        Please Choose Employee.
                    </div>
                </div>

                <!-- Intrest -->
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-size: 12px;">Objective</span>
                    </div>
                    <textarea type="text" id="inputobjective" required name="inputobjective"class="form-control autoCamelCase" aria-label="With textarea"></textarea>
                    <div class="invalid-feedback">
                        Please Enter Objective.
                    </div>
                    <div class="valid-feedback">
                        Objective Saved.
                    </div>

                </div>
                <!-- School Declration -->
                <div class="input-group" style="padding-top: 20px">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-size: 12px;">School Declaration</span>
                    </div>
                    <textarea required type="text" id="inputdeclaration"  name="inputdeclaration" class="form-control autoCamelCase" aria-label="With textarea"></textarea>
                    <div class="invalid-feedback">
                        Please Enter No Objection Declaration.
                    </div>
                    <div class="valid-feedback">
                        Declaration Saved.
                    </div>

                </div> 


                <div class="d-flex" center>
                    <div style="padding-right: 20px" >
                        <button type="submit" class="btn btn-primary btn-sm" name="nolsubmit" id="nolsubmit" >
                            SUBMIT
                        </button>
                    </div>
                    <div> 

                    </div>
                </div>

            </form></div>
        <div class="col"></div>


        <script type="text/javascript" src="js/autoFill.js"></script>
        <!-- Default form login --> </div></div>
<?php if ($nolbtnactive == 1) { ?>

    <!-- NOL Form --> 

    <div id='printnol' class="row">
        <div class="col"></div>
        <div class="col-6">
        <form   class="text-center  needs-validation  " novalidate>

            <p class="h4 mb-4">NO OBJECTION LETTER</p>

            <!-- Fwd To -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Forwading To</span>
                </div>
                <input  type="text"  id="printfwdto" name="printfwdto" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $to ?>" >
                <div class="invalid-feedback">
                    Please Enter Address.
                </div>
            </div>

            <!-- School -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">School</span>
                </div>
                <input  type="text" id="printschool" name="printschool" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $schoolname ?>" >
                <div class="invalid-feedback">
                    Please Enter School Name.
                </div>
            </div>

            <!-- Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee</span>
                </div>
                <input  type="text"  id="printname" name="printname" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $name ?>" >
                <div class="invalid-feedback">
                    Please Enter Name.
                </div>
            </div>

            <!-- First Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee First Name</span>
                </div>
                <input  type="text"  id="printfirstname" name="printfirstname" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $firstname ?>" >
                <div class="invalid-feedback">
                    Please Enter First Name.
                </div>
            </div>

            <!-- Nationality -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Nationality</span>
                </div>
                <input  type="text" id="printnationality" name="printnationality" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $nationality ?>" >
                <div class="invalid-feedback">
                    Please Enter Nationality.
                </div>
            </div>

            <!-- passport Number -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Passport</span>
                </div>
                <input  type="text" id="printpassport" name="printpassport" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $passport ?>" >
                <div class="invalid-feedback">
                    Please Enter Passport Number.
                </div>
            </div>

            <!-- Job Title -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Job Title</span>
                </div>
                <input  type="text"  id="printjobtitle" name="printjobtitle" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $jobtitle ?>" >
                <div class="invalid-feedback">
                    Please Enter Job Title.
                </div>
            </div>

            <!-- Joining Date -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Joining Date</span>
                </div>
                <input  type="text"  id="printjoiningdate" name="printjoiningdate" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $joiningdate ?>" >
                <div class="invalid-feedback">
                    Please Enter Joining Date.
                </div>                         
            </div>


            <div id="restoresalary">
                <div id='printsalarydiv' class="container">
                    <div class="row"
                         <!-- Salary -->
                         <div id='printsalarydiv' class="input-group mb-3 col-md-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Salary </span>
                            </div>
                            <input  type="text"  id="printsalary"  onmousemove="words()" name="printsalary" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?php echo $salary ?>" >
                            <div class="invalid-feedback">
                                Please Enter Salary.
                            </div>                        
                        </div>
                        <div class="col-md-2">
                            <button id='nosalary' class="btn btn-sm  btn-danger" title='Hide Salary'> X</button> 
                        </div>
                    </div>

                    <!-- Salary in words -->
                    <div  class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Salary in words </span>
                        </div>
                        <input  type="text"  id="printsalarywords" required  name="printsalarywords" required class="form-control autoCamelCase"  >
                        <div class="invalid-feedback">
                            Please Enter Salary.
                        </div>  
                    </div>

                </div>
            </div>

            <!-- Objective -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Objective </span>
                </div>
                <textarea  type="text"  id="printobjective" name="printobjective" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1" ><?php echo $objective ?></textarea>
                <div class="invalid-feedback">
                    Please Enter Objective.
                </div>                         
            </div>

            <!-- School Declaration -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Declaration </span>
                </div>
                <textarea  type="text"  id="printdeclaration" name="printdeclaration" required class="form-control autoCamelCase" placeholder="" aria-label="name" aria-describedby="basic-addon1"  ><?php echo $schooldecl ?></textarea>
                <div class="invalid-feedback">
                    Please Enter Declaration.
                </div>                         
            </div>



            <div id="restoresalarybtn">
                <button type="button" class="btn btn-primary btn-sm" name="showsalary" style="display: none" id="showsalary" >
                    USE SALARY
                </button>


                <button type="button" class="btn btn-amber btn-sm" name="issuenol" onclick="check()" id="issuenol" data-toggle="modal" data-target="#nolModalCenter">
                    ISSUE NOL
                </button>

            </div> 
        </form></div>
        <div class="col"></div>

        <?php
        $nolbtnactive = 0;
    }
    ?>
</div>







<!-- Modal -->
<div   class="modal fade " id="nolModalCenter" tabindex="-1" role="dialog" aria-labelledby="nolModalCenterTitle"
       aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">No Objection Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="nol" style="font-size: 12px">
                <!-- Default form login -->
                <form id="nolform" class=" border border-light p-5" action="" method="post">

                    <p id="date" align="right" class="h8 mb-4"></p>
                    <br><br>
                    <h3  align="center" ><u>No Objection Letter</u></h3>
                    <div >
                        <div  align="left" >
                            <label  id="toaddress" name="toaddress" class="printInput"  class="form-control"></label>
                        </div>

                        <div>
                            <p  >
                                Dear Sir/Madam </p>
                            <p>
                                Greetings, </p>
                            <p>
                                This is to confirm that <?php
                                if ($gender == 'f')
                                    echo 'Ms.';
                                else
                                    echo 'Mr.';
                                ?>
                                <label id='pname'></label>, holder of Nationality 
                                <label id="nationality"></label> , Passport Number 
                                <label id="passportnumber"></label> is working full time at 
                                <label id="schoolname"></label> as an 
                                <label id="jobtitle"></label>. He has been employed since 
                                <label id="joiningdate"></label>  
                                <label id="salarywords"></label>
                                <label  id="salary"></label>
                            </p>

                            <p>
                                <label id="firstname"></label> has expressed interest in
                                <label id="objective"></label>. 
                                Our organization has no objection regarding <?php
                                if ($gender == 'f')
                                    echo 'her';
                                else
                                    echo 'his';
                                ?> 
                                <label id="schooldeclaration"></label>.
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
                        onclick="printJS({printable: 'nol', type: 'html', header: null, css: 'css/print.css'})">PRINT</button>
            </div>
        </div>
    </div>
</div>

<script>
    var d = new Date();
    document.getElementById("date").innerHTML = d.toDateString();

</script>



<!--form validation-->
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('click', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script>
    $('#issuenol').click(function () {
        var to = document.getElementById('printfwdto').value;
        document.getElementById('toaddress').textContent = to;


        var schoolname = document.getElementById('printschool').value;
        document.getElementById('schoolname').textContent = schoolname;

        var name = document.getElementById('printname').value;
        document.getElementById('pname').textContent = name;

        var passportnumber = document.getElementById('printpassport').value;
        document.getElementById('passportnumber').textContent = passportnumber;

        var nationality = document.getElementById('printnationality').value;
        document.getElementById('nationality').textContent = nationality;


        var jobtitle = document.getElementById('printjobtitle').value;
        document.getElementById('jobtitle').textContent = jobtitle;

        var joiningdate = document.getElementById('printjoiningdate').value;
        document.getElementById('joiningdate').textContent = joiningdate;

        var salary = document.getElementById('printsalary').value;
        document.getElementById('salary').textContent = '(AED ' + salary + ').';

        var salarywords = document.getElementById('printsalarywords').value;
        document.getElementById('salarywords').textContent = 'with a total monthly salary of ' + salarywords;


        var firstname = document.getElementById('printfirstname').value;
        document.getElementById('firstname').textContent = firstname;

        var objective = document.getElementById('printobjective').value;
        document.getElementById('objective').textContent = objective;

        var declaration = document.getElementById('printdeclaration').value;
        document.getElementById('schooldeclaration').textContent = declaration;


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

    function withDecimal(n) {
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

    document.getElementById('printsalary').onkeyup = function () {
        words();
    };

    function words() {
        document.getElementById('printsalarywords').value = withDecimal(document.getElementById('printsalary').value);
    }
</script>

<script>
    $(document).ready(function () {
        $("#nosalary").click(function () {
            document.getElementById('salary').textContent = '.';
            document.getElementById('salarywords').textContent = '';
            x = $('#printsalarydiv').detach();
            $("#showsalary").show();
            $("#restoresalarybtn").prepend(y);
        });

        $("#showsalary").click(function () {
            $("#restoresalary").prepend(x);
            y = $('#showsalary').detach();
        });



    });
</script>

<script type="text/javascript" src="js/autoFill.js"></script>