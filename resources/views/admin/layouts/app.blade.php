<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin-lte')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition {{$template->theme}} sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>GIS</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{Auth::guard('admin')->user()->foto != '' ? asset('image').'/'.Auth::guard('admin')->user()->foto : asset('admin-lte').'/dist/img/user2-160x160.jpg'}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::guard('admin')->user()->nama}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{Auth::guard('admin')->user()->foto != '' ? asset('image').'/'.Auth::guard('admin')->user()->foto : asset('admin-lte').'/dist/img/user2-160x160.jpg'}}" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::guard('admin')->user()->role}}                                       
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{route('user.profile')}}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{route('admin.auth.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{Auth::guard('admin')->user()->foto != '' ? asset('image').'/'.Auth::guard('admin')->user()->foto : asset('admin-lte').'/dist/img/user2-160x160.jpg'}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::guard('admin')->user()->nama}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> {{Auth::guard('admin')->user()->role}}</a>
                    </div>
                </div>  
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="" class="{{$template->menu == 'dashboard' ? 'active' : ''}}">
                        <a href="{{route('admin.dashboard.index')}}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>                            
                        </a>
                    </li>

                    {{-- //menentukan hak akses user --}}
                    @if(AppHelper::access(['Admin']))
                        <li class="{{$template->menu == 'desa' ? 'active' : ''}}">
                            <a href="{{route('desa.index')}}"  >
                                <i class="fa fa-map"></i> 
                                <span>Desa</span>
                            </a>
                        </li>   
                    @endif

                    {{-- //menentukan hak akses user --}}
                    @if(AppHelper::access(['Operator','Kepala Desa']))
                        <li class="{{$template->menu == 'penduduk' ? 'active' : ''}}">
                            <a href="{{route('penduduk.index')}}"  >
                                <i class="fa fa-users"></i> 
                                <span>Penduduk</span>
                            </a>
                        </li>   
                    @endif

                    @if(AppHelper::access(['Operator','Admin']))
                        <li class="{{$template->menu == 'web' ? 'active' : ''}}">
                            <a href="{{route('web.index')}}"  >
                                <i class="fa fa-globe"></i> 
                                <span>Website</span>
                            </a>
                        </li>   
                    @endif
                    
                    {{-- //menentukan hak akses user --}}
                    @if(AppHelper::access(['Admin']))
                        <li class="{{$template->menu == 'user' ? 'active' : ''}}">
                            <a href="{{route('user.index')}}"  >
                                <i class="fa fa-user"></i> 
                                <span>Manajemen User</span>
                            </a>
                        </li>   
                    @endif
                    
                    
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
        
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{asset('admin-lte')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin-lte')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('admin-lte')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('admin-lte')}}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{asset('admin-lte')}}/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin-lte')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{asset('admin-lte')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('admin-lte')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin-lte')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin-lte')}}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{asset('admin-lte')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{asset('admin-lte')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin-lte')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset('admin-lte')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin-lte')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{asset('admin-lte')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('admin-lte')}}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-lte')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{asset('admin-lte')}}/dist/js/pages/dashboard.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-lte')}}/dist/js/demo.js"></script>
    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format : 'yyyy-mm-dd'
        })

        // $('ckeditor').ckeditor();

        $('.number-only').keyup(function(){
            var value = $(this).val();
            var regex = /^[0-9.,]+$/g;            
            var val = value.replace(/[^0-9.]/g,'');
            $(this).val(val);
        })
    </script>
    @stack('js')
</body>

</html>
