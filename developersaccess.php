<?php
$title = "Developer Zone";
include './header.php';
?>


<div class="col-md-10 col-md-offset-0" style="padding:20px;">
    <h1 class="page-header text-center"><img src="img/prog.gif" width="160px" height="120px">Dev Zone!! </h1>
        <ul class="nav nav-tabs">
           
           <li class="active"><a href="#view_open" data-toggle="tab">Pending</a></li>
           <li><a href="#view_close" data-toggle="tab">Complete</a></li>
            <li><a href="#search" data-toggle="tab">Search</a></li>
            <li><a href="#worklog" data-toggle="tab">Worklog</a></li>
             <li><a href="#worklog_view" data-toggle="tab">View Worklog</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">

            
               <div class="tab-pane fade" id="worklog_view">
 <div class="well well-lg">
  <h3>View Work Details</h3>
  <form class="form-horizontal" id="worklog_view_form">
      <select class="form-control" id="selectprjid"><option value="" style="color: white;">Select Project</option>
<?php
$query=  mysqli_query($con, "select project_id from project_assign where id=$id;");
while($res = mysqli_fetch_assoc($query)){
    $query12=  mysqli_query($con, "select project_live_status from project where project_id=".$res['project_id']);
while($res12 = mysqli_fetch_assoc($query12)){
    
    if($res12['project_live_status']=='Open')
    {
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
    <?php }}} ?>
  
    </select>
      <button id="buttonsearch" class="btn btn-primary" style="margin-top: 10px;"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
  </form>

 </div>
  <div id="worklog_res" class="well well-lg">
  
  
 </div>
    
 </div>     
            
   
            
      <div class="tab-pane fade" id="worklog">
          <div class="col-lg-12 jumbotron" style="background-color:white;">
              <form id="worklog_form" method="GET" action="modules/update_worklog_dev.php" >
              <h3>WorkLog Details</h3>
              <div class="col-lg-6 " >
                  <select class="form-control" name="prjid"><option value="" style="color: white;">Select Project</option>
<?php
$query=  mysqli_query($con, "select project_id from project_assign where id=$id;");
while($res = mysqli_fetch_assoc($query)){
    $query12=  mysqli_query($con, "select project_live_status from project where project_id=".$res['project_id']);
while($res12 = mysqli_fetch_assoc($query12)){
    
    if($res12['project_live_status']=='Open')
    {
    ?><option value="<?php echo $res['project_id'];?>"><?php echo $res['project_id'];?></option>
    <?php }}} ?>
  
    </select></div>
              
              <div class="col-lg-5 col-lg-offset-1 "><textarea name="comment" rows="10" cols="20" class="form-control" id="comment" placeholder="Enter Comment" style="width:400px;"></textarea></div>
              <!--<div class="col-lg-6 " style="margin-top:-150px;"><select class="form-control" name="project_live_status"><option value="Open">Open</option><option value="Close">Close</option></select></div>-->
              <div class="col-lg-5 " style="margin-top:-100px;"><input type="submit" class="btn btn-primary" value="Add Log"></input></div>
          
          </form>
          </div></div>             
            <div class="tab-pane fade active in" id="view_open">
                <h3>Your Pending Project</h3>
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
    <th>Status</th>
</tr>
  
<?php
 $get_res1 = mysqli_query($con, "Select project_id from project_assign where id=$id;");
