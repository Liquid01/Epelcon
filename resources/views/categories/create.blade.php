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
                        <h5 class="breadcrumbs-title mt-0 mb-0">CREATE CATEGORY</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('categories')}}">Categories</a>
                            </li>
                            <li class="breadcrumb-item active">create
                            </li>
                        </ol>
                    </div>

                </div>
                <div class="card center-align">
                    <div class="card-content" style="padding: 20px 5px;">
                        <a href="{{route('categories')}}" data-target="modal1"
                           class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">
                            All Categories
                        </a>
                        {{--<a href="{{route('')}}" data-target="modal-withdraw" class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">--}}
                        {{--Shop--}}
                        {{--</a>--}}
                    </div>
                    @include('includes.flash')
                </div>
            </div>
        </div>


        <div class="col s12">
            <div class="container">
                <div class="section" id="user-profile">
                    <div class="row">
                        <div class="col s12 m8 l6">
                            <div class="row">
                                <div class="card user-card-negative-margin z-depth-0" id="feed">
                                    <div class="card-content card-border-gray">
                                        <div class="row">
                                            <div class="col s12">
                                                <div id="Form-advance" class="card card card-default scrollspy">
                                                    <div class="card-content">
                                                        <div class="row">
                                                            <div class="col m8 s8 l8">
                                                                <h4 class="card-title"
                                                                    style="display: inline!important;">Create
                                                                    Category</h4>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @include('includes.flash')
                                                        <form class="col s12" method="post"
                                                              action="{{route('save_category')}}"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <input id="name" name="name" required
                                                                           type="text"
                                                                           value="{{old('name')}}"
                                                                           class="{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                                                    <label for="name">Category Name</label>
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback"
                                                                              role="alert">
                                                                                        <strong>{{ $errors->first('name') }} </strong>
                                                                                    </span>
                                                                    @endif
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
                                                                    <div class="btn float-left">
                                                                        <span>Image</span>
                                                                        <input id="image" name="image"
                                                                               class="file-path validate {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                                               value="{{old('image')}}"
                                                                               type="file">
                                                                    </div>
                                                                    @if ($errors->has('image'))
                                                                        <span class="invalid-feedback"
                                                                              role="alert">
                                                                                    <strong>{{ $errors->first('image') }} </strong>
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
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection
