@extends('layouts.admin')
@section('page_title')
    My Dashboard
@endsection
@section('content')
    <div class="row">

        <div class="col s12">
            <div class="container">
                <span class="user-details">
                   <strong>Welcome {{auth()->user()->firstname ." | ". auth()->user()->lastname}}</strong>
                </span>
                <!--card stats start-->

                @if(auth()->user()->is_admin ==1)
                    @include('admin.dash')
                @elseif(auth()->user()->is_admin == 2)
                    @include('support.support_dash')
                @endif
            </div>
        </div>
    </div>
@endsection
