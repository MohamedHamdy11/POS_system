@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>@lang('site.clients')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.clients.index')}}"><i class="fa fa-dashboard"></i>@lang('site.clients')</a></li>
                <li class="active"><a href="{{route('dashboard.clients.create')}}"><i class="fa fa-dashboard"></i>@lang('site.add')</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title"> @lang('site.add') </h3>
                  </div> <!-- end of box header -->

                  <div class="box-body">
                        @include('partials._errors')
                       <form action="{{route('dashboard.clients.store')}}" method="POST">
                          @csrf
                          @method('POST')

                               <div class="form-group">
                                  <label for="">@lang('site.name')</label>
                                  <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                               </div>

                            @for($i=0; $i< 2; $i++)
                               <div class="form-group">
                                  <label for="">@lang('site.phone')</label>
                                  <input type="text" name="phone[]" class="form-control">
                               </div>
                            @endfor
                               <div class="form-group">
                                  <label for="">@lang('site.address')</label>
                                 <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                               </div>


                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
                            </div> <!-- end of form-group password confirmation-->
                       </form> <!-- end of form -->
                  </div> <!-- end of box body-->
             </div>
        </section>

      </div><!-- /.content-wrapper -->
@endsection
