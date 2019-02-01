<?php
include 'function.php';
$con = connect_db();

$check = mysqli_query($con, "Select id from employee");
if(mysqli_num_rows($check) != 0){
    header("Location: login.php");
}
if(loggedin() == TRUE){
    header("Location: home.php");
    exit();
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Setup - RL Infocomm Employee Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
    </head>
    <body>
        <div class="setup-container container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="jumbotron">
                        <h2>Hello,</h2>
                        <h3>Welcome to RL Infocomm Identity Portal</h3>
                        <p>Before getting started, we need some information on the database. You will need to know the following items before proceeding.</p>
                        <div class="form-container">
                            <form class="form-horizontal" method="POST" action="modules/user-access.php">
                                <div class='row'>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="form-group">
                                              <div class="col-lg-10">
                                                  <input type="hidden" class="form-control" value="1" id="reqType" name='reqType'>
                                                  <input type="hidden" class="form-control" value="1" id="inputAdmin" name='inputAdmin'>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="inputName" class="col-lg-2 control-label">Name</label>
                                              <div class="col-lg-10">
                                                <input type="text" class="form-control" id="inputName" name='inputName' placeholder="Name">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="inputId" class="col-lg-2 control-label">RLI-</label>
                                              <div class="col-lg-10">
                                                <input type="number" class="form-control" id="inputEmpId" name='inputEmpId' placeholder="Employee Id">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                              <div class="col-lg-10">
                                                  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                                <div class="col-lg-10">
                                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-default pull-right" value="Let's Go">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- js-import -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/npm.js"></script>
        <!-- /js-import -->
    </body>
</html>
