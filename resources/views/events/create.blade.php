@extends('layouts.admin')



@section('content')

    <!-- BEGIN: Page Main-->

    {{--<div id=    "main">--}}

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">CREATE EVENT</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item"><a href="{{route('events')}}">gallery</a>

                            </li>

                            <li class="breadcrumb-item active">create

                            </li>

                        </ol>

                    </div>

                </div>

                <div class="card center-align">

                    {{--<div class="card-content" style="padding: 20px 5px;">--}}

                    {{--<a href="{{route('products')}}" data-target="modal1"--}}

                    {{--class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">--}}

                    {{--All Product--}}

                    {{--</a>--}}

                    {{--</div>--}}

                    @include('includes.flash')

                </div>

            </div>

        </div>





        <div class="row">

            <div class="col s12 m6 ">

                <div id="" class=" ">

                    <div class="card-content">

                        <div class="row">

                            <div class="col m8 s8 l8">

                                <h4 class="card-title"

                                    style="display: inline!important;">

                                    Create Gallery Image</h4>

                            </div>

                        </div>

                        <hr>

                        @include('includes.flash')

                        <form class="col s12" method="post"

                              action="{{route('save_gallery_upload')}}"

                              enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="input col s12">

                                    <select name="category_id" required

                                            class="{{ $errors->has('category_id') ? ' is-invalid' : '' }}"

                                            id="category_id">

                                        @foreach(\App\Category::all() as $key => $category)

                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach

                                    </select>

                                    <label>Category</label>

                                    @if ($errors->has('category_id'))

                                        <span class="invalid-feedback"

                                              role="alert">

                                                                                    <strong>{{ $errors->first('category_id') }} </strong>

                                                                                </span>

                                    @endif

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    <input id="name" name="name" required

                                           type="text"

                                           value="{{old('name')}}"

                                           class="{{ $errors->has('name') ? ' is-invalid' : '' }}">

                                    <label for="name">Product Name</label>

                                    @if ($errors->has('name'))

                                        <span class="invalid-feedback"

                                              role="alert">

                                                                                        <strong>{{ $errors->first('name') }} </strong>

                                                                                    </span>

                                    @endif

                                </div>

                            </div>



                            <div class="input-field col s12">

                                <input id="sales_price" required

                                       class="{{ $errors->has('sales_price') ? ' is-invalid' : '' }}"

                                       name="sales_price"

                                       value="{{old('sales_price')}}"

                                       type="number">

                                <label for="sales_price">&#x20a6;</label>

                                @if ($errors->has('sales_price'))

                                    <span class="invalid-feedback" role="alert">

                                                                           <strong>{{ $errors->first('sales_price') }}</strong>

                                                                    </span>

                                @endif

                            </div>



                            <div id="file-upload" class="section">

                                <!--Default version-->

                                <div class="row section">

                                    <div class="col s12 m4 l3">

                                        <p>Default version</p>

                                    </div>

                                    <div class="col s12 m8 l9">

                                        <div class="dropify-wrapper">

                                            <div class="dropify-message"><span class="file-icon"></span>

                                                <p>Drag and drop a file here or click</p>

                                                <p class="dropify-error">Ooops, something wrong appended.</p></div>

                                            <div class="dropify-loader"></div>

                                            <div class="dropify-errors-container">

                                                <ul></ul>

                                            </div>

                                            <input type="file" id="input-file-now" class="dropify" data-default-file="" multiple>

                                            <button type="button" class="dropify-clear">Remove</button>

                                            <div class="dropify-preview"><span class="dropify-render"></span>

                                                <div class="dropify-infos">

                                                    <div class="dropify-infos-inner"><p class="dropify-filename"><span

                                                                    class="file-icon"></span> <span

                                                                    class="dropify-filename-inner"></span></p>

                                                        <p class="dropify-infos-message">Drag and drop or click to

                                                            replace</p></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                                                    <textarea id="description"

                                                                              name="description" required

                                                                              class="materialize-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>

                                    <label for="description"

                                           class="active">Description</label>

                                    @if ($errors->has('description'))

                                        <span class="invalid-feedback"

                                              role="alert">

                                                                            <strong>{{ $errors->first('description') }} </strong>

                                                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="row">

                                <div class="col s12 file-field input-field">

                                    <div class="file-path-wrapper">

                                        <button class="btn btn-lg save_product btn-block float-right">

                                            Save

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </form>





                    </div>

                </div>

            </div>

        </div>

    </div>

    <hr>



@endsection
