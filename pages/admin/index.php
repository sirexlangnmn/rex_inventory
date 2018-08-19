<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/style.php'); ?>
</head>

<body>
    <?php include('includes/preloader.php'); ?>
    <!-- Background image. Inside (assets/assets_staff/css/style.css) -->
    <section id="wrapper" class="login-register">
    <!-- /.Background image -->  
        <div class="login-box login-sidebar">
            <div class="white-box">
                <a href="javascript:void(0)" class="text-center db"><img src="../../assets/plugins/images/logo-long.png" style="height: 58px; width: 300px;" alt="Home" />
                        <br/><!-- <img src="assets/plugins/images/eliteadmin-text-dark.png" alt="Home" /> -->
                        <p>Sales & Inventory with Credit Management System</p>
                    </a>
                <form class="form-horizontal" data-toggle="validator" id="loginform" action="queries/login.php" method="post">
                    <h3 style="text-align:center;" class="m-t-40">Administrator Login</h3>
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
            </div>
        </div>
    </section>
    <?php include('includes/script.php'); ?>
    <?php include('components/validator.php'); ?>

</body>

</html>
