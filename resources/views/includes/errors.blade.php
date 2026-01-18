@if(count($errors) > 0)
    <div class="container">

        <div class="card-alert card pl-2" role="alert">
            <p class="text-danger red-text">Oops!</p>

            @foreach($errors->all() as $message)


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="zmdi zmdi-close"></i>
                </button>
                <p class="red-text">
                    <i class="zmdi zmdi-close-circle red-text"></i>{{$message}}
                </p>


            @endforeach



            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>
        </div>

    </div>
@endif
