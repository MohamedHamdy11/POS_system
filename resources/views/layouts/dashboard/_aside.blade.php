
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">

    <div class="pull-left image">

      <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

    </div>

    <div class="pull-left info">

      <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>

      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

    </div>

  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">

    <!-- Optionally, you can add icons to the links -->
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-th"></i> <span>@lang('site.dashboard')</span></a></li>
    @if(auth()->user()->hasPermission('categories_read'))

        <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i> <span>@lang('site.categories')</span></a></li>

    @endif

    @if(auth()->user()->hasPermission('products_read'))

        <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i> <span>@lang('site.products')</span></a></li>

    @endif

    @if(auth()->user()->hasPermission('clients_read'))

        <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-th"></i> <span>@lang('site.clients')</span></a></li>

    @endif

    @if(auth()->user()->hasPermission('orders_read'))

     <li><a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-th"></i> <span>@lang('site.orders')</span></a></li>

   @endif

    @if(auth()->user()->hasPermission('users_read'))

       <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i> <span>@lang('site.users')</span></a></li>

    @endif


  </ul><!-- /.sidebar-menu -->

</section>

<!-- /.sidebar -->
</aside>
