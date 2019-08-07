<?php
include('config/dbConfig.php');
session_start();

if (isset($_POST['submit']) && ($_POST['name'] !== '')) {    
    $_SESSION['name'] = $_POST['name'];
    $name = $_POST['name'];

    $sql = " SELECT nationality_id, job_title, joining_date, first_name from employees WHERE employee_number "
            . "LIKE '$name%' OR first_name LIKE '%$name%' OR middle_name LIKE '%$name%' "
            . "OR last_name LIKE '%$name%'  ";
//echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jobtitle = $row['job_title'];
        }
    }

    $conn->close();
}
?>

<html lang="en">
    <head>
        <title>HR Documents - InDepth</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

        <!-- Style sheet -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="vendor/print/print.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>
        <!--print-->
        <script src="vendor/print/print.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/autoFill.js"></script>
    </head>

    <body>

        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark red lighten-1">
            <a class="navbar-brand" href="#" style="font-family: myFirstFont">InDepth Docx </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" title="Issue No Objection Letter">NOL
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Issue Salary Certificate ">Salary Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Create Gratuity Report">Gratuity Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Issue Fee Certificate">Fee Certificate</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item avatar">
                        <a class="nav-link p-0" href="#" id="en">
                            <img src="images/icons/en.png" class="rounded-circle z-depth-0"
                                 alt="avatar image" height="35">
                        </a>

                    </li>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item avatar">
                            <a class="nav-link p-0" href="#" id="ar">
                                <img src="images/icons/ar.png" class="rounded-circle z-depth-0"
                                     alt="avatar image" height="35">
                            </a>

                        </li>
                    </ul>
            </div>
        </nav>
        <!--/.Navbar -->

        <!-- Default form login --> 
        <div class="container" style="padding: 20px">
            <div class="row">
                <form  class="text-center border  border-light p-5 col-md-6" action="#!" method="post">

                    <p class="h4 mb-4">NO OBJECTION LETTER</p>
                    
                    <!-- Name -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Forwading To</span>
                        </div>
                        <input type="text" list="display" id="fwdto" name="fwdto"  class="form-control" placeholder="" aria-label="name" aria-describedby="basic-addon1">
                        <datalist  id="display"></datalist >
                    </div>


                    <!-- Name -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 12px"id="basic-addon1">Employee</span>
                        </div>
                        <input type="text" list="display" id="name" name="name"  class="form-control" placeholder="" aria-label="name" aria-describedby="basic-addon1">
                        <datalist  id="display"></datalist >
                    </div>

                    <!-- Intrest -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 12px;">Objective</span>
                        </div>
                        <textarea type="text" id="inputIntrest"  name="inputobjective"class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <!-- School Declration -->
                    <div class="input-group" style="padding-top: 20px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 12px;">School Decleration</span>
                        </div>
                        <textarea type="text" id="inputdecelration" name="inputdecelration" class="form-control" aria-label="With textarea"> </textarea>
                    </div>

                    <!-- Issue button -->
                    <button type="button" class="btn btn-info btn-block my-4" name="submit" id="submit" data-toggle="modal" data-target="#exampleModalCenter">
                        ISSUE NOL
                    </button>

                </form>
                <script type="text/javascript" src="js/autoFill.js"></script>
                <!-- Default form login --> </div></div>





        <!-- Modal -->
        <div   class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <p class="h5 mb-4" align="center" ><u> No Objection Letter</u></p>
                            <div >
                                <div style=" width:content-box" align="left" class="md-form   form-sm">
                                    <input type="text" id="toaddress" class="printInput"  placeholder="To Address " class="form-control">
                                </div>
                                <p>
                                    Dear Sir/Madam </p>
                                <p>
                                    Greetings, </p>
                                <p>
                                    This is to confirm that Mr./Ms. 
                                    <input type="text" id="formname" name="formname" class="printInput"  value="<?php echo $_SESSION['name'] ?>"class="form-control"  placeholder=" Name">
                                    , holder of Nationality 
                                    <input type="text"  id="nationality" class="printInput"   placeholder=" Nationality"> Passport Number 
                                    <input type="text"  id="passportnumber"  class="printInput"   placeholder=" Passport Number"> is working full time at Al Sanawbar School as an 
                                    <input type="text"  id="jobtitle" value="<?php echo $jobtitle ?>" class="printInput" placeholder=" Job Title">. 
                                    He has been employed since <input type="text"  id="joiningdate" class="printInput "   placeholder=" Joining Date"> with a total monthly salary of 
                                    AED (<input type="text"  id="amount"  class="printInput"   placeholder=" Amount in Figures"> ) 
                                    <input type="text"  id="amountwords"  class="printInput"   placeholder=" Amount in words">.
                                </p>

                                <p>
                                    <input type="text"  id="firstname" class="printInput "   placeholder=" Name"> has expressed interest in
                                    <input type="text"  id="interest" class="printInput "   placeholder=" Interest">. 
                                    Our organization has no objection regarding his\her <input type="text" id="schooldecleration" class="printInput"    placeholder=" School Deceleration">.
                                </p>

                                <p>
                                    Please feel free to contact us if you require any further information.
                                </p>
                                <br><br>
                                <div align="left"> <!– this can be changed to "left" if preferred–>

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

    </body>

    <script>
        var d = new Date();
        document.getElementById("date").innerHTML = d.toDateString();


        function resizable(el, factor) {
            var int = Number(factor) || 7.7;
            function resize() {
                el.style.width = ((el.value.length + 1) * int) + 'px'
            }
            var e = 'keyup,keypress,focus,blur,change'.split(',');
            for (var i in e)
                el.addEventListener(e[i], resize, false);
            resize();
        }
        resizable(document.getElementById('toaddress'), 7);
        resizable(document.getElementById('name'), 7);
        resizable(document.getElementById('nationality'), 7);
        resizable(document.getElementById('jobtitle'), 7);
        resizable(document.getElementById('joiningdate'), 7);
        resizable(document.getElementById('amount'), 7);
        resizable(document.getElementById('amountwords'), 7);
        resizable(document.getElementById('firstname'), 7);
        resizable(document.getElementById('interest'), 7);
        resizable(document.getElementById('passportnumber'), 7);
        resizable(document.getElementById('schooldecleration'), 7);



    </script>
    <script type="text/javascript" src="js/autoFill.js"></script>


    <!--
        <script type="text/javascript">
    
            function change(name) { 
    
                if (name == ''){
                    document.getElementById("name").innerHTML = "";
                return;}
                else{
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState === 4)
                            document.getElementById("nolform").innerHTML = this.responseText;
                    };
                    xmlhttp.open("POST", "db/employeeDetails.php?name=" + name, false);
                    xmlhttp.send();
                }
            }
    
    
        </script>-->

</html>