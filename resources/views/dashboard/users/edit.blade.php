@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-dashboard"></i>@lang('site.users')</a></li>
                <li class="active"><a href="{{route('dashboard.users.create')}}"><i class="fa fa-dashboard"></i>@lang('site.edit')</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title"> @lang('site.edit') </h3>
                  </div> <!-- end of box header -->

                  <div class="box-body">
                        @include('partials._errors')
                       <form action="{{route('dashboard.users.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                                 <label for="">@lang('site.first_name')</label>
                                 <input type="text" name="first_name" class="form-control" value ="{{ $user->first_name }}">
                            </div> <!-- end of form-group first name -->


                            <div class="form-group">
                                 <label for="">@lang('site.last_name')</label>
                                 <input type="text" name="last_name" class="form-control" value ="{{ $user->last_name }}">
                            </div> <!-- end of form-group last name -->


                            <div class="form-group">
                                 <label for="">@lang('site.email')</label>
                                 <input type="email" name="email" class="form-control" value ="{{ $user->email }}">
                            </div> <!-- end of form-group email -->

                             <div class="form-group">
                                 <label for="">@lang('site.image')</label>
                                 <input type="file" name="image" class="form-control image">
                             </div> <!-- end of form-group image -->

                             <div class="form-group">
                                <img src="{{ $user->image_path }}" style="width:100px" class="img-thumbnail image-preview" alt="">
                            </div> <!-- end of form-group image -->

                 <div class="form-group">
                     <label for="">@lang('site.permissions')</label>
                     <div class="nav-tabs-custom">

                     @php

                        $models = ['users' , 'categories' , 'products' , 'clients' , 'orders'];

                        $maps = ['create' , 'read' , 'update' , 'delete'];

                     @endphp

                       <ul class="nav nav-tabs">

                            @foreach ($models as $index=>$model)
                                    <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                            @endforeach
                        </ul>

                        <div class="tab-content">

                            @foreach ($models as $index=>$model)

                                <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                     @foreach ($maps as $map)
                                        <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission($model . '_' . $map) ? 'checked' : '' }} value="{{ $model . '_' . $map }}"> @lang('site.' . $map)</label>
                                    @endforeach

                                </div>

                                    @endforeach
                       </div> <!-- end of tabs content -->
                     </div><!-- end of tabs -->
                 </div> <!-- end of form group -->
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                            </div> <!-- end of form-group password confirmation-->
                       </form> <!-- end of form -->
                  </div> <!-- end of box body-->
             </div>
        </section>

      </div><!-- /.content-wrapper -->
@endsection
