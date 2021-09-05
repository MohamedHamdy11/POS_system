@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.categories.index')}}"><i class="fa fa-dashboard"></i>@lang('site.categories')</a></li>
                <li class="active"><a href="{{route('dashboard.categories.create')}}"><i class="fa fa-dashboard"></i>@lang('site.edit')</a></li>
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
                       <form action="{{route('dashboard.categories.update' , $category->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $category->translate($locale)->name }}">
                            </div>
                          @endforeach

                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                            </div> <!-- end of form-group password confirmation-->
                       </form> <!-- end of form -->
                  </div> <!-- end of box body-->
             </div>
        </section>

      </div><!-- /.content-wrapper -->
@endsection
