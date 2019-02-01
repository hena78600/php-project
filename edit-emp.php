<?php
$title = "Edit Employee";
include './header.php';
if($_GET['id']){
    $empid = $_GET['id'];
    $get = mysqli_query($con, "Select * from employee where id='$empid'");
    $resEmp = mysqli_fetch_assoc($get);
}    
?>

<!-- edit - employee -->
<div class="container" style="padding-top: 50px;">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header text-center">Edit Employee Information</h1>
        <div class="col-lg-12 jumbotron" id="personal">
            <form class="form-horizontal" id="editEmp" method="post" action="">
                <fieldset>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $resEmp['name']; ?>" id="inputName" name="inputName" placeholder="Name">
                        </div>
                        <div class="col-lg-12" id="validName">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmpId" class="col-lg-2 control-label">Emp Id</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon">RLI</span>
                                <input type="number" autocomplete="off" id="inputEmpId" name="inputEmpId" value="<?php echo $resEmp['id']; ?>"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputJoin" class="col-lg-2 control-label">Joining</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" value="<?php echo $resEmp['joining'];  ?>" id="inputJoin" name="inputJoin" >                 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputVerify" class="col-lg-2 control-label">Verification</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputVerify" name="inputVerify">
                                <option value="" style="color: #ffffff">Select</option>
                                <option <?php if($resEmp['verified'] == '1' ){ ?> selected="" <?php } ?> value="1">Verified</option>
                                <option <?php if($resEmp['verified'] == '0' ){ ?> selected="" <?php } ?> value="0">Not Verified</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDept" class="col-lg-2 control-label">Department</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputDept" name="inputDept">
                                <option value="" style="color: #ffffff">Select</option>
                                <?php
                                $get_dept = mysqli_query($con, "Select * from department");
                                while($resDept = mysqli_fetch_assoc($get_dept)){ ?>
                                <option value="<?php echo $resDept['name']; ?>" <?php if( $resEmp['dept'] === $resDept['name']){ ?> selected="" <?php } ?> ><?php echo $resDept['name'] ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDesg" class="col-lg-2 control-label">Designation</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputDesg" name="inputDesg">
                                <option value="" style="color: #ffffff">Select</option>
                                <?php
                                $get_desg = mysqli_query($con, "Select * from designation");
                                while($resDesg = mysqli_fetch_assoc($get_desg)){ ?>
                                <option value="<?php echo $resDesg['name']; ?>" <?php if( $resEmp['desg'] === $resDesg['name']){ ?> selected=""  <?php } ?> ><?php echo $resDesg['name'] ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputShift" class="col-lg-2 control-label">Shift</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputShift" name="inputShift">
                                <option value="" style="color: #ffffff">Select</option>
                                <?php
                                $get_shift = mysqli_query($con, "Select * from shift");
                                while($resShift = mysqli_fetch_assoc($get_shift)){ ?>
                                <option value="<?php echo $resShift['name']; ?>" <?php if( $resEmp['shift'] === $resShift['name']){ ?> selected=""  <?php } ?> ><?php echo $resShift['name'] ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus" class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputStatus" name="inputStatus">
                                <option value="" style="color:#ffffff">Select</option>
                                <?php
                                    $get_status = mysqli_query($con, "Select * from status");
                                    while($resStatus = mysqli_fetch_assoc($get_status)){
                                ?>
                                <option value="<?php  echo $resStatus['status'];?>" <?php if( $resEmp['status'] === $resStatus['status']){ ?> selected=""  <?php } ?> ><?php echo $resStatus['status']; ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDob" class="col-lg-2 control-label">Date of Birth</label>
                        <div class="col-lg-6">
                            <input type="date"  class="form-control" id="inputDob" name="inputDob" value="<?php echo $resEmp['dob']; ?>">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputGender" class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender"  <?php if($row['gender'] == 'female'){ ?> checked="" <?php } ?> value="female">
                                    Female
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" <?php if($row['gender'] == 'male'){ ?> checked="" <?php } ?> value="male">
                                    Male
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus" class="col-lg-2 control-label">Blood Group</label>
                        <div class="col-lg-6">
                            <select class="form-control" id="inputGroup" name="inputGroup">
                                    <option value="" style="color: #ffffff">Select</option>
                                    <option value="OP" <?php if($resEmp['bgroup'] == 'OP'){ ?>selected="" <?php } ?>>O+</option>
                                    <option value="ON" <?php if($resEmp['bgroup'] == 'ON'){ ?>selected="" <?php } ?>>O-</option>
                                    <option value="AP" <?php if($resEmp['bgroup'] == 'AP'){ ?>selected="" <?php } ?>>A+</option>
                                    <option value="AN" <?php if($resEmp['bgroup'] == 'AN'){ ?>selected="" <?php } ?>>A-</option>
                                    <option value="BP" <?php if($resEmp['bgroup'] == 'BP'){ ?>selected="" <?php } ?>>B+</option>
                                    <option value="BN" <?php if($resEmp['bgroup'] == 'BN'){ ?>selected="" <?php } ?>>B-</option>
                                    <option value="ABP" <?php if($resEmp['bgroup'] == 'ABP'){ ?>selected="" <?php } ?>">AB+</option>
                                    <option value="ABN" <?php if($resEmp['bgroup'] == 'ABN'){ ?>selected="" <?php } ?>>AB-</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="reset" class="btn btn-default btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                    <div class="col-lg-12" id="respSetup">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<!-- /edit - employee -->

<script>
    $('#editEmp').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "modules/edit-emp.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#respSetup').html('<h5>'+data+'</h5>');
            }
        });
        
        
        
        
    });

</script>

<?php
include './footer.php';
?>