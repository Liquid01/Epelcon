$(document).ready(function () {
// alert('hi');
    $(".edit_profile_pix").on("click", function () {
        $("#profile_pix_input").click();
    });

    var global_resize;

    $("#profile_pix_input").on('change', function () {

        $('.profile_img').hide();
        $('.profile-demo').show();


        var resize = $('.profile-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 200,
                height: 200,
                type: 'circle' //square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        global_resize = resize;

        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie('bind',{
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);


        // readProfilePixURL(this);
        // $("#profile_pix_input").css('visibility', 'visible');
        $("#upload_profile_pix").show();

    });



    $('#upload_profile_pix').on('click', function (ev) {
        let full_image = $("#profile_pix_input").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('.profile-demo').LoadingOverlay("show");
        global_resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            $.ajax({
                url: "update-profile-pix",
                type: "POST",
                data: {"image":img, "full_image":full_image},
                success: function (data) {
                    $('.profile-demo').LoadingOverlay("hide", true);
                    $('.profile-demo').hide();
                    $('.profile_img').show();
                    $('.profile_img').attr('src', img);
                    $("#upload_profile_pix").hide();
                }
            });
        });
    });


    $("#topup_form").submit(function () {

        var msisdn = $("#msisdn").val();
        var topup_amount  = $("#topup_amount").val();

        var dconfirm = confirm('are you sure you want to Recharge ' + msisdn + ' with ' + topup_amount + ' ?');

        if(!dconfirm)
        {
            return false;
        }

    });


    $("#data_topup_form").submit(function () {

        var msisdn = $("#msisdn").val();
        var data_topup_amount  = $("#data_topup_amount").val();

        var dconfirm = confirm('You are Subscribing ' + msisdn + ' with ' + data_topup_amount + ' ?');

        if(!dconfirm)
        {
            return false;
        }

    });

// alert('hi');

});




