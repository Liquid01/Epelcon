<script src="{{asset('backassets/vendors/sweetalert/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets2/js/js.cookie.js')}}"></script>
<script>
    $(document).ready(function () {
            {{--if (!Cookies.get('notif_sesnd')) {--}}
            {{--    Swal.fire({--}}
            {{--        title: '<strong>NOTICE</strong>',--}}
            {{--        icon: 'info',--}}
            {{--        html:--}}
            {{--            'Congratulations to our Latest <b>Qualifiers</b> and  <b>Stockists</b>, We celebrate you. ' +--}}
            {{--            '<a href="{{route('stockists')}}">Click Here</a> ' +--}}
            {{--            ' to view all Stockists' +--}}
            {{--            '<br><hr>' +--}}
            {{--            '<div>' +--}}
            {{--            '<p style="color:orange"><a href="{{route('my_profile')}}"><b>Click Here</b></a> to Update Your Profile ' +--}}
            {{--            '<b>and GAIN ACCESS</b> to Transfers and Wallet Creation</p></div>'+--}}
            {{--            '<br><hr>' +--}}
            {{--            '<div>' +--}}
            {{--            '<p><a href="{{route('create_store')}}">Click Here</a> to Create your Store for display on ' +--}}
            {{--            '<b>Stockist Page</b> If you are a stockist</p></div>',--}}
            {{--        showCloseButton: true,--}}
            {{--        focusConfirm: false,--}}
            {{--        confirmButtonText:--}}
            {{--            '<i class="fa fa-thumbs-up"></i> Great!',--}}
            {{--        confirmButtonAriaLabel: 'Thumbs up, great!'--}}
            {{--    })--}}
            {{--    Cookies.set('notif_sesnd', true, {expires: 1})--}}
            {{--}--}}

        }
    );
</script>
