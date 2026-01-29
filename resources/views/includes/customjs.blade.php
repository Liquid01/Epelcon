<script>
    $(document).ready(function () {

        // ======= PROFILE / ACCOUNT / SECURITY EDIT BUTTONS =======
        $(".profile_update_form input").prop("disabled", true);
        $(".account_update_form input, .account_update_form select").prop("disabled", true);
        $(".security_update_form input").prop("disabled", true);
        $(".profile_update_button, .account_update_button, .security_update_button").hide();

        $(".edit_profile").click(function () {
            $(".profile_update_form input").prop("disabled", false);
            $("#username,#password").prop("disabled", true);
            $(".profile_update_button").show();
        });

        $(".edit_account").click(function () {
            $(".account_update_form input, .account_update_form select").prop("disabled", false);
            $("#username,#password").prop("disabled", true);
            $(".account_update_button").show();
        });

        $(".edit_security").click(function () {
            $(".security_update_form input").prop("disabled", false);
            $("#username,#password").prop("disabled", true);
            $(".security_update_button").show();
        });

        // ======= CROPPiE PROFILE PICTURE UPLOAD =======
        let croppieInstance = null;
        $(".edit_profile_pix").on("click", () => $("#profile_pix_input").click());

        $("#profile_pix_input").on('change', function () {
            const file = this.files[0];
            if (!file) return;

            $('.profile_img').hide();
            $('.profile-demo').show();

            if (croppieInstance) {
                try {
                    $('.profile-demo').croppie('destroy');
                } catch (e) {
                }
                croppieInstance = null;
            }

            croppieInstance = $('.profile-demo').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: {width: 200, height: 200, type: 'circle'},
                boundary: {width: 300, height: 300}
            });

            const reader = new FileReader();
            reader.onload = e => {
                croppieInstance.croppie('bind', {url: e.target.result})
                    .then(() => console.log('Croppie bind complete'));
            };
            reader.readAsDataURL(file);

            $("#upload_profile_pix").show();
        });

        $('#upload_profile_pix').on('click', function () {
            if (!croppieInstance) return;

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('.profile-demo').LoadingOverlay("show");
            croppieInstance.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $.post("update-profile-pix", {image: img})
                    .done(function (res) {
                        $('.profile-demo').LoadingOverlay("hide", true).hide();
                        $('.profile_img').attr('src', res.thumb_url ? res.thumb_url + '?t=' + Date.now() : img).show();
                        $("#upload_profile_pix").hide();
                    })
                    .fail(() => {
                        $('.profile-demo').LoadingOverlay("hide", true);
                        alert('Upload failed');
                    });
            });
        });

        // ======= DASHBOARD DATA LOADS =======
        @if(auth()->check())
        // Stage / Level / Downline / PVs
        // $("#stage,#level").LoadingOverlay("show");
        $("#stage").html('1');
        {{--$.get("{!! auth()->user()->stage == 0 ? route('check_feeder_matrix') : route('check_stage_matrix') !!}", function (data) {--}}
        {{--    if (data) {--}}
        {{--        $("#stage").html(data.stage);--}}
        {{--        $("#level").html(data.level);--}}
        {{--    }--}}
        {{--    $("#stage,#level").LoadingOverlay("hide", true);--}}
        {{--}, 'json');--}}

        $("#downline_count").LoadingOverlay("show");
        $.get("{!! route('get_downline_count') !!}", function (data) {
            if (data) {
                $("#downline_count").html(data.count);
            }
            $("#downline_count").LoadingOverlay("hide", true);
        }, 'json');

        $("#left_pvs,#right_pvs,#points,#total_pvs").LoadingOverlay("show");
        $.get("{!! route('member_get_pvs', auth()->id()) !!}", function (data) {
            if (data) {
                $("#left_pvs").html(data.left).LoadingOverlay("hide", true);
                $("#right_pvs").html(data.right).LoadingOverlay("hide", true);
                $("#points").html(parseInt(data.points)).LoadingOverlay("hide", true);
                $("#total_pvs").html(parseInt(data.total_pvs)).LoadingOverlay("hide", true);
                get_matching_bonus(data.left, data.right);
                get_member_rank(data.left, data.right);
            }
        }, 'json');

        function get_matching_bonus(left_pvs, right_pvs) {
            $("#matching_bonus").LoadingOverlay("show");
            $.post("{!! route('member_matching_bonus')!!}", {
                _token: $('meta[name="csrf-token"]').attr('content'),
                left_pvs, right_pvs
            }, function (data) {
                if (data) {
                    $("#matching_bonus").html(data.amount);
                    $(".matched").html(data.matched);
                    $(".this_matching").html(data.this_match);
                }
                $("#matching_bonus").LoadingOverlay("hide", true);
            }, 'json');
        }

        function get_member_rank(left_pvs, right_pvs) {
            $("#current_rank").LoadingOverlay("show");
            $.post("{!! route('get_member_rank')!!}", {
                _token: $('meta[name="csrf-token"]').attr('content'),
                left_pvs, right_pvs
            }, function (data) {
                $("#current_rank").html(data?.name || 0).LoadingOverlay("hide", true);
            }, 'json');
        }
        @endif

        // ======= REFERRAL LINK COPY =======
        $('.copyRefLink').click(function () {
            const temp = $("<input>");
            $("body").append(temp);
            temp.val($(".reflink").text()).select();
            document.execCommand('copy');
            temp.remove();
            alert("Referral Link Copied");
        });

        // ======= TRANSFER PANELS =======
        $(".to-panel").hide();
        hide_others();
        hide_other_forms();
        $('input:radio[name="from"],input:radio[name="to"]').prop("checked", false);

        $('input:radio[name="from"]').on('change', function () {
            if (this.checked) {
                $(".to-panel").show();
                show_others();
                $("#" + $(this).attr("data-target")).hide();
            }
        });

        $('input:radio[name="to"]').on('change', function () {
            hide_other_forms();
            $("#" + $(this).attr("data-form")).show("slow");
        });

        function hide_other_forms() {
            $("#shop_form,#other_account_form,#investment_form,#cash_form").hide("fast");
        }

        function hide_others() {
            $(".to-shop,.to-investment,.to-another-account").hide();
        }

        function show_others() {
            $("#to_shop,#to_cash,#to_investment,#to_another-account").show();
        }

        // ======= CART HANDLERS =======
        $(".add_to_cart").on('click', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            const qty = $("#" + $(this).attr('data-qty')).val();
            const p_name = $(this).data('name');

            $.post("{!! route('addToCart') !!}", {
                productId: $(this).data('added'),
                quantity: qty,
                price: $(this).data('price'),
                name: p_name,
                image: $(this).data('image')
            }, function (data) {
                if (data) {
                    $("#cartmenu").html(data);
                    $("#shopping_cart").html($(".cartcount").html());
                    swal({
                        title: qty + " " + p_name + " Added to Cart Successfuly",
                        timer: 4000,
                        buttons: true,
                        icon: 'success'
                    });
                    // window.location.replace("{!! route('checkout') !!}");
                }
            }, 'html');
        });

        $("#clearCart").on('click', function () {
            swal({title: "Are you sure?", icon: 'warning', dangerMode: true, buttons: {cancel: 'No', delete: 'Yes'}})
                .then(function (will) {
                    if (will) {
                        $.post("shop/cart/clear", {}, function (data) {
                            $("#cartmenu").html(data);
                            $("#shopping_cart").html(0);
                        }, 'html');
                        swal("Cart Cleared", {icon: "success"});
                    }
                });
        });

        $("body").on('click', ".remove-btn", function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            const id = $(this).data('id');
            swal({
                title: "Remove item?",
                icon: 'warning',
                dangerMode: true,
                buttons: {cancel: 'No', delete: 'Yes'}
            }).then(function (will) {
                if (will) {
                    $.post("{!! route('member_remove_item') !!}", {id: id}, function (data) {
                        $("#cartmenu").html(data);
                        $("#shopping_cart").html($(".cartcount").html());
                        swal("Item removed", {icon: "success"});
                    }, 'html');
                }
            });
        });

        // ======= TOP‑UP & DATA TOP‑UP CONFIRM HANDLERS =======
        $('#confirm_topup').click(function () {
            return confirm('Are you sure you want to proceed with this top‑up?');
        });

        $('#confirm_data_topup').click(function () {
            return confirm('Are you sure you want to proceed with this data top‑up?');
        });

        // ======= DELIVERY OPTION CHANGE =======
        $('#delivery_option').change(function () {
            const option = $(this).val();
            $('.delivery_option_panel').hide();
            $(`#${option}_panel`).show();
        });

    }); // end document.ready
</script>
