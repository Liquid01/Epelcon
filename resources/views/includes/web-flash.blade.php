@if (session('success'))
    <div class="alert alert-success alert-light alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="zmdi zmdi-close"></i>
        </button>
        <strong>
            <i class="zmdi zmdi-close-circle"></i> Success!</strong> {{ session('success') }}
    </div>
@endif

@if (session('fail'))
    {{--<div class="alert alert-danger alert-light alert-dismissible" role="alert">--}}
    {{--<div class="card-content white-text">--}}
    {{--<p class="web-alert">--}}
    {{--<i class="material-icons">error</i> {{ session('fail') }}</p>--}}
    {{--</div>--}}
    {{--<button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">--}}
    {{--<span aria-hidden="true">×</span>--}}
    {{--</button>--}}
    {{--</div>--}}

    <div class="alert alert-danger alert-light alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="zmdi zmdi-close"></i>
        </button>
        <strong>
            <i class="zmdi zmdi-close-circle"></i> Error!</strong> {{ session('fail') }}
    </div>
@endif










