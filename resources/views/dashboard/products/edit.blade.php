@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>@lang('site.products')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.products.index')}}"><i class="fa fa-dashboard"></i>@lang('site.products')</a></li>
                <li class="active"><a href="{{route('dashboard.products.create')}}"><i class="fa fa-dashboard"></i>@lang('site.edit')</a></li>
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
                       <form action="{{route('dashboard.products.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                           <div class="form-group">
                                <label for="">@lang('site.categories')</label>
                                <select name="category_id" class="form-control">
                                <option>@lang('site.all_categories')</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                           </div><!-- end of form-group category -->

                          @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{$product->name }}">
                            </div><!-- end of form-group name -->

                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.description')</label>
                                <textarea name="{{ $locale }}[description]" class="form-control ckeditor"> {{ $product->description }} </textarea>
                            </div><!-- end of form-group description -->
                          @endforeach

                          <div class="form-group">
                                 <label for="">@lang('site.image')</label>
                                 <input type="file" name="image" class="form-control image">
                            </div> <!-- end of form-group image -->

                            <div class="form-group">
                                <img src="{{ $product->image_path }}" style="width:100px" class="img-thumbnail image-preview" alt="">
                            </div> <!-- end of form-group preview image -->

                            <div class="form-group">
                                 <label for="">@lang('site.purchase_price')</label>
                                 <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{$product->purchase_price}}">
                            </div> <!-- end of form-group purchase price -->

                            <div class="form-group">
                                 <label for="">@lang('site.sale_price')</label>
                                 <input type="number" name="sale_price" step="0.01" class="form-control" value="{{$product->sale_price}}">
                            </div> <!-- end of form-group purchase price -->

                            <div class="form-group">
                                 <label for="">@lang('site.stock')</label>
                                 <input type="number" name="stock" class="form-control" value="{{$product->stock}}">
                            </div> <!-- end of form-group purchase price -->



                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.edit')</button>
                            </div> <!-- end of form-group password confirmation-->
                       </form> <!-- end of form -->
                  </div> <!-- end of box body-->
             </div>
        </section>

      </div><!-- /.content-wrapper -->
@endsection
