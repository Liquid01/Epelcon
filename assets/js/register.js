$(document).ready(function () {
    let otherpart = $('#other_parts');
    let sponsor = $("#sponsor").val();
    otherpart.css('display', 'none');

    if(sponsor != "")
    {
        otherpart.show();
    }

    if (sponsor != "") {

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        });


        $.ajax({

            type: 'GET',

            url: "{!!URL::route('checkSponsorship')!!}",

            dataType: 'json',

            data: {refId: sponsor},

            success: function (data) {

//                        var result = json.

//alert(data);

                if (data.validity == 'invalid') {

                    $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");

                } else {

                    $("#sponsor_result").html("<span class='invalid-success " +

                        "success text-success color-green'> " + data.firstname + " " + data.lastname +

                        "</span>");

                }


            }

        });

    }


    sponsor.on('keyup change input', function () {


        // alert('hi');


        function timer() {


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }

            });


            $(this).LoadingOverlay('show');


            $.ajax({

                type: 'GET',

                url: "{!!URL::route('checkSponsorship')!!}",

                dataType: 'json',

                data: {refId: sponsor},

                success: function (data) {

//                        var result = json.

//alert(data);

                    if (data.validity == 'invalid') {

                        $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");
                        $('#other_parts').hide(500);

                    } else {

                        if (data.position == 0) {
                            $("#sponsor_result").html("<span class='invalid-success " +

                                "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                "</span>");
                            $('#position').val(0);
                            $('#other_parts').show(500);

                        } else if (data.position == 1) {
                            $("#sponsor_result").html("<span class='invalid-success " +

                                "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                "</span>");
                            $('#position').val(1);
                            $('#other_parts').show(500);

                        } else {
                            $("#sponsor_result").html(data.position);
                            $('#position').val(null);
                            $('#other_parts').hide(500);
                        }

                    }


                }

            });


//                $('#yourname').text(name);

        }


        //setTimeout(myFunc,5000);

        setTimeout(timer, 2000);


    });


    if ($("#parent").val() != "") {

        var parent = $('#parent').val();


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        });


        $.ajax({

            type: 'GET',

            url: "{!!URL::route('checkSponsorship')!!}",

            dataType: 'json',

            data: {refId: parent},

            success: function (data) {

//                        var result = json.


                if (data.validity == 'invalid') {

                    $("#parent_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Parent Username</span>");

                } else {

                    $("#parent_result").html("<span class='invalid-success " +

                        "success text-success color-green'> " + data.firstname + " " + data.lastname +

                        "</span>");

                }


            }

        });

    }


    var username = $('#username').val();


    if (username != "") {

        var username = $('#username').val();


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        });


        $.ajax({

            type: 'GET',

            url: "{!!URL::route('checkUsernameAvailability')!!}",

            dataType: 'json',

            data: {username: username},

            success: function (data) {

//                        var result = json.


                if (data.availability == 'unavailable') {

                    $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");

                } else {

                    $("#username_result").html("<span class='invalid-success " +

                        "success text-success color-green'> " + "Username Available" +

                        "</span>");

                }


            }

        });

    }

    //USERNAME CHECK
    $('#username').on('keyup', function () {


        if ($('#username').val() != "" && $('#username').val().length >= 4) {

            function timer() {

                var username = $('#username').val();


                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                    }

                });


                $.ajax({

                    type: 'GET',

                    url: "{!!URL::route('checkUsernameAvailability')!!}",

                    dataType: 'json',

                    data: {username: username},

                    success: function (data) {

//                        var result = json.


                        if (data.availability == 'unavailable') {

                            $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");

                        } else {

                            $("#username_result").html("<span class='invalid-success " +

                                "success text-success color-green'> " + "Username Available" +

                                "</span>");

                        }


                    }

                });


//                $('#yourname').text(name);

            }

        } else {

            $("#username_result").html("<span class='invalid-input danger text-danger color-red'> INVALID username! Minimum is 4</span>");

        }


        setTimeout(timer, 2000);


    });


//        $.getJSON('/functions.php', {get_param: 'value'}, function (data) {

//            $.each(data, function (index, element) {

//                $('body').append($('<div>', {

//                    text: element.name

//                }));

//            });

//        });

//        document.ready


    $("#donate_button").click(function () {

//            alert('yeah');

        $("#pay_option").slideToggle("slow");

    });


    $("#buy_button").click(function () {

//            alert('yeah');

        $("#buy_option").slideToggle("slow");

    });


    $("#pay_in_bank").click(function () {

        $("#bank_account").slideToggle("slow");

    });


    $("#buy_in_bank").click(function () {

        $("#bank_account").slideToggle("slow");

    });

});
