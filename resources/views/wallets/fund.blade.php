@extends('layouts.members')



@section('content')
    <div class="col s12">

        <div class="container">


            <div class="row">

                <div class="col-md-12">

                    <div class="card-width">
                        <div class="card border-radius-6">
                            <div class="card-content" id="wallet_fund_content">
                                @include('includes.errors')
                                @include('includes.back_flash')

                                <form class="form-horizontal" method="post" action="{{route('admin_load_wallet')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username" class="col-md-2 control-label">Username</label>
                                        <div class="col-md-10">
                                            <input type="text" name="username" class="form-control {{$errors->has('username')? 'is-invalid': ''}}" placeholder="Enter username to fund">
                                            @if($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>
                                                        {{$errors->first('username')}}
                                                   </strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-md-2 control-label">Amount</label>
                                        <div class="col-md-10">
                                            <input type="number" name="amount" min="1000" class="form-control {{$errors->has('amount')? 'is-invalid': ''}}" id="amount" placeholder="Amount">
                                            @if($errors->has('amount'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>
                                                        {{$errors->first('amount')}}
                                                   </strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <button class="btn btn-raised btn-primary btn-block" id="pay_button">Fund</button>
                                </form>


                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
    <!--card stats start-->
@endsection
