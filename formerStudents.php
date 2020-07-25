<div id='debug'></div>
<div id='formerStudentsDiv' style="display: none;">
    <!-- Title -->
    <div class='row container' style='min-width:100%'>
        <div class='col-1'></div>
        <div class='col-10'><h1>Former Students</h1></div>
        <div class='col-1'></div>
    </div>
    <!-- Dropdowns -->
    <div class='row container' style='min-width:100%'>
        <div class='col-1'></div>
        <div class='col-10'>
            <table class='table table-bordered mx-auto' style='width:100%'>
                <thead class='thead-dark'>
                    <tr>
                        <th>YEAR</th>
                        <th>CLASS</th>
                        <th>SECTIONS</th>
                        <th>SUBJECT</th>
                    </tr>
                </thead>
                <tr>
                    <td><select id='years' onchange='search()'></select></td>
                    <td><select id='classes' onchange='search()'></select></td>
                    <td><select id='sections' onchange='search()'></select></td>
                    <td><select id='subjects' onchange='search()'></select></td>
                </tr>
            </table>
        </div>
        <div class='col-1'></div>
    </div>
    <div class='row container' style='min-width:100%'>
        <div class='col-1'></div>
        <div class='col-10'></div>
        <div class='col-1'></div>
    </div>
    <!-- Result -->
    <div class='row container' style='min-width:100%'>
        <div class='col-1'></div>
        <div class='col-10' id='result'></div>
        <div class='col-1'></div>
    </div>
</div>