@extends('layouts.members')

@section('page_title')
    New Savings Account
@endsection

@section('content')

    <div class="col m8 offset-m2 l8 offset-l2 s12" id="card-reveal-section">
        <div class="card" style="overflow: hidden;">
            <div class="card-content">
                @include('includes.back_flash')
                <a href="{{route('member_savings')}}" style="float:right;"
                   class="mb-2 waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">
                    All savings
                </a> <br>
                <span class="card-title activator grey-text text-darken-4 mt-2">
                    New Savings
                    {{--<i class="material-icons right">more_vert</i>--}}

                  </span>
                <form action="{{route('store_savings_account')}}" method="post">
                    @csrf
                    <div class="input-field mb-10">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="plan_name" name="plan_name" required
                                       type="text"
                                       value="{{old('plan_name')}}"
                                       class="{{ $errors->has('plan_name') ? ' is-invalid' : '' }}">
                                <label for="plan_name">Plan Name</label>
                                @if ($errors->has('plan_name'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plan_name') }} </strong>
                                        </span>
                                @endif
                                <small>e.g. Housing Plan,Education Plan , Wedding Plan,Car Plan , Children
                                    Plan,
                                    Holiday Plan, etc.
                                </small>

                            </div>
                        </div>
                    </div>
                    <div class="input-field mb-10">
                        <div class="row">
                            <div class=" col s12">
                                <select name="plan_type" required
                                        class="browser-default form-control {{ $errors->has('plan_type') ? ' is-invalid' : '' }}"
                                        id="plan_type">
                                    <option value="0">Select Plan Type</option>
                                    @foreach($savings_type as $key => $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('plan_type'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plan_type') }} </strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="input-field mb-10">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="plan_amount" name="plan_amount" required
                                       type="text"
                                       min="3"
                                       value="{{old('plan_amount')}}"
                                       class="{{ $errors->has('plan_amount') ? ' is-invalid' : '' }}">
                                <label for="plan_amount">Amount</label>
                                @if ($errors->has('plan_amount'))
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('plan_amount') }} </strong>
                                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--<div class="input-field mb-10">--}}
                    {{--<div class="row">--}}
                    {{--<div class="input-field col s12">--}}
                    {{--<input id="plan_duration" name="plan_duration" required--}}
                    {{--type="number"--}}
                    {{--min="1"--}}
                    {{--value="{{old('plan_duration')}}"--}}
                    {{--class="{{ $errors->has('plan_duration') ? ' is-invalid' : '' }}">--}}
                    {{--<label for="plan_duration">Duration (in years)</label>--}}
                    {{--@if ($errors->has('plan_duration'))--}}
                    {{--<span class="invalid-feedback" role="alert">--}}
                    {{--<strong>{{ $errors->first('plan_duration') }} </strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="input-field mb-10">
                        <div class="row">
                            <div class=" col s12">
                                <select name="plan_duration" required
                                        class="browser-default form-control {{ $errors->has('plan_duration') ? ' is-invalid' : '' }}"
                                        id="plan_duration">
                                    <option value="0">Select Duration</option>
                                    <option value="1">3 Months</option>
                                    <option value="2">6 Months</option>
                                    <option value="2">12 Months</option>
                                </select>
                                <label for="plan_duration"></label>
                                @if ($errors->has('plan_duration'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plan_duration') }} </strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-success" style="float:right; margin-top:-30px;">Submit</button>
                </form>
            </div>
            <div class="card-reveal" style="display: none; transform: translateY(0%);">
                  <span class="card-title grey-text text-darken-4">Card Title
                      <i class="material-icons right">close</i>
                  </span>
                <p>Here is some more information about this product that is only revealed once clicked
                    on.
                </p>
            </div>
        </div>


    </div>

@endsection