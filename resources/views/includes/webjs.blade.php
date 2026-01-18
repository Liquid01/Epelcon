<script>
    $(".package").on('click', function () {
        let package_id = $(this).attr('id');
        let package_amount = $(this).attr('data-amount');
        let package_name = $(this).attr('data-name');
        let bottles = $(this).attr('data-bottles');

        $("#package_wrapper").hide();

        $("#reg_wrapper").show(500);
        $("#package_price").html(package_name + ': ' + '&#x20a6;' + parseFloat(package_amount).toFixed(2));
        $("#package_price").append('<br>' + '<small>' + bottles + ' Bottles</small>')
        $("#package_id").val(package_id);

        // alert($("#package_id").val());

    });

    $("#reg_back").click(function () {
        $("#package_wrapper").show(500);
        $("#reg_wrapper").hide(500);
    });

    $("#serial").typeWatch({
        wait: 750, // 750ms
        highlight: true,
        captureLength: 10,
        callback: function (value) {
            let serial = $("#serial").val();
            let package_id = $("#package_id").val();

            if (serial != "") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                // $("#serial").LoadingOverlay('show');

                // alert('serial');

                $.ajax({
                    url: "{!! route('check_serial') !!}",
                    type: "GET",
                    dataType: 'json',
                    data: {serial: serial, package_id:package_id},
                    success: function (data) {
                        if (data.result == 'invalid') {
                            $("#serial_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Serial</span>");
                        } else if (data.result == 'used') {
                            $("#serial_result").html("<span class='invalid-success " +
                                "success text-success color-danger'> " + "PIN USED" +
                                "</span>");
                        } else if (data.result == 'wrong') {
                            $("#serial_result").html("<span class='invalid-success " +
                                "success text-success color-danger'> " + "Wrong Serial" +
                                "</span>");
                        } else {
                            $("#serial_result").html("<span class='invalid-success " +
                                "success text-success color-green'> " + "Correct" +
                                "</span>");
                        }
                        // $("#serial").LoadingOverlay('hide, true');
                    }
                })
            }

        }

    });

    $("#pincode").typeWatch({
        wait: 750, // 750ms
        highlight: true,
        captureLength: 10,
        callback: function (value) {

            let code = $("#pincode").val();
            let package_id = $("#package_id").val();

            if (code != "") {
                // alert(serial);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                // $(this).LoadingOverlay('show');

                $.ajax({
                    url: "{!! route('check_code') !!}",
                    type: "GET",
                    dataType: 'json',
                    data: {code: code, package_id:package_id},
                    success: function (data) {
                        if (data.result == 'invalid') {
                            $("#code_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Code</span>");
                        } else if (data.result == 'used') {
                            $("#code_result").html("<span class='invalid-success " +
                                "success text-success color-danger'> " + "PIN USED" +
                                "</span>");
                        } else if (data.result == 'wrong') {
                            $("#code_result").html("<span class='invalid-success " +
                                "success text-success color-danger'> " + "Wrong Pin" +
                                "</span>");
                        } else {
                            $("#code_result").html("<span class='invalid-success " +
                                "success text-success color-green'> " + "Correct" +
                                "</span>");
                        }
                        // $(this).LoadingOverlay('hide', true);
                    }
                })
            }

        }
    });

    $(".show_pass").on('click', function () {
        let pass_field_status = $(".type_toggle").attr('type');
        //check status of password field

        if (pass_field_status === 'password') {
            $(".type_toggle").attr('type', 'text');
            $(this).attr('class', 'fa fa-eye-slash')


        } else if (pass_field_status === 'text') {
            $(".type_toggle").attr('type', 'password');
            $(this).attr('class', 'fa fa-eye');
        }
    });

</script>
