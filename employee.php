<?php
$title = "Employee";
include './header.php';
?>

<!--employee-->
<div class="container" style="padding-top: 50px;">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header text-center">Manage Employees</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#createEmp" data-toggle="tab">Create</a></li>
            <li><a href="#searchEmp" data-toggle="tab">Search</a></li>
            <li><a href="#archiveEmp" data-toggle="tab">Archive</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="createEmp">
                <h3>Create Employee</h3>
                <div class="col-lg-12 jumbotron">
                    <form class="form-horizontal" id="addEmpForm">
                        <fieldset>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="inputName" class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                    <div class="col-lg-12" id="validName">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmpId" class="col-lg-2 control-label">Emp Id</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <?php $get_id = mysqli_query($con, "Select id from employee order by id desc limit 1 ");
                                                  $resId = mysqli_fetch_array($get_id);  
                                            ?>
                                            <span class="input-group-addon">RLI</span>
                                            <input type="number" autocomplete="off" id="inputEmpId" value="<?php echo $resId['id'] + 1; ?>" onkeyup="findEmpId()" onchange="findEmpId()" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="validEmpId">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email"  class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12" id="validEmail">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" id="inputPhone" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-12" id="validPhone">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-lg-2 control-label">Joining</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="inputJoin">                 
                                    </div>
                                    <div class="col-lg-12" id="validJoin">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDept" class="col-lg-2 control-label">Department</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="inputDept">
                                            <option value="" style="color: #ffffff">Select</option>
                                            <?php
                                            $get_dept = mysqli_query($con, "Select * from department");
                                            while($resDept = mysqli_fetch_assoc($get_dept)){ ?>
                                            <option value="<?php echo $resDept['name']; ?>"><?php echo $resDept['name'] ?></option>    
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="validDept">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDesg" class="col-lg-2 control-label">Designation</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="inputDesg">
                                            <option value="" style="color: #ffffff">Select</option>
                                            <?php
                                            $get_desg = mysqli_query($con, "Select * from designation");
                                            while($resDesg = mysqli_fetch_assoc($get_desg)){ ?>
                                            <option value="<?php echo $resDesg['name']; ?>"><?php echo $resDesg['name'] ?></option>    
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="validDesg">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputShift" class="col-lg-2 control-label">Shift</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="inputShift">
                                            <option value="" style="color: #ffffff">Select</option>
                                            <?php
                                            $get_shift = mysqli_query($con, "Select * from shift");
                                            while($resShift = mysqli_fetch_assoc($get_shift)){ ?>
                                            <option value="<?php echo $resShift['name']; ?>"><?php echo $resShift['name'] ?></option>    
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="validShift">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus" class="col-lg-2 control-label">Status</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="inputStatus">
                                            <option value="" style="color:#ffffff">Select</option>
                                            <?php
                                            $get_status = mysqli_query($con, "Select * from status");
                                            while($resStatus = mysqli_fetch_assoc($get_status)){
                                            if($resStatus['status'] !== 'Permanent' && $resStatus['status'] !== 'Archive' && $resStatus['status'] !== 'Terminated') {    
                                            ?>
                                            <option value="<?php  echo $resStatus['status'];  ?>"><?php echo $resStatus['status']; ?></option>    
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div id="validStatus">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDuration" class="col-lg-2 control-label">Duration</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="number" id="inputDuration" class="form-control">
                                            <span class="input-group-addon">Months</span>
                                        </div>
                                    </div>
                                    <div id="validDuration">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="reset" id="resetBtn" class="btn btn-default btn-sm">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="subEmp">Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-12" id="respEmp">
                                
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="searchEmp">
                <h3>Search Employee</h3>
                <div class="col-lg-12 jumbotron" id="searchContainer">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputSearch" class="control-label">Name or Id</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputSearch">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="button" onclick="searchEmp()" class="btn btn-primary btn-sm">Search Employee</button>
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="site-search-result col-lg-12" id="searchResult">
                    
                </div>
            </div>
            <div class="tab-pane fade" id="archiveEmp">
                <h3>Archive List</h3>
                <table class="table table-striped table-hover" style="margin-top: 30px">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Joined</th>
                            <th>Resigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_arc = mysqli_query($con, "Select id, name, joining, resigned from employee where status = 'Archive';");
                        while($arc = mysqli_fetch_assoc($get_arc)){
                        ?>
                        <tr>
                            <td><?php echo $arc['id']; ?></td>
                            <td><?php echo $arc['name']; ?></td>
                            <td><?php echo $arc['joining']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /employee -->

<script>
    function findEmpId(){
        var id = $('#inputEmpId').val();
        $('#validEmpId').html('');
        if(id.length === 7){
            var datastring = "findId="+id;
            $.ajax({
                type: "POST",
                url: "modules/emp.php",
                data: datastring,
                cache: false,
                success: function(result){
                    if(result === 'success'){
                        $('#validEmpId').html('<h6 class="pull-right text-danger">Id already taken</h6>');
                    }else{
                        $('#validEmpId').html('<h6 class="pull-right text-danger">'+result+'</h6>');
                    }
                }
            });
        }
    }
    $('#addEmpForm').submit(function(e){
        e.preventDefault();
        var name = $('#inputName').val();
        var id = $('#inputEmpId').val();
        var email = $('#inputEmail').val();
        var phone = $('#inputPhone').val();
        var join = $('#inputJoin').val();
        var dept = $('#inputDept').val();
        var desg = $('#inputDesg').val();
        var shift = $('#inputShift').val();
        var status = $('#inputStatus').val();
        var duration = $('#inputDuration').val();
        $('#validName').html('');
        $('#validEmail').html('');
        $('#validPhone').html('');
        $('#validDept').html('');
        $('#validDesg').html('');
        $('#validShift').html('');
        $('#validStatus').html('');
        $('#validDuration').html('');
        if(name === ''){
            $('#validName').html('<h6 class="text-danger pull-right">*Name is required</h6>');
        }
        if(id === ''){
            $('#validEmpId').html('<h6 class="text-danger pull-right">*Employee Id is required</h6>');
        }
        if(email === ''){
            $('#validEmail').html('<h6 class="text-danger pull-right">*Email is required</h6>');
        }
        if(phone === ''){
            $('#validPhone').html('<h6 class="text-danger pull-right">*Phone is required</h6>');
        }
        if(join === ''){
            $('#validJoin').html('<h6 class="text-danger pull-right">*Enter a joining date</h6>');
        }
        if(dept === ''){
            $('#validDept').html('<h6 class="text-danger pull-right">*Assign a department</h6>');
        }
        if(desg === ''){
            $('#validDesg').html('<h6 class="text-danger pull-right">*Assign a designation</h6>');
        }
        if(shift === ''){
            $('#validShift').html('<h6 class="text-danger pull-right">*Assign a shift</h6>');
        }
        if(status === ''){
            $('#validStatus').html('<h6 class="text-danger pull-right">*Select job status</h6>');
        }
        if(duration === ''){
            $('#validDuration').html('<h6 class="text-danger pull-right">*Emter duration</h6>');
        }
        if(name !== '' && id !== '' && email !== '' && phone !== '' && join !== '' && dept !== '' && desg !== '' && shift !== '' && status !== '' && duration !== '' ){
            var dataString = "id="+id+"&name="+name+"&email="+email+"&phone="+phone+"&join="+join+"&dept="+dept+"&desg="+desg+"&shift="+shift+"&status="+status+"&duration="+duration;
            $.ajax({
            type: "POST",
            url: "modules/emp.php",
            data: dataString,
            cache: false,
            success: function(result){
                $('#respEmp').html('<h5>'+result+'</h5>');
                $('#resetBtn').click();
            }
        });
        }
        
    });
    
    function searchEmp(){
        var name = $('#inputSearch').val();
        var dataString = "searchEmp="+name;
        $.ajax({
            type: "POST",
            url: "modules/emp.php",
            data: dataString,
            cache: false,
            success: function(result){
                $('#searchResult').html(result);
            }
        });
    }
    
</script>

<?php
include './footer.php';
?>