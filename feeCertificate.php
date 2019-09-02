<?php 
function ArabicDate() {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d'); // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

   
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = date('d').' / '.$ar_month.' / '.date('Y');
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

?>

<div class="container" id="feeCertificate" style="display: inline">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-10">

            <div class="col-6">
                <div class="form-group ">
                    <label for="searchStudent">Search Student | بحث الطالب </label>
                    <input  type="text" class="form-control" id="searchStudent" onkeyup="showStudents(this.value)" aria-describedby="searchHelp" placeholder="Search Students">
                    <small id="searchHelp" class="form-text text-muted"><b>Enter family ID, student ID, student name |أدخل رقم العائلة  ، رقم الطالب ، اسم الطالب </b></small>
                </div>              
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-10">
            <div id='tableStudents' style="padding-top: 20px;">
            </div>
        </div>  
        <div class="col">
        </div>

    </div>


    <!-- Modal -->
    <div   class="modal fade " id="feeModalCenter" tabindex="-1" role="dialog" aria-labelledby="nolModalCenterTitle"
           aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Fee Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="feeCertificatePrint" style="padding: 20px;">
                    <p id="feedate" style="font-size: 14px" align="right" class="h8 mb-4"></p>
                    <br><br>
                    <p  align="center" style="font-size: 18px"  ><u>To Whom It May Concern</u></p>

                    <p  align="left" style="font-size:18px" > This is to certify that the student(s) 
                        below is registered at <strong>AL Sanawbar School</strong> 
                        for the academic year 2019-2020. </p>

                    <table id="feeTable" class='table table-bordered table-sm student-list'> 
                    </table><button onclick="addstudent()"id="addstudent" title="Add Student" class="add-student btn btn-sm " style="color: green;  font-weight: 100px">&#43; Add Student</button>

                    <div align="center">
                        <p style="font-size: 14px" align="left"><br><u><b>This Certificate has been issued upon the parent’s request.
                                    The School doesn’t bear any legal responsibility towards others.</b></u></p>
                    </div>  
                    <br>
                    <ul style=" list-style-type:none; font-size:16px">Note:
                        <li style="font-size:16px">&#10022	All the information listed above is authentic. Al Sanawbar pledges abiding by the ADEK approved annual fees.</li>
                        <li style="font-size:16px">&#10022	Any alteration to the content of this certificate makes it void.</li>    
                    </ul>

                    <p style="font-size: 14px; padding-top: 50px;" align="right"><i>School Principal</i></p>
                    <hr>
                    <p style="font-size: 14px; ">For official use only</p>

                    <p style="font-size: 14px;">The documents, information, and fees were reviewed and found authentic.</p>
                    <div class="row" style="padding: 20px;">        
                        <p style="font-size: 14px;display: inline-block"> Accountant<br> Signature</p>
                        <div  style="height :50px; width: 200px;border:1px solid #000; margin-left: 10px;display: inline-block"></div></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"  id='printbtn'
                            onclick="printJS({printable: 'feeCertificatePrint', type: 'html', header: null, documentTitle: null, ignoreElements: ['addstudent', 'delstudent'], honorColor: true, css: 'css/print.css'})">PRINT</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div   class="modal fade " id="feeModalCenterArabic" tabindex="-1" role="dialog" aria-labelledby="nolModalCenterTitle"
           aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 align='right' class="modal-title" id="exampleModalLongTitleArabic">شهادة الرسوم</h5>
                    <button align='left' type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="feeCertificatePrintArabic" style="padding: 20px;">
                    <div align='right'>  <div id="feedatear" style="font-size: 14px"  class="h8 mb-4"></div><?php echo ArabicDate();?></div> 
                    <br><br>
                    <p  align="center" style="font-size: 18px"  ><u>شهادة لمن يهمه الامر بالرسوم الدراسية</u></p>

                    <p  align="right" style="font-size:18px" >تشهد إدارة مدرسة الصنوبر  الخاصة 
                        بان الطالب المذكور ادناه مسجل في المدرسة للعام الدراسي (2018 / 2019) وفق الرسوم المستحقة التالية: </p>

                    <table id="feeTableAr" class='table table-bordered table-sm student-listAr arabictd'> 
                    </table><button onclick="addstudentAr()"id="addstudentar" title="إضافة طالب جديد" class="add-student btn btn-sm " style="color: green;  font-weight: 100px">&#43; أضف طالب</button>
                    

                    <div align="center">
                        <p style="font-size: 14px" align="right"><br><u><b>اصدرت هذه الشهادة بناءاً على طلب ولي الامر دون تحمل ادنى مسئولية تجاه الغير</b></u></p>
                    </div>  
                    <br>
                    <ul align='right' style=" list-style-type:none; font-size:16px">ملاحظات:
                        <li style="font-size:16px">تتعھد المدرسة بصحة البیانات اعلاه والالتزام بالرسوم الدراسیة المعتمدة من قبل مجلس ابوظبي للتعلیم دون زیادة او نقصان
                            &#10022</li>
                        <li style="font-size:16px">	اي كشط او تغير في محتوى الشهادة يلغيها  &#10022</li>    
                    </ul>

                    <p style="font-size: 14px; padding-top: 50px;" align="left"><i> مدير المدرسة </i></p>
                    <hr>
                    <div align='right'>
                        <p style="font-size: 14px; ">لللاستعمال الرسمي </p>

                        <p style="font-size: 14px;">تم تدقيق البيانات والرسوم الدراسية ووجدت صحيحة </p>
                        <div class="row" style="padding: 20px;">        
                            <div  style="height :50px; width: 200px;border:1px solid #000; margin-left: 10px;display: inline-block"></div></div>

                        <p style="font-size: 14px;display: inline-block"> اسم الموظف </p>
                    </div></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id=""
                            onclick="printJS({printable: 'feeCertificatePrintArabic', type: 'html', ignoreElements: ['addstudentar', 'delstudentAr'], maxWidth: 500, css: 'css/print.css'})">PRINT</button>
                </div>
            </div>
        </div>
    </div>
    
</div>


    <script>
        var d = new Date();
        document.getElementById("feedate").innerHTML = d.toDateString();
        
        var arDate = new Intl.DateTimeFormat('ar-TN-u-ca-islamic', {day: 'numeric', month: 'long',weekday: 'long',year : 'numeric'}).format(Date.now());
        document.getElementById("feedatear").innerHTML = arDate;
    </script>

    <script>
        
        
        
        
        function showStudents(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("tableStudents").innerHTML = "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableStudents").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "showStudents.php?q=" + str, true);
            xhttp.send();
        }
    </script>

    <script>
        function showFeeTable(str) {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("feeTable").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "showFeeTable.php?q=" + str, true);
            xhttp.send();
        }

    </script>
    
        <script>
        function showFeeTableAr(str) {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("feeTableAr").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "showFeeTableAr.php?q=" + str, true);
            xhttp.send();
        }

    </script>

 
    <script>
        
        document.getElementById('feeTable').onkeyup = function (){           
            cal_total();
        }
        
                document.getElementById('feeTableAr').onkeyup = function (){           
            cal_totalAr();
        }
        
        function cal_total(){
            table_length = document.getElementById("feeTable").rows.length;
            for(rowId = 1 ; rowId < table_length ; rowId++){
            var uniform = document.getElementById('uniform' + rowId).textContent;
            
            if (uniform === ''){ 
                document.getElementById('uniform' + rowId).textContent = '0';
                uniform = document.getElementById('uniform' + rowId).textContent;}
            
            var bus = document.getElementById('bus' + rowId).textContent;
                        if (bus === ''){ 
                document.getElementById('bus' + rowId).textContent = '0';
                bus = document.getElementById('bus' + rowId).textContent;}
            
            var book = document.getElementById('book' + rowId).textContent;
             if (book === ''){ 
                document.getElementById('book' + rowId).textContent = '0';
                book = document.getElementById('book' + rowId).textContent;}
            
            
            var tution = document.getElementById('tution' + rowId).textContent;
            if (tution === ''){ 
                document.getElementById('tution' + rowId).textContent = '0';
                tution = document.getElementById('tution' + rowId).textContent;}
            
            var paid = document.getElementById('paid'+rowId).textContent;
            if (paid === ''){ 
                document.getElementById('paid' + rowId).textContent = '0';
                paid = document.getElementById('paid' + rowId).textContent;}
            
            var total = parseInt(uniform) + parseInt(bus) + parseInt(book) + parseInt(tution);
            document.getElementById('total' + rowId).textContent = total;
            document.getElementById('balance'+rowId).textContent = total - parseInt(paid);
        }
    }
    
    
     function cal_totalAr(){
            table_length = document.getElementById("feeTableAr").rows.length;
            for(rowId = 1 ; rowId < table_length ; rowId++){
            var uniform = document.getElementById('uniform' + rowId).textContent;
            
            if (uniform === ''){ 
                document.getElementById('uniform' + rowId).textContent = '0';
                uniform = document.getElementById('uniform' + rowId).textContent;}
            
            var bus = document.getElementById('bus' + rowId).textContent;
                        if (bus === ''){ 
                document.getElementById('bus' + rowId).textContent = '0';
                bus = document.getElementById('bus' + rowId).textContent;}
            
            var book = document.getElementById('book' + rowId).textContent;
             if (book === ''){ 
                document.getElementById('book' + rowId).textContent = '0';
                book = document.getElementById('book' + rowId).textContent;}
            
            
            var tution = document.getElementById('tution' + rowId).textContent;
            if (tution === ''){ 
                document.getElementById('tution' + rowId).textContent = '0';
                tution = document.getElementById('tution' + rowId).textContent;}
            
            var paid = document.getElementById('paid'+rowId).textContent;
            if (paid === ''){ 
                document.getElementById('paid' + rowId).textContent = '0';
                paid = document.getElementById('paid' + rowId).textContent;}
            
            var total = parseInt(uniform) + parseInt(bus) + parseInt(book) + parseInt(tution);
            document.getElementById('total' + rowId).textContent = total;
            document.getElementById('balance'+rowId).textContent = total - parseInt(paid);
        }
    }
        
        


        function applyfees(str) {
            var table = document.getElementById('feeTable');
            var cells = table.getElementsByTagName('td');

            for (var i = 0; i < cells.length; i++) {
                // Take each cell
                var cell = cells[i];
                // do something on onclick event for cell
                cell.onchange = function () {
                    // Get the row id where the cell exists
                    var rowId = this.parentNode.rowIndex;

                    var rowSelected = table.getElementsByTagName('tr')[rowId];

                    switch (str) {
                        case "KG1":
                        case "KG2":
                            feesKG(rowSelected, rowId);
                            Break;
                        case "GR1":
                        case "GR2":
                        case "GR3":
                        case "GR4":
                            feesGR1234(rowSelected, rowId);
                            Break;
                        case "GR5":
                        case "GR6":
                            feesGR56(rowSelected, rowId);
                            Break;
                        case "GR7":
                        case "GR8":
                            feesGR78(rowSelected, rowId);
                            Break;
                        case "GR9":
                            feesGR9(rowSelected, rowId);
                            Break;
                        case "GR10":
                            feesGR10(rowSelected, rowId);
                            Break;
                        case "GR11":
                            feesGR11(rowSelected, rowId);
                            Break;
                        case "GR12":
                            feesGR12(rowSelected, rowId);
                            Break;
                    }



                }
            }

        } //end of function

