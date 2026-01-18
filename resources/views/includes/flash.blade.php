@if (session('success'))

    <div class="card-alert card gradient-45deg-green-teal">

        <div class="card-content white-text">

            <p>

                <i class="fa fa-check-circle"></i> :  {{ session('success')}}.</p>

        </div>

        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">×</span>

        </button>

    </div>

@endif



@if (session('fail'))



    <div class="card-alert card gradient-45deg-red-pink">

        <div class="card-content white-text">

            <p>

                <i class="fa fa-close"></i> : {{ session('fail') }}</p>

        </div>

        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">×</span>

        </button>

    </div>

@endif



@if (session('warn'))

    <div class="card-alert card gradient-45deg-red-pink">

        <div class="alert warning-icon icon" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

            <i class="fa fa-lg fa-warning"></i> {{session('warn')}}

        </div>

    </div>

@endif



@if (session('inform'))

    <div class="card-alert card gradient-45deg-red-pink">

        <div class="alert info-icon icon" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

            <i class="fa fa-check-circle-o"></i> {{session('inform')}}

        </div>

    </div>

@endif
