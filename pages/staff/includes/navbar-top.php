<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <!-- Logo -->
        <div class="top-left-part">
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also -->
                <!-- <b><img src="../../assets/plugins/images/logo-circle.png" style="height: 50px; width: 50px;" alt="home" /></b> -->
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs"><img src="../../assets/plugins/images/logo-long.png" style="height: 58px; width: 300px;" alt="home" /></span>
            </a>
        </div>
        <!-- /Logo -->

        <!-- Search input and Toggle icon -->
        <!-- <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
            <li>
                <form role="search" class="app-search hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul> -->
        <!-- This is the message dropdown -->
        
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                    <i class="icon-envelope"></i>
                    <span class="label label-danger">8</span>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <!-- .dropdown-messages -->
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li>
                        <div class="drop-title">You have 4 new messages</div>
                    </li>
                    <li>
                        <div class="message-center">
                            <a href="#">
                                <div class="user-img"> <img src="../../assets/plugins/images/users/Ako2.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- .user dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../../assets/plugins/images/users/Ako2.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Staff <?php echo $_SESSION['name'];?></b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="queries/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.user dropdown-user -->
            </li>
            <!-- /.user dropdown -->
            <!-- .Megamenu -->
            <li class="mega-dropdown">
                <!-- <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Mega Dropdown</span> <i class="icon-options-vertical"></i></a> -->
                <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Header Title</li>
                            <li><a href="javascript:void(0)">Link of page</a> </li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Header Title</li>
                            <li><a href="javascript:void(0)">Link of page</a> </li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Header Title</li>
                            <li><a href="javascript:void(0)">Link of page</a> </li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Header Title</li>
                            <li> <a href="javascript:void(0)">Link of page</a> </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->