function applyfeesAr(str) {
            var tableAr = document.getElementById('feeTableAr');
            var cells = tableAr.getElementsByTagName('td');

            for (var i = 0; i < cells.length; i++) {
                // Take each cell
                var cell = cells[i];
                // do something on onclick event for cell
                cell.onchange = function () {
                    // Get the row id where the cell exists
                    var rowId = this.parentNode.rowIndex;

                    var rowSelected = tableAr.getElementsByTagName('tr')[rowId];

                    switch (str) {
                        case "KG1":
                        case "KG2": 
                            feesKGAr(rowSelected, rowId,);
                            Break;
                        case "GR1":
                        case "GR2":
                        case "GR3":
                        case "GR4":
                            feesGR1234Ar(rowSelected, rowId);
                            Break;
                        case "GR5":
                        case "GR6":
                            feesGR56Ar(rowSelected, rowId);
                            Break;
                        case "GR7":
                        case "GR8":
                            feesGR78Ar(rowSelected, rowId);
                            Break;
                        case "GR9":
                            feesGR9Ar(rowSelected, rowId);
                            Break;
                        case "GR10":
                            feesGR10Ar(rowSelected, rowId);
                            Break;
                        case "GR11":
                            feesGR11Ar(rowSelected, rowId);
                            Break;
                        case "GR12":
                            feesGR12Ar(rowSelected, rowId);
                            Break;
                    }



                }
            }

        } //end of function


    </script>




