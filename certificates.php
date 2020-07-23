<?php
include('config/dbConfig.php');
include_once 'functions.php';
session_start();
checkLoggedIn()
?>

<html lang="en">
    <head>
        <title>HR Documents - InDepth</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

        <!-- Style sheet -->
        <link rel="stylesheet" href="css/metrostyle.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="vendor/print/print.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">

        <!--<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">-->


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
    
        
    <style> .modal-dialog {
    max-width: 100%;
    margin: 20;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100vh;
    display: flex;
}</style>

    <body>

        <div class="container" style="padding: 20px">
            <div class="row">
                <?php if( $_SESSION['HR_FIN'] == 1 ||  $_SESSION['HR_FIN'] == 2){?>
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckNol();" id="radionol" name="radios" checked>
                        <label class="custom-control-label" for="radionol">NOL</label>
                    </div>
                </div>
                <?php } if( $_SESSION['HR_FIN'] == 1 ||  $_SESSION['HR_FIN'] == 2){?>
                <div class="col-sm-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckSalary();" id="radiosalary" name="radios">
                        <label class="custom-control-label" for="radiosalary">Salary Certificate</label>
                    </div>
                </div>
                <?php } if( $_SESSION['HR_FIN'] == 1 ||  $_SESSION['HR_FIN'] == 3){?>
                <div class="col-sm-2" hidden >
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckGratuity();" id="radiogratuity" name="radios">
                        <label class="custom-control-label" for="radiogratuity">Gratuity Report</label>
                    </div>
                </div>
                <?php } if( $_SESSION['HR_FIN'] == 1 ||  $_SESSION['HR_FIN'] == 3){?>
                <div class="col-sm-2" >
                    <div class="custom-control custom-radio">
                        <input value=fees type="radio" class="custom-control-input" onclick="yesnoCheckFeeCertificate();" id="radiofee" name="radios">
                        <label class="custom-control-label" for="radiofee">Fee Certificate</label>
                    </div>
                </div>
                <?php } if( $_SESSION['HR_FIN'] == 1 ||  $_SESSION['HR_FIN'] == 3){?>
                <div class="col-sm-2" >
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="formerStudentsFunction();" id="formerStudentsRadio" name="radios">
                        <label class="custom-control-label" for="formerStudentsRadio">Former Students Certificate</label>
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-2">
                    <form action="logout.php" style="float: right;padding-top: 5px; padding-right: 10px;margin-left: 5px" >
                        <button  type ='submit' href='logout.php' class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-log-out"></span> Log out
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <?php include 'nol.php'; ?>
        <?php include 'salary.php'; ?>
        <?php include 'gratuity.php'; ?>
        <?php include 'feeCertificate.php'; ?>
        <?php include 'formerStudents.php'; ?>
        
<script>
    $(function() {
        var $radios = $('input:radio[name=radios]');
        if($radios.is(':checked') === false) {
            // $radios.filter('[value=fees]').prop('checked', true);
    }   
        });
</script>

        <script type="text/javascript">
            function formerStudentsFunction() {
                if (document.getElementById('formerStudentsRadio').checked) {
                    document.getElementById('formerStudentsDiv').style.display = 'inline';
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('feeCertificate').style.display = 'none';
                    document.getElementById('printsalary').style.display = 'none';
                    document.getElementById('gratuitycalcdiv').style.display = 'none';
                } else {

                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('formerStudentsDiv').style.display = 'none';
                }
            }
            function yesnoCheckNol() {
                if (document.getElementById('radionol').checked) {
                    document.getElementById('formerStudentsDiv').style.display = 'none';
                    document.getElementById('nolform').style.display = 'inline';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('feeCertificate').style.display = 'none';
                    document.getElementById('printsalary').style.display = 'none';
                    document.getElementById('gratuitycalcdiv').style.display = 'none';
                    


                } else {

                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                }
            }


            function yesnoCheckSalary() {

                if (document.getElementById('radiosalary').checked) {
                    document.getElementById('formerStudentsDiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'inline';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('feeCertificate').style.display = 'none';
                    document.getElementById('printnol').style.display = 'none';
                    document.getElementById('gratuitycalcdiv').style.display = 'none';
                } else {

                    document.getElementById('formerStudentsDiv').style.display = 'none';
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                }
            }

            function yesnoCheckGratuity() {
                if (document.getElementById('radiogratuity').checked) {

                    document.getElementById('formerStudentsDiv').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'inline';
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('feeCertificate').style.display = 'none';
                    document.getElementById('printsalary').style.display = 'none';
                    document.getElementById('printnol').style.display = 'none';
                } else {
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                }
            }
            
            function yesnoCheckFeeCertificate() {
                if (document.getElementById('radiofee').checked) {
                    document.getElementById('formerStudentsDiv').style.display = 'none';
                    document.getElementById('feeCertificate').style.display = 'inline';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('printsalary').style.display = 'none';
                    document.getElementById('printnol').style.display = 'none';
                } else {
                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                }
            }

            window.onload = function () {
                document.getElementById('nolform').style.display = 'inline';
                document.getElementById('gratuitydiv').style.display = 'none';
                document.getElementById('feeCertificate').style.display = 'none';
                document.getElementById('salaryform').style.display = 'none';
                document.getElementById('formerStudentsDiv').style.display = 'none';

            };
        </script>
        <script src="js/calender.js"></script>
        <script src="js/yearClassSubject.js"></script>
    </head>
</html>
