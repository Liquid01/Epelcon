
<script src="{{asset('backassets/js/vendors.min.js')}}" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->


<script src="{{asset('backassets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"

        type="text/javascript"></script>

<script src="{{asset('backassets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/chartjs/chart.min.js')}}"></script>

<!-- END PAGE VENDOR JS-->

<script src="{{asset('assets/js/overlay.js')}}"></script>


<!-- BEGIN THEME  JS-->

<script src="{{asset('backassets/js/plugins.min.js')}}" type="text/javascript"></script>

@include('includes.customjs')

<script src="{{asset('backassets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/data-tables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/fonts/fontawesome/js/all.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/fonts/fontawesome/js/all.min.js')}}" type="text/javascript"></script>

<!-- END THEME  JS-->

{{--Datatables--}}

{{--<script src="{{asset('assets/plugins/datatables/dataTables.min.js')}}" type="text/javascript"></script>--}}

<script src="{{asset('backassets/js/scripts/ui-alerts.min.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL JS-->

<script src="{{asset('backassets/js/scripts/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>


<script src="{{asset('backassets/js/scripts/advance-ui-modals.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/eCommerce-products-page.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/form-file-uploads.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/noUiSlider/nouislider.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/croppie.js')}}" type="text/javascript"></script>


<!-- END PAGE LEVEL JS-->

{{--<!--Start of Tawk.to Script-->--}}
{{--<script type="text/javascript">--}}
{{--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--    (function(){--}}
{{--        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--        s1.async=true;--}}
{{--        s1.src='https://embed.tawk.to/5e75dd208d24fc226589156d/default';--}}
{{--        s1.charset='UTF-8';--}}
{{--        s1.setAttribute('crossorigin','*');--}}
{{--        s0.parentNode.insertBefore(s1,s0);--}}
{{--    })();--}}
{{--</script>--}}
{{--<!--End of Tawk.to Script-->--}}


<script>


    $("#pay_button").on('click', function () {

        // alert('i am here');

        payWithPaystack();

    });

    function payWithPaystack() {


        var amount = $("#amount").val();

        var email = $("#email").val();

        var phoneNumber = $("#phone").val();


        var name = $("#name").val();

        var name_arr = name.split(' ');

        var first = name_arr[0];

        var last = name_arr[1];

        var voucher_amount = 10000 + $("#amount").val() * 100;


        var handler = PaystackPop.setup({

            key: '{{config('app.ps_live_pk')}}',

            email: email,

            amount: voucher_amount,

            ref: 'LSFW' + Math.floor((Math.random() * 1000000000) + 1),

            firstname: first,

            lastname: last,

            metadata: {

                custom_fields: [

                    {

                        display_name: first,

                        variable_name: "mobile_number",

                        value: phoneNumber

                    }

                ]

            },

            callback: function (response) {

// alert(amount);

                alert('Transaction Successful. transaction reference is ' + response.reference);


                var message = verifyTransaction(response.reference, amount);

                alert(reponse.reference);

            },

            onClose: function () {

                alert('Transaction Terminated Successfully');

            }

        });

        handler.openIframe();

    }


    function verifyTransaction(ref, amount) {


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        });

// alert(amount);

        $.ajax({

            type: "POST",

            url: "{{url('member/fund/wallet/verify')}}",

            dataType: 'json',

            data: {'reference': ref, 'amount': amount},

            success: function (data) {

                if (data !== null && data.status == 'success') {

                    $("#wallet_fund_content").html('Transaction Successful; Your Wallet has been CREDITED with N' + amount + '-- REFERENCE: ' + ref);

                } else {

                    return "failed to credit Wallet";

                }

            }


        });

    }

</script>

<script>

    $(document).ready(function () {

        $('tabs').tabs();


        $('.modal').modal();

    });

</script>
