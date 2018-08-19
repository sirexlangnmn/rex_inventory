    <?php
        include('includes/dbcon.php'); 
            session_start();
            
            if(empty($_SESSION['id'])):
            header('Location:../../index.php');
            endif;
            
            if(empty($_SESSION['branch'])):
            header('Location:../../index.php');
            endif;

            $branch = $_SESSION['branch'];  // branch_id
            $id = $_SESSION['id']; // user_id
    ?>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/plugins/images/favicon.png">
    <title>Sales and Inventory with Credit Management System</title>

     <!-- datatables CSS -->
    <link href="../../assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

   <!-- Offline Version -->
   <!--  <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> -->
   <link href="../../assets/offline-version/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

   
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/assets_admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="../../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="../../assets/assets_admin/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="../../assets/assets_admin/css/style.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="../../assets/assets_admin/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    
    <!-- 
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-19175540-9', 'auto');
    ga('send', 'pageview');
    </script> 
    -->