<?php
$title = "My Profile";
include './header.php';
?>
<!--profile-home-->
<div class="container" style="padding-top: 50px;">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header text-center">My Profile</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
            <li><a href="#prsn" data-toggle="tab">Personal</a></li>
            <li><a href="#photo" data-toggle="tab">Photo Id</a></li>
            <li><a href="#acnt" data-toggle="tab">Account</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="basic">
                <h3>Employee Summary</h3>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Name</label>
                        <div class="col-lg-6">
                            <p><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Id</label>
                        <div class="col-lg-6">
                            <p>RLI<?php echo $row['id']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Department</label>
                        <div class="col-lg-6">
                            <?php if($row['dept'] !== NULL){ ?>
                            <p><?php echo $row['dept']; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Designation</label>
                        <div class="col-lg-6">
                            <?php if($row['desg'] !== NULL){ ?>
                            <p><?php echo $row['desg']; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Shift</label>
                        <div class="col-lg-6">
                            <?php if($row['shift'] !== NULL){ ?>
                            <p><?php echo $row['shift']; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Type</label>
                        <div class="col-lg-6">
                            <?php if($row['status'] !== NULL){ ?>
                            <p><?php echo $row['status']; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Duration</label>
                        <div class="col-lg-6">
                            <?php if($row['duration'] !== NULL){ ?>
                            <p><?php echo $row['duration']; ?> months</p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Joining Date</label>
                        <div class="col-lg-6">
                            <?php 
                            if($row['joining'] !== NULL){
                                $newDate = date("jS M Y", strtotime($row['joining']));
                            ?>
                            <p><?php echo $newDate; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Status</label>
                        <div class="col-lg-6">
                            <?php if($row['verified'] == 1){ ?>
                            <p>Verification Complete</p>
                            <?php }else { ?>
                            <p>Verification Pending</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Gender</label>
                        <div class="col-lg-6">
                            <?php if($row['gender'] !== NULL){ ?>
                            <p style="text-transform: capitalize"><?php echo $row['gender']; ?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">Blood Group</label>
                        <div class="col-lg-6">
                            <?php 
                            if($row['bgroup'] !== NULL){
                                if($row['bgroup'] == 'OP'){
                            ?>
                            <p>O+</p>
                            <?php }elseif($row['bgroup'] == 'ON'){ ?>
                            <p>O-</p>    
                            <?php }elseif($row['bgroup'] == 'AP'){ ?>
                            <p>A+</p>
                            <?php }elseif($row['bgroup'] == 'AN'){ ?>
                            <p>A-</p>
                            <?php }elseif($row['bgroup'] == 'BP'){ ?>
                            <p>B+</p>
                            <?php }elseif($row['bgroup'] == 'BN'){ ?>
                            <p>B-</p>
                            <?php }elseif($row['bgroup'] == 'ABP'){ ?>
                            <p>AB+</p>
                            <?php }elseif($row['bgroup'] == 'ABN'){ ?>
                            <p>AB-</p>
                            <?php }}else{ ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-6 control-label">DOB</label>
                        <div class="col-lg-6">
                            <?php if($row['dob'] !== NULL){ ?>
                            <p><?php $newDate = date("dS M Y", strtotime($row['dob'])); echo $newDate;?></p>
                            <?php }else { ?>
                            <p>---</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="prsn">
                <h3>Personal Information</h3>
                <div class="col-lg-12 jumbotron" id="personal">
                    <form class="form-horizontal" id="setupInfo" enctype="multipart/form-data" method="post" action="">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputFather" class="control-label">Father's / Guardian's Name</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="inputFather" name="inputFather" value="<?php echo $row['father']; ?>">
                                    </div>
                                    <div class="col-lg-12" id="validFather">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputPhone" class="control-label">Personal Number</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <input type="number" class="form-control" id="inputPhone" name="inputPhone" value="<?php echo $row['phone']; ?>">
                                    </div>
                                    <div class="col-lg-12" id="validPhone">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputResPhone" class="control-label">Residential Number</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <input type="number" class="form-control" id="inputResPhone" name="inputResPhone" value="<?php echo $row['resphone']; ?>">
                                    </div>
                                    <div class="col-lg-12" id="validRes">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputEmail" class="control-label">Email Id</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $row['email']; ?>">
                                    </div>
                                    <div class="col-lg-12" id="validEmail">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?php if($row['dob'] !== NULL) { ?> hide-field <?php } ?>">
                                <div class="col-lg-6">
                                    <label for="inputDob" class="control-label">Date of Birth*</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <input type="date"  class="form-control" id="inputDob" name="inputDob" value="<?php echo $row['dob']; ?>">
                                        
                                    </div>
                                    <div class="col-lg-12" id="validDob">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?php if($row['gender'] !== NULL) { ?> hide-field <?php } ?> ">
                                <div class="col-lg-6">
                                    <label for="inputGender" class="control-label">Gender*</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
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
                                    <div class="col-lg-12" id="validGender">
                                        
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group <?php if($row['bgroup'] !== NULL) { ?> hide-field  <?php } ?>">
                                <div class="col-lg-6">
                                    <label for="inputGroup" class="control-label">Blood Group*</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <select class="form-control" id="inputGroup" name="inputGroup">
                                            <option value="" style="color: #ffffff">Select</option>
                                            <option value="OP" <?php if($row['bgroup'] == 'OP'){ ?>selected="" <?php } ?>>O+</option>
                                            <option value="ON" <?php if($row['bgroup'] == 'ON'){ ?>selected="" <?php } ?>>O-</option>
                                            <option value="AP" <?php if($row['bgroup'] == 'AP'){ ?>selected="" <?php } ?>>A+</option>
                                            <option value="AN" <?php if($row['bgroup'] == 'AN'){ ?>selected="" <?php } ?>>A-</option>
                                            <option value="BP" <?php if($row['bgroup'] == 'BP'){ ?>selected="" <?php } ?>>B+</option>
                                            <option value="BN" <?php if($row['bgroup'] == 'BN'){ ?>selected="" <?php } ?>>B-</option>
                                            <option value="ABP" <?php if($row['bgroup'] == 'ABP'){ ?>selected="" <?php } ?>>AB+</option>
                                            <option value="ABN" <?php if($row['bgroup'] == 'ABN'){ ?>selected="" <?php } ?>>AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12" id="validGroup">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputPresent" class="control-label">Present Address</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" rows="4"  id="inputPresent" name="inputPresent"><?php echo $row['present']; ?></textarea>
                                    </div>
                                    <div class="col-lg-12" id="validPresent">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputPermanent" class="control-label">Permanent Address</label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" rows="4" id="inputPermanent" name="inputPermanent"><?php echo $row['permanent']; ?></textarea>
                                        <span class="help-block"><input type="checkbox" onclick="copyAdrs()" id="sameAdrs"><label style="font-weight: " for="sameAdrs">Same As Present Address</label></span>
                                    </div>
                                    <div class="col-lg-12" id="validPermanent">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="reset" class="btn btn-default btn-sm">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <p><strong>* fields cannot be edited</strong></p>
                            </div>
                            <div class="col-lg-12" id="respSetup">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="photo">
                <h3>Photo Id</h3>
                <div class="col-lg-12 jumbotron" id="imageForm">
                    <form class="form-horizontal" id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="inputImage" class="control-label">Employee Image (For Id Card)</label>
                                </div>
                                <div class="col-lg-12">
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" id="file" name="file"/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                                <div class="col-lg-12" id="validImage">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="acnt">
                <h3>Change Password</h3>
                <div class="col-lg-12 jumbotron">
                    <form class="form-horizontal" id="changePass">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <input type="hidden" value="<?php echo $id; ?>" class="form-control input-sm" id="inputPassId">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="inputOld" class="control-label">Current Password</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control input-sm" id="inputOld">
                                </div>
                                <div class="col-lg-6" id="validOld">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="inputNew" class="control-label">New Password</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control input-sm" id="inputNew">
                                </div>
                                <div class="col-lg-6" id="validNew">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="inputCnfm" class="control-label">Confirm Password</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control input-sm" onkeyup="matchPass()" id="inputCnfm">
                                </div>
                                <div class="col-lg-6" id="validCnfm">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <button type="reset" class="btn btn-default btn-sm">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                                <div class="col-lg-6" id="respPass">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!--/profile-home-->

<script>
    function matchPass(){
        var newPass = $('#inputNew').val();
        var cnfmPass = $('#inputCnfm').val();
        $('#validCnfm').html('');
        if(cnfmPass.length === newPass.length){
            if(cnfmPass === newPass){
                $('#validCnfm').html('<h5 class="pull-right">Password confirmed</h5>');
            }else{
                $('#validCnfm').html("<h5 class='pull-right'>Passwords don't match</h5>");
            }
        } 
    }
    $('#changePass').submit(function(e){
        e.preventDefault();
        var oldPass = $('#inputOld').val();
        var newPass = $('#inputNew').val();
        var cnfmPass = $('#inputCnfm').val();
        var id = $('#inputPassId').val();
        $('#validOld').html('');
        $('#validNew').html('');
        $('#validCnfm').html('');
        if(oldPass === ''){
            $('#validOld').html('<h6 class="pull-right">Please enter current password</h6>');
        }
        if(newPass === ''){
            $('#validNew').html('<h6 class="pull-right">Please enter new password</h6>');
        }
        if(cnfmPass === ''){
            $('#validCnfm').html('<h6 class="pull-right">Please confirm password</h6>');
        }
        if(oldPass !== '' && newPass !== '' && cnfmPass !== ''){
            if(cnfmPass === newPass){
                var dataString = "oldPass="+oldPass+"&newPass="+newPass+"&id="+id;
                $.ajax({
                    type: "POST",
                    url: "modules/profile-setup.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        alert(result);
                    }
                });
            }else{
                $('#validCnfm').html("<h5 class='pull-right'>Passwords don't match</h5>");
            }
        }
    });
    function copyAdrs(){
        var present = $('#inputPresent').val();
        $('#inputPermanent').val(present);
    }
    
    $(document).ready(function (any) {
        $("#setupInfo").on("submit",(function (e) {
            e.preventDefault();
            $("#respSetup").empty();
            
            var dad = $('#inputFather').val();
            var phone = $('#inputPhone').val();
            var res = $('#inputResPhone').val();
            var email = $('#inputEmail').val();
            var dob = $('#inputDob').val();
            var gender = $('input[name=gender]:checked').val();
            var bgroup = $('#inputGroup').val();
            var present = $('#inputPresent').val(); 
            var permanent = $('#inputPermanent').val(); 
          
            $('#validFather').html("");
            $('#validPhone').html("");
            $('#validRes').html("");
            $('#validEmail').html("");
            $('#validDob').html("");
            $('#validGender').html("");
            $('#validGroup').html("");
            $('#validPresent').html("");
            $('#validPermanent').html("");
            
            if(dad === ''){
            $('#validFather').html("<h6>Please enter father's name</h6>");
            }
            if(phone === ''){
                $('#validPhone').html("<h6>Please enter phone number</h6>");
            }
            if(res === ''){
                $('#validRes').html("<h6>Please enter residential  contact number</h6>");
            }
            if(email === ''){
                $('#validEmail').html("<h6>Please enter email</h6>");
            }
            if(dob === ''){
                $('#validDob').html("<h6>Please enter date of birth</h6>");
            }
            if(gender === undefined){
                $('#validGender').html("<h6>Please specify your gender</h6>");
            }
            if(bgroup === ''){
                $('#validGroup').html("<h6>Please specify your blood group</h6>");
            }
            if(present === ''){
                $('#validPresent').html("<h6>Please enter your current address</h6>");
            }
            if(permanent === ''){
                $('#validPermanent').html("<h6>Please enter your permanent address</h6>");
            }
            if(dad != '' && phone != '' && res != '' && email != '' && dob != '' && gender != undefined && bgroup != '' && present != '' && permanent != ''){
                $.ajax({
                    url: "modules/profile-setup.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#respSetup").html(data);
                    }
                });
            }
        }));
    });
    
    $('#uploadimage').submit(function (e){
        e.preventDefault();
        var image = $('#file').val();
        $('#validImage').html('');   
        if(image === ''){
            $('#validImage').html('<h6>Please upload your image</h6>');
        }else{
            $.ajax({
                url: "changePic.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#validImage').html('<h4>'+data+'</h4>');   
                }
            });
        }
    });
    
   
</script>
    

<?php
include './footer.php';
?>