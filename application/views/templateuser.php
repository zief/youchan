<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Youchan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>asset/css/simple-sidebar.css" rel="stylesheet">
    <!-- font awasome  -->
    <link href="<?php echo base_url();?>asset/f-awasome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header fixed-brand">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> Youchan</a>
                </div><!-- navbar-header-->
 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
                            </ul>
                </div><!-- bs-example-navbar-collapse-1 -->
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <!-- <li class="active">
                    <span class="fa-stack fa-lg pull-left"><i class="fa fa-dollar fa-stack-1x "></i></span> Welcome <?php echo $username; ?>
                       
                </li> -->
                <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-home 
					fa-stack-1x "></i></span> Home</a>
                       
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dollar fa-stack-1x "></i></span> Dapatkan Poin </a>
                    
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-play-circle-o fa-stack-1x "></i></span>Tonton Video</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-file-video-o fa-stack-1x "></i></span>Like Video</a></li>
 
                    </ul>
                  
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user-md fa-stack-1x "></i></span> Akun </a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-video-camera fa-stack-1x "></i></span>Manage Video - View</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-video-camera fa-stack-1x "></i></span>Manage Video - Like</a></li>
						<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-gear fa-stack-1x "></i></span>Setting</a></li>
 
                    </ul>
                </li>
				
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-question fa-stack-1x "></i></span> FAQ</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>User_authentication/logout"><span class="fa-stack fa-lg pull-left"><i class="fa fa-power-off fa-stack-1x "></i></span> Log Out</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                         <?php echo $content; ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>asset/js/sidebar-menu.js"></script>

</body>

</html>
