<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ny | Commitments</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-select.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
   <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
 
  <link rel="stylesheet" href="../css/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <link href="../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />

  
  <script src="../js/jquery-2.2.3.min.js"></script>
  <script src="../resources/js/chosen.jquery.min.js"></script>
  <script src="../resources/js/jquery.dataTables.min.js"></script> 
  <script src="../resources/js/jquery.dataTables.yadcf.js"></script>
  <script src="../resources/js/dom_source_example2.js"></script>
  <script type="text/javascript" src="resources/js/shCore.js"></script> 
  <script type="text/javascript" src="resources/js/shBrushJScript.js"></script>
  
    <style>

    .dataTables_info, .dataTables_length, .dataTables_paginate.paging_two_button {
      display: none;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div id="artists"></div>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ny</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ny</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="text-center"><h4 style="margin-top: 15px; color: #ffffff;">nyc-capital-commitment-scrape</h4></div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

   <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/home"><i class="fa fa-home"></i> <span> Home </span></a></li>
        <li><a href="/agencies"><i class="fa fa-tasks"></i> <span> Agencies </span></a></li>
        <li><a href="/projects"><i class="ion ion-clipboard"></i> <span> Projects </span></a></li>
        <li class="active"><a href="/commitments"><i class="fa fa-database"></i> <span> Commitments </span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      

    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
         

  
        
      </div> 
      <div class="row">


          <!-- /.box -->
          </div>

          <div class="box box-primary box-solid">
            <div class="box-header">
            <h4>Ny - Projects</h4> 
    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" cellpadding="0" cellspacing="0" border="0" class="display">
                <thead>
                <tr>
                  <th>Description / Commitment Description</th>
                  <th>commitment date</th>
                  <th>noncity cost($)</th>
                  <th>citycost($)</th>
                  <th>budgetline</th>
                  <th>fmsnumber</th>
                  <th>commitment code</th>
                </tr>
                </thead>
                <tbody id="tblData">
                 @foreach ($commitments as $commitment)
                  <tr>
                    <td>{{$commitment->description}}</td>
                    <td>{{$commitment->plancommdate}}</td>
                    <td>{{$commitment->noncitycost}}</td>
                    <td>{{$commitment->citycost}}</td>
                    <td>{{$commitment->budgetline}}</td>
                    <td>{{$commitment->fmsnumber}}</td>
                    <td>{{$commitment->commitmentcode}}</td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
              <dir class="text-right">
            {{$commitments->links()}}
            </dir>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->

<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!-- DataTables -->

<!-- SlimScroll -->
<script src="../js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- page script -->
<script src="../js/bootstrap-select.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>
</html>
