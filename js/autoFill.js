//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "employeeName" div in "employeeName.php" file.
   $('#name').val(Value);
   //Hiding "display" div in "employeeName.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "employeeName.php" file. This function will be called.
   $("#name").keyup(function() {
       //Assigning employeeName box value to javascript variable named as "name".
       var name = $('#name').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "employeeName.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "../db/employeeSearch.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "employeeName" variable.
                   name: name
               },
              
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "employeeName.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});