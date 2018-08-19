<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- session code is inside style.php -->
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
                        <div class="col-md-2">
                        </div>
                        <!-- --------------------------- -->
                        <!-- Branch Details -->
                        <!-- --------------------------- -->
                        <div class="col-md-8" style="text-align:center;">
                            <?php                    
                                $branch_id = $_GET['branch_id'];
                                $query=mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch_id'")or die(mysqli_error());  
                                $row=mysqli_fetch_array($query);
                                ?> 
                            <h3><b><?php echo $row['branch_name'];?></b> </h3>
                            <h5>Address: &nbsp; <b><?php echo $row['branch_address'];?></b></h5>
                            <h5>Contact #: &nbsp; <b><?php echo $row['branch_contact'];?></b></h5>
                            <h5>Product Inventory as of today, <b><?php echo date("M d, Y h:i a");?></b></h5>
                        </div>
                        <!-- --------------------------- -->
                        <!-- /.Branch Details -->
                        <!-- --------------------------- -->
                        <div class="col-md-2">
                        </div>
                        <!-- --------------------------- -->
                        <!-- Small Box -->
                        <!-- --------------------------- -->
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title"><a href="buyer.php" class="small-box-footer align-center">Total Sales</a></h3>
                                <ul class="list-inline two-part">
                                    <li><i class="fa fa-money text-info"></i></li>
                                    <li class="text-right"><span class="counter">23</span></li>
                                </ul>
                                <div class="white-box-footer text-success">
                                    For the month of <br />
                                    January, 2018
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title">Total Receivables</h3>
                                <ul class="list-inline two-part">
                                    <li><i class="fa fa-money text-purple"></i></li>
                                    <li class="text-right"><span class="counter">169</span></li>
                                </ul>
                                <div class="white-box-footer text-success">
                                    Total Receivables as of <br />
                                    Aug. 14, 2018
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title">Active Customers</h3>
                                <ul class="list-inline two-part">
                                    <li><i class="fa fa-users text-danger"></i></li>
                                    <li class="text-right"><span class="">311</span></li>
                                </ul>
                                <div class="white-box-footer text-success">
                                    as of today
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title">Number products re-order</h3>
                                <ul class="list-inline two-part">
                                    <li><i class="fa fa-cubes text-success"></i></li>
                                    <li class="text-right"><span class="">117</span></li>
                                </ul>
                                <div class="white-box-footer text-success">
                                    as of today
                                </div>
                            </div>
                        </div>
                        <!-- --------------------------- -->
                        <!-- Small Box -->
                        <!-- --------------------------- -->
                    </div>
                    <div class="row">
                        <!-- --------------------------- -->
                        <!-- Graph -->
                        <!-- --------------------------- -->
                        <div id="graph"></div>
                        <!-- --------------------------- -->
                        <!-- Graph -->
                        <!-- --------------------------- -->
                        <div class="white-box col-md-12 col-sm-12 col-lg-12">
                            <!-- --------------------------- -->
                            <!-- Table/ Sales Detail -->
                            <!-- --------------------------- -->
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>MONTH</th>
                                        <th class="text-right">SALES</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MONTH</th>
                                        <th class="text-right">SALES</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $_SESSION['branch']=$_GET['branch_id'];
                                        $year = date("Y");
                                        $query = mysqli_query($con,"SELECT *, SUM(payment) AS payment, DATE_FORMAT(payment_date,'%b') AS month FROM payment WHERE YEAR(payment_date) = '$year' AND branch_id = '$branch' GROUP BY MONTH(payment_date)")or die(mysqli_error($con));
                                                $total=0;
                                                while($row=mysqli_fetch_array($query)){
                                                    $total=$total+$row['payment'];  
                                        ?>
                                    <tr>
                                        <th><?php echo$row['month'];?></th>
                                        <td class="text-right"><b><?php echo number_format($row['payment'],2);?></b></td>
                                    </tr>
                                    <?php }?>   
                                    <tr>
                                        <th>
                                            <h2>TOTAL</h2>
                                        </th>
                                        <td class="text-right">
                                            <h2><b><?php echo number_format($total,2);?></b></h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- --------------------------- -->
                            <!-- /. Table/ Sales Detail -->
                            <!-- --------------------------- -->
                        </div>
                    </div>
                </div>
                <!-- /.Work Station -->
            </div>
            <!-- /.container-fluid -->
            <?php include('includes/footer.php'); ?>
        </div>
        <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php
            include('includes/script.php');
            include('components/datatables.php'); 
            include('components/chart.php'); 
            ?>

        <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data.php", function(json) {
            options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>    
    </body>
</html>