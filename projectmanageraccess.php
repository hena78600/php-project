<?php
$title = "Project Manager Hub";
include './header.php';
?>

<!--employee-->

    <div class="col-md-10 col-md-offset-0" >
        <h1 class="page-header text-center" style="margin-top: 60px;">Assign Projects</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#createproject" data-toggle="tab">Create</a></li>
            
           <li><a href="#view" data-toggle="tab">View</a></li>
            <li><a href="#search" data-toggle="tab">Search</a></li>
            <li><a href="#assign" data-toggle="tab">Assign<?php
                                            $get_approval = mysqli_query($con, "Select * from project where approval_status=1");
                                            if(mysqli_fetch_assoc($get_approval))
                                            {?>
            <img src="img/notify.gif" width="9px" height="10px">
                                                
                                            <?php    
                                            }
                                            ?>        </a></li>
             <li><a href="#worklog" data-toggle="tab">Worklog</a></li>
             <li><a href="#worklog_view" data-toggle="tab">View Worklog</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="createproject">
                <h3>Create Projects</h3>
                <div class="col-lg-12 jumbotron">
                    <form class="form-horizontal" id="addprojectForm">
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
                                    <label for="inputName" class="col-lg-2 control-label">Street Address</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="street" placeholder="Street">
                                    </div>
                                    <div class="col-lg-12" id="validaddress">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCountry" class="col-lg-2 control-label">Country</label>
                                    <div class="col-lg-5">
                                        <select class="form-control" id="inputCountry">
                                            <option value="" style="color: #ffffff">Select</option>
                                            <?php
                                            $get_country = mysqli_query($con, "Select * from country");
                                            while($rescountry = mysqli_fetch_assoc($get_country)){ ?>
                                            <option value="<?php echo $rescountry['country_name']; ?>"><?php echo $rescountry['country_name'] ?></option>    
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="validcountry">
                                        
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPhone" class="col-lg-2 control-label">ZIP</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" id="zip" placeholder="ZIP">
                                    </div>
                                    <div class="col-lg-12" id="validzip">
                                        
                                    </div>
                                </div>
                                
                               <div class="form-group">
                                    <label for="inputName" class="col-lg-2 control-label">Availability Time</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="availtime" placeholder="After">
                                    </div>
                                    <div class="col-lg-12" id="validtime">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputType" class="col-lg-2 control-label">Project Type</label>
                                    <div class="col-lg-5">
                                        <select class="form-control" id="type">
                                           <option value="select" style="color:#ffffff">Select</option>
                                           <option value="Desktop">Desktop</option>
                                           <option value="Web">Web</option>
                                           <option value="Android">Android</option>
                                           <option value="IOS">IOS</option>
                                           <option value="Web & App Combo">Web & App Combo</option>
                                           <option value="SEO">SEO</option>
                                           <option value="Quality">Quality</option>
                                            <option value="ERP">ERP</option>
                                           <option value="Maintanance">Maintanance</option>
                                           <option value="Graphics">Graphics</option>
                                           <option value="UI/UX">UI/UX</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-lg-12" id="validtype">
                                        
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="desc" class="col-lg-2 control-label">Project Desc</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="8" id="prj_desc"></textarea>
                                    </div>
                                    <div class="col-lg-12" id="validdesc">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Currency" class="col-lg-2 control-label">Currency</label>
                                    <div class="col-lg-5">
                                        <select class="form-control" id="currency">
                                           <option value="select" style="color:#ffffff">Select</option>
                                           <option value="NZD">INR</option>
                                           <option value="USD">USD</option>
                                           <option value="CND">CND</option>
                                           <option value="AUD">AUD</option>
                                           <option value="GBP">GBP</option>
                                           <option value="EURO">EURO</option>
                                           <option value="NZD">NZD</option>
                                                                                    
                                        </select>
                                    </div>
                                     <div class="col-lg-12" id="validcurrency">
                                        
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="amount" class="col-lg-2 control-label">Bid Value</label>
                                    <div class="col-lg-10">
                                       <input type="number" class="form-control" id="amount" placeholder="Amount">
                                    </div>
                                    <div class="col-lg-12" id="validvalue">
                                        
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label for="Executive_id" class="col-lg-2 control-label">Executive Id</label>
                                    <div class="col-lg-10">
                                        <h3> <?php echo $id ?></h3>
                                    </div>
                                   
                                </div>
                                
                                <div class="form-group">
                                    <button type="reset" class="btn btn-default btn-sm">Clear</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="subEmp">Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-12" id="respEmp">
                                
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
         
            
                  <div class="tab-pane fade" id="assign">
                <h3>Assign Projects</h3>
                  <div class="col-lg-12 jumbotron">
                      <form method="get" action="modules/assign_projects.php" target="_blank">               
                      <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Project ID</label>
      <div class="col-lg-10">

        <select class="form-control" name="prjid">
<?php
$query=  mysqli_query($con, "select project_id from project where approval_status='1' ORDER BY project_id DESC;");
while($res = mysqli_fetch_assoc($query)){
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
<?php } ?>
  
    </select>
      </div>
       <label for="select" class="col-lg-2 control-label">Employee ID</label>
      <div class="col-lg-10">

        <select class="form-control" name="empid">
<?php
$query1=  mysqli_query($con, "select id, name, desg from employee where desg='Developer' ORDER BY id DESC;");
while($res1 = mysqli_fetch_assoc($query1)){
    ?><option value="<?php echo $res1['id'];?>"><?php echo $res1['id'].'&nbsp;&nbsp;&nbsp;('.strtoupper($res1['name']).')('.$res1['desg'].')';?></option>
<?php } ?>
  
    </select>
      </div>
       
       <label for="startdate" class="col-lg-2 control-label">Start Date</label>
       <div class="col-lg-10">
        <input type="date" class="form-control" name="sdate">
        </div>
        <label for="select" class="col-lg-2 control-label">End Date</label>
       <div class="col-lg-10">
        <input type="date" class="form-control" name="edate">
        </div>
       
      
       
       
       <button type="submit" class="btn btn-primary" style="margin-top: 50px;"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Assign</button>
       <button type="button" class="btn btn-primary" style="margin-top: 50px;" data-toggle="modal" data-target="#addmoredevelopers"><span class="glyphicon glyphicon-user"></span>&nbsp;Add More Resource to Project</button>
    </div>

                  </form>
                              
                      
                </div>  
               
            </div>
            
            
            
   
            
            <div class="tab-pane fade" id="view">
                <h3>Current Projects</h3>
                  <div class="col-lg-12 jumbotron" style="background-color:white;">
                      <table class="table table-striped table-hover">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
                          <col width="120">
<tr>
    <th>Project Id</th>
    <th>Executive Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Street</th>
    <th>Country</th>
    <th>ZIP</th>
    <th>Avail Time</th>
    <th>Project Type</th>
    <th>Project Desc</th>
    <th>Currency</th>
    <th>Amount</th>
    <th>S Date</th>
    <th>E Date</th>
</tr>
  
<?php
$get_approval = mysqli_query($con, "Select * from project where approval_status=1 ORDER BY project_id DESC;");
    while($resapprovals = mysqli_fetch_assoc($get_approval)){
        ?><tr><?php

            ?><td><?php
            echo $resapprovals['project_id']; 
            ?></td><td><?php
            echo $resapprovals['executive_id']; 
            ?></td><td><?php
            echo $resapprovals['name']; 
            ?></td><?php
            ?><td><?php
            echo $resapprovals['email']; 
            ?></td><td><?php
            echo $resapprovals['phone']; 
            ?></td><?php
            ?><td><?php
            echo $resapprovals['street']; 
            ?></td><td><?php
            echo $resapprovals['country']; 
            ?></td><?php
            ?><td><?php
            echo $resapprovals['zip']; 
            ?></td><td><?php
            echo $resapprovals['time']; 
            ?></td><?php
            ?><td><?php
            echo $resapprovals['prj_type']; 
            ?></td><td><?php
            echo $resapprovals['prj_desc']; 
            ?></td><?php
            ?><td><?php
            echo $resapprovals['currency']; 
            ?></td><td><?php
            echo $resapprovals['amount']; 
            ?></td><td><?php
            echo $resapprovals['start_date']; 
            ?></td><td><?php
            echo $resapprovals['end_date']; 
            ?></td><?php


      ?></tr><?php
                     } 
                     ?>
                    
                    
                    
                    </table>
                </div>  
               
            </div>
            
<div class="tab-pane fade" id="search">
 <div class="well well-lg">
  <h3>Search Projects</h3>
  <form class="form-horizontal" id="searchprojectform">
      <input type="text" class="form-control" id="inputprojectid" placeholder="Project Id" style="width:400px;"><button id="buttonsearch" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>

  </form>
  <h3>Search Executive Id</h3>
  <form class="form-horizontal" id="searchexecutiveform">
      <input type="text" class="form-control" id="inputexecutiveid" placeholder="Executive Id" style="width:400px;"><button id="buttonsearch" onclick="execu()"  class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
  </form>

 </div>
  <div id="modal_body" class="well well-lg">
  
  
 </div>
    <div id="modal_body1" class="well well-lg" >

  
 </div>
    
 </div>
            
    <div class="tab-pane fade" id="worklog_view">
 <div class="well well-lg">
  <h3>View Work Details</h3>
  <form class="form-horizontal" id="worklog_view_form">
      <select class="form-control" id="selectprjid"><option value="" style="color: white;">Select Project</option>
<?php
$query=  mysqli_query($con, "select project_id from project where approval_status='1' and project_live_status='Open' ORDER BY project_id DESC;");
while($res = mysqli_fetch_assoc($query)){
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
<?php } ?>
  
    </select>
      <button id="buttonsearch" class="btn btn-primary" style="margin-top: 10px;"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
  </form>

 </div>
  <div id="worklog_res" class="well well-lg">
  
  
 </div>
    
 </div>        
            
            
      <div class="tab-pane fade" id="worklog">
          <div class="col-lg-12 jumbotron" style="background-color:white;">
              <form id="worklog_form" method="GET" action="modules/update_worklog.php" >
              <h3>WorkLog Details</h3>
              <div class="col-lg-6 " >
                  <select class="form-control" name="prjid"><option value="" style="color: white;">Select Project</option>
<?php
$query=  mysqli_query($con, "select project_id from project where approval_status='1' and project_live_status='Open' ORDER BY project_id DESC;");
while($res = mysqli_fetch_assoc($query)){
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
<?php } ?>
  
    </select></div>
              
              <div class="col-lg-5 col-lg-offset-1 "><textarea name="comment" rows="10" cols="20" class="form-control" id="comment" placeholder="Enter Comment" style="width:400px;"></textarea></div>
              <div class="col-lg-6 " style="margin-top:-150px;"><select class="form-control" name="project_live_status"><option value="Open">Open</option><option value="Close">Close</option></select></div>
              <div class="col-lg-5 " style="margin-top:-100px;"><input type="submit" class="btn btn-primary" value="Add Log"></input></div>
          
          </form>
          </div></div>      
            
            
            
        </div>
        
    </div>



 <div id="addmoredevelopers" class="modal">
  <div class="modal-dialog">
    <div class="modal-content"> 
        <form method="get" action="modules/assign_moredevelopers.php" target="_blank"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add More Developers</h4>
      </div>
      <div class="modal-body">
     
           
 <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Project ID</label>
      <div class="col-lg-4">

  <select class="form-control" name="prjid">
<?php
$query=  mysqli_query($con, "select project_id from project where approval_status='1' ORDER BY project_id DESC;");
while($res = mysqli_fetch_assoc($query)){
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
<?php } ?>
  
    </select>
      </div>
       <label for="select" class="col-lg-2 control-label">Employee ID</label>
      <div class="col-lg-4">

        <select class="form-control" name="empid">
<?php
$query1=  mysqli_query($con, "select id, name, desg from employee where desg='Developer' ORDER BY id DESC;");
while($res1 = mysqli_fetch_assoc($query1)){
    ?><option value="<?php echo $res1['id'];?>"><?php echo $res1['id'].'&nbsp;&nbsp;&nbsp;('.strtoupper($res1['name']).')('.$res1['desg'].')';?></option>
<?php } ?>
  
    </select>
      </div>
       
   
       
       
       
 </div>
          
          
          
          
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary" style="margin-top: 50px;"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Assign</button>
       <button type="button" class="btn btn-primary" style="margin-top: 50px;" data-toggle="modal" data-target="#addmoredevelopers">&nbsp;Close</button>
      </div></form>

    </div>
  </div>
</div>












<script>
   
    $('#addprojectForm').submit(function(any){
        any.preventDefault();
        var name = $('#inputName').val();
        var type = $('#type').val();
        var currency = $('#currency').val();
        
        var email = $('#inputEmail').val();
        var phone = $('#inputPhone').val();
        var country = $('#inputCountry').val();
        var street=$('#street').val();
        var zip=$('#zip').val();
        var time=$('#availtime').val();
        var desc=$('#prj_desc').val();
        var amount=$('#amount').val();
        $('#validName').html('');
        $('#validEmail').html('');
        $('#validPhone').html('');
        $('#validDept').html('');
        $('#validaddress').html('');
        $('#validzip').html('');
        $('#validdesc').html('');
        $('#validtime').html('');
        $('#validvalue').html('');
        $('#validtype').html('');
        $('#validcountry').html('');
         $('#validcurrency').html('');
        if(name === ''){
            $('#validName').html('<h6 class="text-danger pull-right">*Name is required</h6>');
        }
        if(type === 'select'){
            $('#validtype').html('<h6 class="text-danger pull-right">*Please Select Project Type</h6>');
        }
         if(currency === 'select'){
            $('#validcurrency').html('<h6 class="text-danger pull-right">*Please Select Currency Type</h6>');
        }
        if(amount === ''){
            $('#validvalue').html('<h6 class="text-danger pull-right">*Bid amount is required</h6>');
        }
         if(street === ''){
            $('#validaddress').html('<h6 class="text-danger pull-right">*StreetAddress is required</h6>');
        }
           if(desc === ''){
            $('#validdesc').html('<h6 class="text-danger pull-right">*Project Description is required</h6>');
        }
          if(time === ''){
            $('#validtime').html('<h6 class="text-danger pull-right">*Client Availabilty time is required</h6>');
        }
        if(zip === ''){
            $('#validzip').html('<h6 class="text-danger pull-right">*ZIP is required</h6>');
        }
       
        if(email === ''){
            $('#validEmail').html('<h6 class="text-danger pull-right">*Email is required</h6>');
        }
        if(phone === ''){
            $('#validPhone').html('<h6 class="text-danger pull-right">*Phone is required</h6>');
        }
       if(country === ''){
            $('#validcountry').html('<h6 class="text-danger pull-right">*Select a Country</h6>');
        }
       
             var dataString = "iname="+name+"&email="+email+"&phone="+phone+"&street="+street+"&country="+country+"&zip="+zip+"&time="+time+"&type="+type+"&desc="+desc+"&currency="+currency+"&amount="+amount;
      if(name !== '' && type !== 'select' && currency !== 'select' && email !== '' && phone !== '' && country !== 'select' && street !== '' && zip !== '' && time !== '' && desc !== '' && amount !== ''){
              $.ajax({
            type: "POST",
            url: "modules/create_project.php",
            data: dataString,
            cache: false,
            success: function(result){
               alert(result);
               var form = document.getElementById("addprojectForm");
       form.reset();
                
        
                
                
                
            }
        });
        
      }
           
        
    });



</script>

<script>
   
    $('#searchprojectform').submit(function(any){
        any.preventDefault();
        
        var prjid = $('#inputprojectid').val();
        var dataString = "prjid="+prjid;
        if(prjid === ''){
            
          alert('Please Enter Project ID');
        
        }
        else{
             
      
              $.ajax({
            type: "POST",
            url: "modules/search_project_lead.php",
            data: dataString,
            cache: false,
            success: function(result){
              $('#modal_body').html(result);
            
                
            }
        });}
        
        
           
        
    });

    $('#searchexecutiveform').submit(function(any){
        any.preventDefault();
        
        var exeid = $('#inputexecutiveid').val();
        var dataString = "exeid="+exeid;
        if(exeid=== ''){
            
          alert('Please Enter Executive ID');
        
        }
        else{
             
      
              $.ajax({
            type: "POST",
            url: "modules/search_executive.php",
            data: dataString,
            cache: false,
            success: function(result){
              $('#modal_body1').html(result);
            
                
            }
        });}
        
        
           
        
    });



    
    $('#worklog_view_form').submit(function(any){
    any.preventDefault();
        
        var prjid = $('#selectprjid').val();
        
        var dataString = "prjid="+prjid;
       
        if(prjid === ''){
            
          alert('Please Enter Project ID');
        
        }
        else{
             
      
              $.ajax({
            type: "POST",
            url: "modules/search_worklog_manager.php",
            data: dataString,
            cache: false,
            success: function(result){
              $('#worklog_res').html(result);
            
                
            }
        });}
        
        
           
        
    });  
   



</script>





<?php
include './footer.php';
?>