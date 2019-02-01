<?php
$title = "Admin";
include './header.php';
?>

<!--admin-->
<div class="container" style="padding-top: 50px;">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header text-center">Admin Rights</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#dept" data-toggle="tab">Department</a></li>
            <li><a href="#dsgn" data-toggle="tab">Designation</a></li>
            <li><a href="#shift" data-toggle="tab">Shift</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="dept">
                <h3>Department</h3>
                <div class="site-form-container col-lg-12 jumbotron" id="deptContainer">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputDept" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDept" placeholder="Department">
                                </div>
                            </div>   
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" id="cnlDeptBtn" onclick="hideAddForm('deptContainer')" class="btn btn-default btn-sm">Cancel</button>
                                    <button type="button" onclick="addDept()" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <button onclick="showAddForm('deptContainer')" class="btn btn-primary btn-sm">Add Department</button>
                <table class="table table-striped table-hover" style="margin-top: 30px">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody id="showDept">
                        
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="dsgn">
                <h3>Designation</h3>
                <div class="site-form-container col-lg-12 jumbotron" id="desgContainer">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputDesg" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDesg" placeholder="Designation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" id="cnlDesgBtn" onclick="hideAddForm('desgContainer')" class="btn btn-default btn-sm">Cancel</button>
                                    <button type="button" onclick="addDesg()" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <button onclick="showAddForm('desgContainer')" class="btn btn-primary btn-sm">Add Designation</button>
                <table class="table table-striped table-hover" style="margin-top: 30px">
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody id="showDesg">
                        
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="shift">
                <h3>Shift</h3>
                <div class="site-form-container col-lg-12 jumbotron" id="shiftContainer">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputShift" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputShift" placeholder="Shift">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLogin" class="col-lg-2 control-label">Login</label>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="inputLogin" placeholder="Shift">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLogout" class="col-lg-2 control-label">Logout</label>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="inputLogout" placeholder="Shift">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" id="cnlShiftBtn" onclick="hideAddForm('shiftContainer')" class="btn btn-default btn-sm">Cancel</button>
                                    <button type="button" onclick="addShift()" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <button onclick="showAddForm('shiftContainer')" class="btn btn-primary btn-sm">Add Shift</button>
                <table class="table table-striped table-hover" style="margin-top: 30px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Login</th>
                            <th>Logout</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody id="showShift">
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
<!-- /admin -->

<script>
    //View Department
    function viewDept(){
        $('#showDept').html('');
        var dataString = "viewdept=1";
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                var data = $.parseJSON(result);
                for(var i = 0; i < data.length; i++){
                    dataValue = data[i];
                    $("#showDept").append("<tr><td>" + dataValue.name + "</td><td><button onclick='delDept("+dataValue.id+")' class='btn btn-danger btn-sm'>Delete</button></td></tr>");
                };
            }
        });
    }
    window.onload = viewDept();
    //Add Department
    function addDept(){
        var dept = $('#inputDept').val();
        if(dept !== ''){
            var dataString = "dept="+dept;
            $.ajax({
                type: "POST",
                url: "modules/admin-right.php",
                data: dataString,
                cache: false,
                success: function(result){
                    if(result === 'success'){
                        $('#cnlDeptBtn').click();
                        viewDept();
                    }else{
                        alert(result);
                    }
                }
            });
        }
    }
    //Delete Department
    function delDept(id){
        var dataString = "deldept="+id;
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                if(result === 'success'){
                    viewDept();
                }else{
                    alert(result);
                }
            }
        });
    }
    
    
    //View Designation
    function viewDesg(){
        $('#showDesg').html('');
        var dataString = "viewdesg=1";
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                var data = $.parseJSON(result);
                for(var i = 0; i < data.length; i++){
                    dataValue = data[i];
                    $("#showDesg").append("<tr><td>" + dataValue.name + "</td><td><button onclick='delDesg("+dataValue.id+")' class='btn btn-danger btn-sm'>Delete</button></td></tr>");
                };
            }
        });
    }
    window.onload = viewDesg();
    //Add Designation
    function addDesg(){
        var desg = $('#inputDesg').val();
        if(desg !== ''){
            var dataString = "desg="+desg;
            $.ajax({
                type: "POST",
                url: "modules/admin-right.php",
                data: dataString,
                cache: false,
                success: function(result){
                    if(result === 'success'){
                        $('#cnlDesgBtn').click();
                        viewDesg();
                    }else{
                        alert(result);
                    }
                }
            });
        }
    }
    //Delete Designation
    function delDesg(id){
        var dataString = "deldesg="+id;
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                if(result === 'success'){
                    viewDesg();
                }else{
                    alert(result);
                }
            }
        });
    }
    
    //View Shift
    function viewShift(){
        $('#showShift').html('');
        var dataString = "viewshift=1";
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                var data = $.parseJSON(result);
                for(var i = 0; i < data.length; i++){
                    dataValue = data[i];
                    $("#showShift").append("<tr><td>" + dataValue.name + "</td><td>" + dataValue.login + "</td><td>" + dataValue.logout + "</td><td><button onclick='delShift("+dataValue.id+")' class='btn btn-danger btn-sm'>Delete</button></td></tr>");
                };
            }
        });
    }
    window.onload = viewShift();
    //Add Shift
    function addShift(){
        var shift = $('#inputShift').val();
        var login = $('#inputLogin').val();
        var logout = $('#inputLogout').val();
        if(shift !== '' && login !== '' && logout !== ''){
            var dataString = "shift="+shift+"&login="+login+"&logout="+logout;
            $.ajax({
                type: "POST",
                url: "modules/admin-right.php",
                data: dataString,
                cache: false,
                success: function(result){
                    if(result === 'success'){
                        $('#cnlShiftBtn').click();
                        viewShift();
                    }else{
                        alert(result);
                    }
                }
            });
        }
    }
    //Delete Shift
    function delShift(id){
        var dataString = "delshift="+id;
        $.ajax({
            type: "POST",
            url: "modules/admin-right.php",
            data: dataString,
            cache: false,
            success: function(result){
                if(result === 'success'){
                    viewShift();
                }else{
                    alert(result);
                }
            }
        });
    }
    
    
</script>
<?php
include './footer.php';
?>