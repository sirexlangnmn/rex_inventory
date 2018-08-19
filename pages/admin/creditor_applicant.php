<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/style.php'); ?>
    </head>
    <body>
        <?php include('includes/preloader.php'); ?>
        <div id="wrapper">
            <?php include('includes/topbar.php');?>
            <?php include('includes/sidebar.php');?>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <!-- .page title -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Starter Page</h4>
                        </div>
                        <!-- /.page title -->
                        <!-- .breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Starter Page</li>
                            </ol>
                        </div>
                        <!-- /.breadcrumb -->
                    </div>
                    <!-- Work Station -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Blank Starter page</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.Work Station -->
                </div><!-- /.container-fluid -->
                <?php include('includes/footer.php'); ?>
            </div>  <!-- /#page-wrapper -->
        </div>  <!-- /#wrapper -->
        <?php include('includes/script.php'); ?>
        <?php include('components/datatables.php'); ?>
    </body>
</html>