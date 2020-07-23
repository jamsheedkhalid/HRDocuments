<div id='debug'></div>
<div id='formerStudentsDiv' style="display: none;">
    <h1>Former Students</h1>    
    <div class='row container'>
        <table class='table table-bordered mx-auto' style='width:100%'>
            <tr>
                <th>YEAR</th>
                <th>CLASS</th>
                <th>SECTIONS</th>
                <th>SUBJECT</th>
            </tr>
            <tr>
                <td><select id='years' onchange='search()'></select></td>
                <td><select id='classes' onchange='search()'></select></td>
                <td><select id='sections' onchange='search()'></select></td>
                <td><select id='subjects' onchange='search()'></select></td>
            </tr>
        </table>
    </div>
    <div class='row container' id='result'>
    </div>
</div>