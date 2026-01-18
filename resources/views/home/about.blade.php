<!-- wpo-about-area start -->
<style>

    element {

        transform: matrix3d(0, 1, 0, 0, -1, 0, 0, 0, 0, 0, 1, 0, -21.0817, 0, 0, 1);

    }

    .featured-projects .bg-shape {

        bottom: -10%;
        left: -10%;
        transform: rotate(90deg);

    }

    .shape-project {

        left: -20%;

    }

    .bg-shape {

        position: absolute;
        /*z-index: -1;*/
        opacity: 0.9;
        max-width: 100% !important;

    }
</style>
<svg class="bg-shape shape-about reveal-from-right" xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink"
     width="779px" height="759px" style=" position: absolute;">
    <defs>
        <linearGradient id="PSgrad_02" x1="70.711%" x2="0%" y1="70.711%" y2="0%">
            <stop offset="0%" stop-color="rgb(237,247,255)" stop-opacity="1"/>
            <stop offset="100%" stop-color="rgb(237,247,255)" stop-opacity="0"/>
        </linearGradient>

    </defs>
    <path fill-rule="evenodd" fill="url(#PSgrad_02)"
          d="M111.652,578.171 L218.141,672.919 C355.910,795.500 568.207,784.561 692.320,648.484 C816.434,512.409 805.362,302.726 667.592,180.144 L561.104,85.396 C423.334,-37.184 211.037,-26.245 86.924,109.832 C-37.189,245.908 -26.118,455.590 111.652,578.171 Z"
    />
</svg>
<div class="wpo-about-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 colsm-12">
                <div class="wpo-about-text">
                    <div class="wpo-section-title" style="margin-bottom:20px;">
                        <h2>Our Mission</h2>
                        <span>Taking Back Our Health & Building Our Future, Together!</span>
                    </div>
                    <p>
                        Taking Back Our Health & Building Our Future, Together!
                        Our mission is simple: to put your health first and empower you to create a brighter financial
                        future. We're actively campaigning against the burden of poor healthcare in our communities by
                        offering effective, natural alternatives like <strong style="color:orangered;">Herbalyn Cleanser</strong>
                        <strong style="color:purple">LifePro - Corrective Capsules</strong>, and the enhanced
                        <strong style="color:darkgreen"> Harmony Tea</strong>. Simultaneously,
                        we're committed to providing a platform where you can earn a sustainable
                        income through our rewarding compensation plan. Join us in this movement to build a healthier
                        and wealthier Africa!

                    </p>
                    <div class="wpo-section-title" style="margin-bottom:20px;">
                        <h2>Our Vision</h2>
                        <span>A Healthier, Wealthier World for All!</span>
                    </div>
                    <p>
                        We envision a vibrant World where everyone has access to the resources they need for optimal
                        health and financial well-being, supported by the power of <strong style="color:orangered;">Herbalyn Cleanser</strong>
                        <strong style="color:purple">LifePro - Corrective Capsules</strong>, and the enhanced
                        <strong style="color:darkgreen"> Harmony Tea</strong>. We
                        aspire to be the leading name in natural health solutions and wealth creation within our nation,
                        known for our quality products, ethical practices, and the positive impact we have on the lives
                        of our members right here in our World.

                    </p>
                    <div class="btns">
                        <a href="{{route('about')}}" class="theme-btn">Know More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 colsm-12">
                <div class="wpo-about-img">
                    <img src="{{asset('assets/images/about3.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wpo-about-area end -->
