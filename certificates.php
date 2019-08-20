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

    <body>

        <div class="container" style="padding: 20px">
            <div class="row">
                <div class="col-sm-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckNol();" id="radionol" name="radios">
                        <label class="custom-control-label" for="radionol">NOL</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckSalary();" id="radiosalary" name="radios">
                        <label class="custom-control-label" for="radiosalary">Salary Certificate</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" onclick="yesnoCheckGratuity();" id="radiogratuity" name="radios">
                        <label class="custom-control-label" for="radiogratuity">Gratuity Report</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="radiofee" name="radios">
                        <label class="custom-control-label" for="radiofee">Fee Certificate</label>
                    </div>
                </div>
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


        <script type="text/javascript">


            function yesnoCheckNol() {
                if (document.getElementById('radionol').checked) {

                    document.getElementById('nolform').style.display = 'inline';
                    document.getElementById('salaryform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';

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
                    document.getElementById('salaryform').style.display = 'inline';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('nolform').style.display = 'none';

                    document.getElementById('printnol').style.display = 'none';
                    document.getElementById('gratuitycalcdiv').style.display = 'none';

                } else {

                    document.getElementById('nolform').style.display = 'none';
                    document.getElementById('gratuitydiv').style.display = 'none';
                    document.getElementById('salaryform').style.display = 'none';
                }
            }

            function yesnoCheckGratuity() {
                if (document.getElementById('radiogratuity').checked) {

                    document.getElementById('gratuitydiv').style.display = 'inline';
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
                document.getElementById('nolform').style.display = 'none';
                document.getElementById('gratuitydiv').style.display = 'none';

                document.getElementById('salaryform').style.display = 'none';

            };

        </script>





    </body>
    <script src="js/calender.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>-->
</html>