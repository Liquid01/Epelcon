@extends('layouts.members')



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

                        <h5 class="breadcrumbs-title mt-0 mb-0">CREATE REQUEST</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item active">create

                            </li>

                        </ol>

                    </div>

                </div>

                <div class="card center-align">

                    <div class="card-content" style="padding: 20px 5px;">

                        <a href="#!" data-target="modal1" onclick="alert('Will be available Shortly');"

                           class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">

                            All Requests

                        </a>

                    </div>

                    @include('includes.flash')

                </div>

            </div>

        </div>


        <div class="row">

            <div class="col s12 m6 ">

                <div id="" class="card">

                    <div class="card-content">

                        <div class="row">

                            <div class="col m8 s8 l8">

                                <h4 class="card-title"

                                    style="display: inline!important;">

                                    Request</h4>

                            </div>

                        </div>

                        <hr>

                        <form class="col s12" method="post"

                              action="{{route('save_member_request')}}"

                              enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="input-field col s12">

                                    <input id="subject" name="subject" required

                                           type="text"

                                           value="{{old('subject')}}"

                                           class="{{ $errors->has('subject') ? ' is-invalid' : '' }}">

                                    <label for="subject">Subject</label>

                                    @if ($errors->has('subject'))

                                        <span class="invalid-feedback"

                                              role="alert">

                                                                                        <strong>{{ $errors->first('subject') }} </strong>

                                                                                    </span>

                                    @endif

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                  <textarea id="body" name="body" required class="materialize-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}">{{old('body')}}</textarea>

                                    <label for="description"

                                           class="active">Description</label>

                                    @if ($errors->has('body'))

                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $errors->first('body') }} </strong></span>

                                    @endif

                                </div>

                            </div>

                            <div class="row">

                                <div class="col s12 file-field input-field">

                                    <div class="file-path-wrapper">

                                        <button class="btn btn-lg save_product btn-block float-right">

                                            Send

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

@endsection
