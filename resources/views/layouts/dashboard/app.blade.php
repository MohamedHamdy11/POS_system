<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html dir="{{ LaravelLocalization::getCurrentLocaleName() }}">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/bootstrap.min.css')}}">
    <!-- ionicons -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/ionicons.min.css')}}">
    <!-- skin-blue -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/skin-blue.min.css')}}">

    @if(app()->getLocale() == 'ar')
            <!-- Font Awesome RTL-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome-rtl.css">
            <!-- AdminLTE RTL-->
            <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/AdminLTE-rtl.min.css')}}">
            <!-- family=Cairo-->
            <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
            <!--bootstrap-rtl-->
            <link rel="stylesheet" href="{{asset('dashboard/dist/css/bootstrap-rtl.min.css')}}">
            <!--bootstrap-rtl-->
            <link rel="stylesheet" href="{{asset('dashboard/dist/css/rtl.min.css')}}">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @else
            <!--Source+Sans+Pro-->
            <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
            <!-- AdminLTE-->
            <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/AdminLTE.min.css')}}">
            <!-- Font Awesome-->
            <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/fontawesome.min.css')}}">
    @endif
    <style>
        .mr-2{
            margin-right: 5px;
        }
    </style>
     <!-- jQuery 2.1.4 -->
   <script src="{{asset('dashboard/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

   <!-- Noty -->
   <link rel="stylesheet" href="{{ asset('dashboard/plugins/Noty/noty.css') }}">
   <script src="{{ asset('dashboard/plugins/Noty/noty.min.js') }}"></script>

   <!-- morris -->
   <link rel="stylesheet" href="{{ asset('dashboard/plugins/morris/morris.css') }}">

    <!-- iCheck -->
    <script src="{{asset('dashboard/plugins/iCheck/all.css')}}"></script>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>





    <!-- ckeditor -->
    <script src="{{asset('dashboard/plugins/ckeditor/ckeditor.js')}}"></script>

  </head>
  <!--
  BODY TAG OPTIONS:
  =================

  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="center-block">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      @include('layouts.dashboard._aside')


      <!-- Content Wrapper. Contains page content -->
      <!-- Your Page Content Here -->
       @yield('content')
      @include('partials._session')
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- Bootstrap 3.3.4 -->
    <script src="{{asset('dashboard/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard/dist/js/app.min.js')}}"></script>

     <!-- jquery number -->
    <script src="{{asset('dashboard/bootstrap/js/jquery.number.min.js')}}"></script>

    <!-- jquery number -->
    <script src="{{asset('dashboard/bootstrap/js/printThis.js')}}"></script>

    <!-- morris.. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('dashboard/plugins/morris/morris.min.js')}}"></script>

         <!-- custom.. -->
    <script src="{{asset('dashboard/bootstrap/js/custom/order.js')}}"></script>
    <script src="{{asset('dashboard/bootstrap/js/custom/image_preview.js')}}"></script>


  <script>
    // delete

    $('.delete').click(function (e) {
       var that = $(this)

       e.preventDefault();

       var n = new Noty({
           text : "@lang('site.confirm_delete')",

           type : "warning" ,

           killer : true ,

           buttons : [
               Noty.button("@lang('site.yes')" , 'btn btn-success mr-2' , function(){
                   that.closest('form').submit();
               }),

               Noty.button("@lang('site.no')" , 'btn btn-primary mr-2', function(){
                   n.close();
               })
           ]
       });
       n.show();
    }); // end of delete



    //image preview

$(".image").change(function() {


    if (this.files && this.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]); // convert to base64 string
  }


});// end of image preview


CKEDITOR.config.language = "{{ app()->getLocale() }}";


  </script>
  @stack('scripts')
  </body>
</html>