<script>
    function deleteRowAr(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("feeTableAr").deleteRow(i);
    }



    function addstudentAr() {
        var newRow = jQuery("<tr style='text-align:right'><td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control  ></label></td>\n\
      <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
          <td><select id='grselect' onchange='applyfeesAr(this.options[this.selectedIndex].value); ' class='form-control btn-select'>\n\
      <option selected disabled>اختر الصف</option>\n\
      <option value='KG1'>روضة  ١</option>\n\
      <option value='KG2'>روضة  ٢ </option>\n\
      <option value='GR1'> الصف١ </option>\n\
      <option value='GR2'>الصف٢ </option>\n\
       <option value='GR3'>الصف٣ </option>\n\
       <option value='GR4'>الصف٤ </option>\n\
      <option value='GR5'>الصف٥ </option>\n\
       <option value='GR6'>الصف٦ </option>\n\
       <option value='GR7'>الصف٧ </option>\n\
      <option value='GR8'>الصف٨ </option>\n\
      <option value='GR9'>الصف٩ </option>\n\
      <option value='GR10'>الصف١٠ </option>\n\
      <option value='GR11'>الصف١١ </option>\n\
      <option value='GR12'>الصف١٢ </option>\n\
      </select></td>\n\<td><select class='form-control selectprint' ><option>أمريكي</option><option>وزارة التعليم</option></select></td>\n\
     <td><input id='studentName' name='studentName' placeholder='أدخل اسم الطالب' style='text-transform:capitalize' type='text'/></td>\n\
      <td id='delstudentAr'><span   onclick='deleteRowAr(this)' title='حذف الطالب' style='cursor: pointer; color:red' class='close'>&#10008;</span></td></tr>");
        jQuery('table.student-listAr').append(newRow);
    }
</script>

 <script>
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("feeTable").deleteRow(i);
        }



        function addstudent() {
            var newRow = jQuery("<tr><td><input id='studentName' name='studentName' placeholder='Enter Student Name' style='text-transform:capitalize' type='text'/></td><td>\n\
        <select class='form-control selectprint' ><option>American</option><option>MOE</option></select></td>\n\
        <td><select id='grselect' onchange='applyfees(this.options[this.selectedIndex].text); ' class='form-control btn-select'>\n\
        <option selected disabled>SELECT GRADE</option>\n\
        <option value='KG1'>KG1</option>\n\
        <option value='KG2'>KG2</option>\n\
        <option value='GR1'>GR1</option>\n\
        <option value='GR2'>GR2</option>\n\
         <option value='GR3'>GR3</option>\n\
         <option value='GR4'>GR4</option>\n\
        <option value='GR5'>GR5</option>\n\
         <option value='GR6'>GR6</option>\n\
         <option value='GR7'>GR7</option>\n\
        <option value='GR8'>GR8</option>\n\
        <option value='GR9'>GR9</option>\n\
        <option value='GR10'>GR10</option>\n\
        <option value='GR11'>GR11</option>\n\
        <option value='GR12'>GR12</option>\n\
        </select>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control  ></label></td>\n\
        <td class=tdstyle ><label contentEditable class=form-control ></label></td>\n\
        <td id='delstudent'><span   onclick='deleteRow(this)' title='Remove Student' style='cursor: pointer; color:red' class='close'>&#10008;</span></td></tr>");
            jQuery('table.student-list').append(newRow);
        }
    </script>

    <!--Fee English-->
    <script>
             function feesKG(row, rowId) {
            
            row.cells[3].innerHTML = "<label contentEditable class=form-control  style='text-align:center' id='uniform" + rowId + "' type='number' min='0' value='90'>90</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' placeholder='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='840'>840</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='13270'>13270</label>";
            row.cells[7].innerHTML = "<label  class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();

        }

        function feesGR1234(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onload='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1320'>1320</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='15230'>15230</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }


        function feesGR56(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1680'>1680</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='18110'>18110</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }


        function feesGR78(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1680'>1680</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='22840'>22840</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }

        function feesGR9(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1920'>1920</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }
        function feesGR10(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1200'>1200</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }

        function feesGR11(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='2760'>2760</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }

        function feesGR12(row, rowId) {
            row.cells[3].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1800'>1800</label>";
            row.cells[6].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[7].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[8].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[9].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_total();
        }
</script>

<!--Fee arabic-->

<script>
    function feesKGAr(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control  style='text-align:center' id='uniform" + rowId + "' type='number' min='0' value='90'>90</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' placeholder='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='840'>840</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='13270'>13270</label>";
            row.cells[2].innerHTML = "<label  class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();

        }

        function feesGR1234Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onload='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1320'>1320</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='15230'>15230</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }


        function feesGR56Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1680'>1680</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='18110'>18110</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }


        function feesGR78Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1680'>1680</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='22840'>22840</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }

        function feesGR9Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1920'>1920</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }
        function feesGR10Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1200'>1200</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }

        function feesGR11Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='2760'>2760</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }

        function feesGR12Ar(row, rowId) {
            row.cells[6].innerHTML = "<label contentEditable class=form-control onchange='total(" + rowId + ")' style='text-align:center' id='uniform" + rowId + "' type='number' value='100'>100</label>";
            row.cells[5].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='bus" + rowId + "' type='number' value='5000'>5000</label>";
            row.cells[4].innerHTML = "<label contentEditable class=form-control id='book" + rowId + "' type='number' style='text-align:center' value='1800'>1800</label>";
            row.cells[3].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='tution" + rowId + "' type='number' value='28190'>28190</label>";
            row.cells[2].innerHTML = "<label contentEditable class=form-control style='text-align:center' id='total" + rowId + "' type='number'  ></label>";
            row.cells[1].innerHTML = "<label  contentEditable class=form-control style='text-align:center' id='paid" + rowId + "' type='number'  >0</label>";
            row.cells[0].innerHTML = "<label   class=form-control style='text-align:center' id='balance" + rowId + "' type='number'  ></label>";
            cal_totalAr();
        }
</script>                                                                