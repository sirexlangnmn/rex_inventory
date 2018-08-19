<!DOCTYPE html>
<html lang="en">
<?php include('pages/staff/includes/dbcon.php'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/plugins/images/favicon.png">
    <title>Inventory</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/assets_staff/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="assets/assets_staff/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/assets_staff/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="assets/assets_staff/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <?php include('pages/staff/includes/preloader.php'); ?>
    <!-- Preloader -->
    
    <!-- Background image. Inside (assets/assets_staff/css/style.css) -->
    <section id="wrapper" class="login-register">
    <!-- /.Background image -->    
        <div class="login-box login-sidebar">
            <div class="white-box">

                <!-- =================================== -->
                <!-- Registration Form-->
                <!-- =================================== -->
                <form class="form-horizontal" data-toggle="validator" id="loginform" action="pages/staff/queries/login.php" method="post">
                    <a href="javascript:void(0)" class="text-center db"><img src="assets/plugins/images/logo-long.png" style="height: 58px; width: 300px;" alt="Home" />
                        <br/><!-- <img src="assets/plugins/images/eliteadmin-text-dark.png" alt="Home" /> -->
                        <p>Sales & Inventory with Credit Management System</p>
                    </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                        <input type="text" class="form-control" name="username" placeholder="Username" data-error="Required" required>
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <input type="password" class="form-control select2" name="password" placeholder="Password" data-error="Required" required>
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="col-xs-12">
                        <select class="form-control" name="branch" data-placeholder="Choose Branch Here" tabindex="1" required>
                            <option>Choose Branch Here . . .</option>
                            <?php
                              $query = mysqli_query($con,"SELECT * FROM branch ORDER BY branch_name")or die(mysqli_error($con));
                              while($row = mysqli_fetch_array($query)) :
                            ?>
                            <option value="<?php echo $row['branch_id'];?>">
                                <?php echo $row['branch_name'];?> </option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="register2.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <!-- =================================== -->
                <!-- /.Registration Form-->
                <!-- =================================== -->

                <!-- =================================== -->
                <!-- Recover Password Form-->
                <!-- =================================== -->
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- =================================== -->
                <!-- /.Recover Password Form-->
                <!-- =================================== -->

            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/assets_staff/bootstrap/dist/js/tether.min.js"></script>
    <script src="assets/assets_staff/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="assets/assets_staff/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/assets_staff/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/assets_staff/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/assets_staff/js/validator.js"></script>
</body>

</html>
