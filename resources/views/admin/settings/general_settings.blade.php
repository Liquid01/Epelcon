@extends('layouts.admin')
@section('page_title')
    General Settings
@endsection
@section('content')
    <div class="row">
        <div class="container">
            <div class="col s12">
                <div class="container">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                General Settings
                            </div>
                            <div class="container">
                                <div class="">
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($settings as $setting)
                                            <tr>
                                                <td>{{$setting->name}}</td>
                                                <td>{{$setting->status == 0? 'CLOSED':'OPEN'}}</td>
                                                <td>
                                                    @if($setting->type == 'GENERAL_SETTINGS')

                                                        @if($setting->status == 0)
                                                            <form method="post" action="{{route('admin_open_withdrawals', $setting->id)}}">
                                                                @csrf
                                                                <button class="btn btn-small btn-success green white-text">
                                                                    Open
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form method="post" action="{{route('admin_close_withdrawals', $setting->id)}}">
                                                                @csrf
                                                                <button class="btn btn-small btn-warning">Close</button>
                                                            </form>
                                                        @endif
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
