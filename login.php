<?php
include './function.php';
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
        <title>Employee Login - RL Infocomm Employee Portal</title>
        <!-- css-import -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <!-- /css-import -->
        <!-- js-header-link -->
        <script src="js/jquery.js"></script>
        <!-- /js-header-link -->
    </head>
    <body style="background: url('img/login-background.png') no-repeat center 20% fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
        
        <div class="login-container container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="jumbotron">
                        <h3>Sign in to RL Infocomm</h3>
                        <div class="login-form-container">
                            <form class="form-horizontal" id="userLogin" method="post">
                                <div class='row'>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="text" style="border-radius: 8px;" class="form-control" id="inputEmpId" name="inputEmpId" placeholder="Employee Id">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="password" style="border-radius: 8px;" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="submit" style="border-radius: 8px;" class="btn btn-default" value="Sign in">
                                    </div>
                                    <div class="col-lg-8" id="loginResult">
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- js-footer-import -->
        <script src="js/bootstrap.js"></script>
        <script src="js/npm.js"></script>
        <script>
            $("#userLogin").submit(function(e){
                e.preventDefault();
                var username = $('#inputEmpId').val();
                var password = $('#inputPassword').val();
                if(username === ''){
                    $('#loginResult').html('<p>Please enter employee id</p>');
                }else{
                    if(password === ''){
                        $('#loginResult').html('<p>Please enter password</p>');
                    }else{
                        var datastring = "reqType=2&username="+username+"&password="+password;
                        // AJAX Code To Submit Form.
                        $.ajax({
                            type: "POST",
                            url: "modules/user-access.php",
                            data: datastring,
                            cache: false,
                            success: function(result){
                                if(result === 'success'){
                                    window.location.replace('home.php');
                                }else{
                                    $('#loginResult').html('<p>'+result+'</p>');
                                }
                            }
                        });
                    }
                }
            });
            
        </script>
        <!-- /js-footer-import -->
        
    </body>
</html>