while($res1 = mysqli_fetch_assoc($get_res1)){
    $projectide=$res1['project_id'];
 
   $get_res = mysqli_query($con, "Select * from project where project_id=$projectide AND project_live_status='Open';");
    
    
   while($res = mysqli_fetch_assoc($get_res)){
        ?><tr style="border: 1px solid black; font-size:5px;"><?php

            ?><td><?php
            echo $res['project_id']; 
            ?></td><td><?php
            echo $res['executive_id']; 
            ?></td><td><?php
            echo $res['name']; 
            ?></td><?php
            ?><td><?php
            echo $res['email']; 
            ?></td><td><?php
            echo $res['phone']; 
            ?></td><?php
            ?><td><?php
            echo $res['street']; 
            ?></td><td><?php
            echo $res['country']; 
            ?></td><?php
            ?><td><?php
            echo $res['zip']; 
            ?></td><td><?php
            echo $res['time']; 
            ?></td><?php
            ?><td><?php
            echo $res['prj_type']; 
            ?></td><td><?php
            echo $res['prj_desc']; 
            ?></td><?php
            ?><td><?php
            echo $res['currency']; 
            ?></td><td><?php
            echo $res['amount']; 
            ?></td><td style="border: 1px solid black;"><?php
            echo $res['start_date']; 
            ?></td><td><?php
            echo $res['end_date']; 
            ?></td><td style="border: 1px solid black;"><?php
            echo $res['project_live_status']; 
            ?></td><?php

      ?></tr><?php
} }
                
                     ?>
                    
                    
                    
                    </table>
                </div>  
               
            </div>
            
            <div class="tab-pane fade" id="view_close">
                <h3>Your Closed Project</h3>
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
    <th>Status</th>
</tr>
  
<?php
 $get_res1 = mysqli_query($con, "Select project_id from project_assign where id=$id;");
while($res1 = mysqli_fetch_assoc($get_res1)){
    $projectide=$res1['project_id'];
 
   $get_res = mysqli_query($con, "Select * from project where project_id=$projectide AND project_live_status='Close';");
    
    
   while($res = mysqli_fetch_assoc($get_res)){
        ?><tr style="border: 1px solid black; font-size:5px;"><?php

            ?><td><?php
            echo $res['project_id']; 
            ?></td><td><?php
            echo $res['executive_id']; 
            ?></td><td><?php
            echo $res['name']; 
            ?></td><?php
            ?><td><?php
            echo $res['email']; 
            ?></td><td><?php
            echo $res['phone']; 
            ?></td><?php
            ?><td><?php
            echo $res['street']; 
            ?></td><td><?php
            echo $res['country']; 
            ?></td><?php
            ?><td><?php
            echo $res['zip']; 
            ?></td><td><?php
            echo $res['time']; 
            ?></td><?php
            ?><td><?php
            echo $res['prj_type']; 
            ?></td><td><?php
            echo $res['prj_desc']; 
            ?></td><?php
            ?><td><?php
            echo $res['currency']; 
            ?></td><td><?php
            echo $res['amount']; 
            ?></td><td style="border: 1px solid black;"><?php
            echo $res['start_date']; 
            ?></td><td><?php
            echo $res['end_date']; 
            ?></td><td style="border: 1px solid black;"><?php
            echo $res['project_live_status']; 
            ?></td><?php

      ?></tr><?php
} }
                
                     ?>
                    
                    
                    
                    </table>
                </div>  
               
            </div>      
            
            
            
            
            
            
<div class="tab-pane fade" id="search">
 <div class="well well-lg">
  <h3>Search Projects</h3>
  <form class="form-horizontal" id="searchprojectform">
   <input type="text" class="form-control" id="inputprojectid" placeholder="Project Id" style="width:400px;"><button id="buttonsearch" class="btn btn-primary">Search</button>

  </form>
  <h3>Search Executive Id</h3>
  <form class="form-horizontal" id="searchexecutiveform">
      <input type="text" class="form-control" id="inputexecutiveid" placeholder="Executive Id" style="width:400px;"><button id="buttonsearch" onclick="execu()"  class="btn btn-primary">Search</button>
  </form>

 </div>
  <div id="modal_body" class="well well-lg">
  
  
 </div>
    <div id="modal_body1" class="well well-lg" >

  
 </div>
    
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
            url: "modules/search_project_dev.php",
            data: dataString,
            cache: false,
            success: function(result){
              $('#modal_body').html(result);
            
                
            }
        })};
        
        
           
        
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
        })};
        
        
           
        
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