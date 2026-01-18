<script> $(document).ready(function () {
        $("#sponsor").val("");
        $('#parent').val('');
        $('#other_parts').css('display', 'none');/* ($("#sponsor").val()); */

        $("#sponsor").typeWatch({
            wait: 750, /* 750ms */ highlight: true, callback: function (value) {
                var sponsor = $('#sponsor').val();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                $.ajax({
                    type: 'GET',
                    url: "{!!URL::route('checkSponsorship')!!}",
                    dataType: 'json',
                    data: {refId: sponsor},
                    success: function (data) {
                        if (data.validity == 'invalid') {

                            $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");
                            $('#other_parts').hide(500);

                        } else {
                            $("#sponsor_result").html("<span class='invalid-success " +

                                "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                "</span>");
                            $('#other_parts').show(500);

                        }
                    }
                });
            }
        });


        var username = $('#username').val();
        if (username != "") {
            var username = $('#username').val();
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
                type: 'GET',
                url: "{!!URL::route('checkUsernameAvailability')!!}",
                dataType: 'json',
                data: {username: username},
                success: function (data) {/*                        var result = json. */
                    if (data.availability == 'unavailable') {
                        $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");
                    } else {
                        $("#username_result").html("<span class='invalid-success " + "success text-success color-green'> " + "Username Available" + "</span>");
                    }
                }
            });
        }


        $("#parent").typeWatch({
            wait: 750, /* 750ms */ highlight: true, callback: function (value) {
                var parent = $('#parent').val();
                // alert(parent)
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                $.ajax({
                    type: 'GET',
                    url: "{!!URL::route('check_parent')!!}",
                    dataType: 'json',
                    data: {refId: parent},
                    success: function (data) {
                        if (data.validity == 'invalid') {

                            $("#parent_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Parent Username</span>");
                            $('#other_parts').hide(500);

                        } else {
                            if (data.position == 0) {
                                $("#parent_result").html("<span class='invalid-success " +

                                    "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                    "</span>");
                                $('#position').val(0);
                                $('#other_parts').show(500);

                            } else if (data.position == 1) {
                                $("#parent_result").html("<span class='invalid-success " +

                                    "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                    "</span>");
                                $('#position').val(1);
                                $('#other_parts').show(500);

                            } else {
                                $("#parent_result").html("<span class='invalid-input " +

                                    "danger text-danger color-red'> Parent can not refer mre than 2 persons" +

                                    "</span>");
                                $('#other_parts').hide(500);
                            }

                        }
                    }
                });
            }
        });

        var username = $('#username').val();
        if (username != "") {
            var username = $('#username').val();
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
                type: 'GET',
                url: "{!!URL::route('checkUsernameAvailability')!!}",
                dataType: 'json',
                data: {username: username},
                success: function (data) {/*                        var result = json. */
                    if (data.availability == 'unavailable') {
                        $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");
                    } else $("#username_result").html("<span class='invalid-success " + "success text-success color-green'> " + "Username Available" + "</span>");
                }
            });
        }


        /*USERNAME CHECK*/
        $('#username').keypress(function (e) {
            if (!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which))) return false
        });
        $('#username').on('keyup', function () {
            if ($('#username').val() != "" && $('#username').val().length >= 4) {
                function timer() {
                    var username = $('#username').val();
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                    $.ajax({
                        type: 'GET',
                        url: "{!!URL::route('checkUsernameAvailability')!!}",
                        dataType: 'json',
                        data: {username: username},
                        success: function (data) {/*                        var result = json. */
                            if (data.availability == 'unavailable') {
                                $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");
                            } else $("#username_result").html("<span class='invalid-success " + "success text-success color-green'> " + "Username Available" + "</span>");
                        }
                    });/*                $('#yourname').text(name); */
                }
            } else $("#username_result").html("<span class='invalid-input danger text-danger color-red'> INVALID username! Minimum is 4</span>");
            setTimeout(timer, 2000);
        });/*        document.ready */
    })
    ;
</script>