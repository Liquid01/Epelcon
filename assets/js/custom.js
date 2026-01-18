$(document).ready(function () {


    // //activation form functions
    // $('#hasRefferer').prop('checked', false);
    // $('#hasRefferer').change(function () {
    //     // alert('hi');
    //     if($(this).is(":checked"))
    //     {
    //         $(".sponsor").slideDown(500);
    //         $("#referrer").hide();
    //     }else
    //     {
    //         $(".sponsor").slideUp(500);
    //         $("#referrer").show();
    //     }
    // });

    //REGISTER

    $('.register_btn').on('click', function () {
        // alert('ho');

        $('#regg').show();


        $('html, body').animate({
            scrollTop: $("#register").offset().top - 60
        }, 2000);

    });

    $('.register-btn').on('click', function () {
        // alert('ho');

        $('.login1').fadeOut(500);
        $('.register1').slideDown();

    });

    $('.login-btn').on('click', function () {
        // alert('ha');

        $('.register1').fadeOut(500);
        $('.login1').slideDown();

    });

    //registration Terma
    $('#reg_terms').prop('checked', false);
    $('#reg_button').prop('disabled', true);

    $('#reg_terms').change(function () {
        // alert('hi');
        if ($(this).is(":checked")) {
            $("#reg_button").prop('disabled', false);
        } else {
            $("#reg_button").prop('disabled', true);
        }
    });

    //REGISTER

    // var url = window.location.href;
    // // alert(url);
    // var host = window.location.host;
    // if(url.indexOf('/register') != -1) {
    //
    //     // $('.home_btn').attr('href', "");
    //
    //
    //     // $('#regg').slideDown();
    //     // $('html, body').animate({
    //     //     scrollTop: $("#register").offset().top - 60
    //     // }, 2000);;
    // }



    //Payment form functions
    $('#pay_method').prop('checked', false);

    $('#pay_method').change(function () {

        if ($(this).is(":checked")) {
            $(".online_pay").slideDown(500);
            $(".activation_wrapper").hide(500);
        } else {
            $(".online_pay").hide(500);
            $(".activation_wrapper").slideDown(500);
        }
    });


    // $('#profile_input').change(function () {
    //     readProfileImage(this);
    // });
    //
    //
    $('.profile_pix_edit').click(function () {
        alert('i am here');
    });


    function readProfileImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        readURL(this);
    });

    var one_pin = 15000;
    var minimum_quantity = 1;
    // alert('fire');


    $("#pin_quantity").val(minimum_quantity);
    var total = addAmount(minimum_quantity);
    // alert('hi');
    $("#pay_amount").val(total);

    //MINUS CLICKED

    $("#deduct").on("click", function () {

        var oldValue = $("#pin_quantity").val();
        var newValue = parseFloat(oldValue) - 1;
        $("#pin_quantity").val(newValue);

        changed(newValue);
    });

    //PLUS CLICKED

    $("#increase").on("click", function () {

        var oldValue = $("#pin_quantity").val();
        var newValue = parseFloat(oldValue) + 1;
        $("#pin_quantity").val(newValue);

        changed(newValue);

    });

    //Quantity Changed

    $("#pin_quantity").on('input', function () {
        var newInput = $(this).val();
        var newValue = parseFloat(newInput)

        changed(newValue);
    });

    //DONATION


    donationChanged($("#donation").val());
    $("#donation").on('input', function () {

        var newInput = $(this).val();
        var newValue = parseFloat(newInput)

        donationChanged(newValue);
    });


    function changed(updVal) {
        var quantity = updVal;

        if (quantity < minimum_quantity) {
            alert('Oops, minimum  is ; please, try again');
            $("#pin_quantity").val(minimum_quantity);
            var min_amount = addAmount(minimum_quantity);
            $("#pin_amount").html('<h2 class="text-center" style="margin-top: 30px; margin-left:auto;">&#x20a6;' + min_amount + '</h2>');
        } else {
            var amount = addAmount(quantity);

            $("#pin_amount").html('<h2 class="text-center" style="margin-top: 30px; margin-left:auto;">&#x20a6;' + amount + '</h2>');
            $("#pay_amount").val(amount);
        }
    }

    $("#calc_clear").click(function () {
        $("#pin_amount").html("");

    });

    function donationChanged(updVal) {
        // alert('fire');
        var amount = updVal;

        if (amount < 1) {
            alert('Oops, invalid amount ; please, try again');
        } else {
            $("#donation_amount").val(amount);
            $("#bank_amount").html(amount);
            $("#naira_value").html(amount * 370);
            // alert($("#pay_amount").val());

        }
    }

    $("#calc_clear").click(function () {
        $("#pin_amount").html("");

    });


    function addAmount(quantity) {

        var am = quantity * one_pin;
        $("#pin_amount").html('<h2>&#x20a6;' + am + '</h2>');
        return am;
    }


    $(".compose").click(function () {

        compose()

    });
    $(".composeOne").click(function () {

        compose()

    });
    $(".composeAll").click(function () {

        compose()

    });


    function compose() {
        // alert('forget');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "sendmail",
            dataType: 'html',
            success: function (data) {

                if (data !== null) {

                    $(".mailContent").show();
                    $(".mailContent").html(data);

                } else {

                    $(".mailContent").html("<p> No data available");

                }
            }

        });
    }


    $("#paidVoucher").click(function () {
        $(this).loadingOverlay('show');
    });

    $(".event-ads2:after").click(function () {
        $(".event-ads2").hide();
    });

    // $("#buy_pin_button").on('click', function () {
    //     alert('yeah');
    //
    //     payWithPaystack();
    //
    //
    // });


$("#admin_sell").on('click', function (){
    $("#customer_form").slideDown(500);
   $(this).hide();
});



$("#details2").on('click', function (){
    alert('hi');
});



    $("#show_bank_details").on('click', function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "get_bank_details",
            dataType: 'html',
            success: function (data) {

                if (data !== null) {

                    $(".mailContent").show();
                    $(".mailContent").html(data);

                } else {

                    $(".mailContent").html("<p> No data available");

                }
            }

        });
    });


//    ready ends
});


