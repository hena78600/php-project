<?php
include './function.php';
if(loggedin() != TRUE){
    header("Location: login.php");
    exit();
}
$con = connect_db();
$id = $_SESSION['emp'];
$get = mysqli_query($con, "Select * from employee where id='$id'");
$row = mysqli_fetch_assoc($get);
if($row['is_admin'] != '1'){
    if($row['desg']  == 'Sales Executive'){
        if($title != 'Dashboard' && $title != 'My Profile' ){
            if($title != 'Sales Hub'){
                header("Location: home.php");
                exit();
            }
        }
    }elseif($row['desg'] == 'Sales Manager'){
        if($title != 'Dashboard' && $title != 'My Profile'){
            if($title != 'Sales Manager Hub'){
                header("Location: home.php");
                exit();
            }
        }
    }elseif($row['desg'] == 'Project Manager'){
        if($title != 'Dashboard' && $title != 'My Profile'){
            if($title != 'Project Manager Hub'){
                header("Location: home.php");
                exit();
            }
        }
    }elseif($row['desg'] == 'Developer'){
        if($title != 'Dashboard' && $title != 'My Profile'){
            if($title != 'Developer Zone'){
                header("Location: home.php");
                exit();
            }
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?> - RL Infocomm Employee Portal</title>
        <!-- css-import -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- /css-import -->
        <!-- js-header-link -->
        <script src="js/jquery.js"></script>
        <!-- /js-header-link -->
    </head>
    <body>
        
        <!-- site-top-bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="home.php"><img src="img/logo.png" width="250px"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hi, <?php echo $row['name']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-area" role="menu" style="width: 260px; padding: 10px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="profile.php"><img <?php if($row['pic'] === '1' ){ ?> src="uploaded/<?php echo $id.".jpg"; ?>" <?php }else{ ?> src="img/avatar.png" <?php } ?> width="80" style="height: 100%; width: 100%" ></a>
                                    </div>
                                    <div class="col-lg-6">
                                        <li><a href="profile.php">#RLI<?php echo $id; ?></a></li>
                                        <li><a href="profile.php">Edit My Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="modules/user-access.php?loggedout=true">Log Out</a></li>
                                    </div>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /site-top-bar -->
        
        <!-- site-side-bar -->
        <nav class="navbar navbar-default sidebar" style="padding-top: 50px;" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>      
                </div>
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php if($title == 'Dashboard'){ ?> class="active" <?php } ?>><a href="home.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                        <?php if($row['is_admin'] === '1') { ?>
                        <li <?php if($title == 'Admin'){ ?> class="active" <?php } ?>><a href="admin.php">Admin<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-eye-open"></span></a></li>
                        <li <?php if($title == 'Employee'){ ?> class="active" <?php } ?>><a href="employee.php">Employee<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                        <li <?php if($title == 'Sales Hub'){ ?> class="active" <?php } ?>><a href="add_project.php" >Sales Hub<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-earphone"></span></a></li>
                        <li <?php if($title == 'Sales Manager Hub'){ ?> class="active" <?php } ?>><a href="callerleadaccess.php" >Sales Manager<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-phone-alt"></span></a></li>
                        <li <?php if($title == 'Project Manager Hub'){ ?> class="active" <?php } ?>><a href="projectmanageraccess.php" >Project Manager<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-stats"></span></a></li>
                        <li <?php if($title == 'Developer Zone'){ ?> class="active" <?php } ?>><a href="developersaccess.php" >Developer Zone<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-hdd"></span></a></li>
                        <?php }else {
                        if($row['desg'] === 'Sales Executive'){ ?>
                        <li <?php if($title == 'Sales Hub'){ ?> class="active" <?php } ?>><a href="add_project.php" >Sales Hub<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-earphone"></span></a></li>
                        <?php }elseif($row['desg'] === 'Sales Manager'){ ?>
                        <li <?php if($title == 'Sales Manager Hub'){ ?> class="active" <?php } ?>><a href="callerleadaccess.php" >Sales Manager<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-phone-alt"></span></a></li>
                        <?php }elseif($row['desg'] === 'Project Manager') { ?> 
                        <li <?php if($title == 'Project Manager Hub'){ ?> class="active" <?php } ?>><a href="projectmanageraccess.php" >Project Manager<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-stats"></span></a></li>
                        <?php }elseif($row['desg'] === 'Developer') { ?>
                        <li <?php if($title == 'Developer Zone'){ ?> class="active" <?php } ?>><a href="developersaccess.php" >Developer Zone<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-hdd"></span></a></li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /site-side-bar -->