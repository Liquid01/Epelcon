@extends('layouts.web')

@section('content')
    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Compensation</h2>
                        <ul>
                            <li><a href="{{route('homepage')}}">Home</a></li>
                            <li><span>Compensation</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->

    <!-- wpo-mission-area start -->
    <div class="wpo-mission-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <span>Earnings</span>
                        <h2>Four (4) Ways to Earn.</h2>
                    </div>
                </div>
            </div>
            <div class="wpo-mission-wrap">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 custom-grid">
                        <div class="wpo-mission-item">
                            <div class="wpo-mission-icon">
                                <i class="fi flaticon-water"></i>
                            </div>
                            <div class="wpo-mission-content">
                                <h2>Retail Profit</h2>
                                <p>About 21% earned from each bottle of<strong style="color:orangered;"> Herbalyn
                                        Cleanser</strong>
                                    <strong style="color:purple">LifePro - Corrective Capsules</strong>, and the
                                    enhanced
                                    <strong style="color:darkgreen"> Harmony Tea</strong>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 custom-grid">
                        <div class="wpo-mission-item">
                            <div class="wpo-mission-icon-2">
                                <i class="fi glyphicon glyphicon-share-alt"></i>
                            </div>
                            <div class="wpo-mission-content">
                                <h2>Sponsor Bonus</h2>
                                <p>
                                    32% Cash Bonus earned when you refer/sponsor someone to buy <strong
                                            style="color:orangered;">Herbalyn Cleanser</strong>
                                    <strong style="color:purple">LifePro - Corrective Capsules</strong>, and the
                                    enhanced
                                    <strong style="color:darkgreen"> Harmony Tea</strong> or join EPELCON Global
                                    Healthcare Services as a distributor, investor or buyer.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 custom-grid">
                        <div class="wpo-mission-item">
                            <div class="wpo-mission-icon-3">
                                <i class="fi glyphicon glyphicon-move"></i>
                            </div>
                            <div class="wpo-mission-content">
                                <h2>Matching Bonus</h2>
                                <p>Monies earned when your accumulated PVs match from left to right every month as they
                                    accrue for 31 days from sales and members' onboardings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 custom-grid">
                        <div class="wpo-mission-item">
                            <div class="wpo-mission-icon-4">
                                <i class="fi glyphicon glyphicon-arrow-up"></i>
                            </div>
                            <div class="wpo-mission-content">
                                <h2>Rank Advancement Bonus</h2>
                                <p>Earned when you move from one rank to the other on the Ranking Ladder. Cash, Gadgets, Holidays Abroad, Travels etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-mission-area end -->

    <!-- wpo-case-area start -->
    <div class="wpo-case-area-2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <span>Onboarding</span>
                        <h2>Packages and Benefits</h2>
                    </div>
                </div>
            </div>
            <div class="wpo-case-wrap">
                <div class="row">
                    @foreach(\App\Package::all() as $package)
                        <div class="col-md-4 col-sm-6 custom-grid col-12">
                            <div class="wpo-case-item">
                                <div class="wpo-case-img">
                                    {{-- <img src="{{asset('assets/images/compensation/'.$package->id.'.png')}}" alt=""> --}}
                                </div>
                                <div class="wpo-case-content">
                                    <div class="wpo-case-text-top">
                                        <h2>{{$package->name}}</h2>
                                        <h5>NGN{{number_format($package->amount)}} ({{$package->bottles}} Bottle)</h5>
                                        <div class="progress-section">
                                            <h5>Matching Bonus</h5>
                                            <div class="process">
                                                <div class="progress">
                                                    <div class="progress-bar">
                                                        <div class="progress-value">
                                                            <span>{{$package->matching_bonus}}</span>%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Sponsor/Referer Bonus
                                            &#x20a6; {{number_format($package->amount * (config('app.referral_percent'))/100)}}
                                            ;</h5>
                                    </div>
                                    <div class="case-btn">
                                        <ul>
                                            <li><a href="{{route('register')}}?package={{$package->id}}">Join Now</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-case-area end -->

    <!-- wpo-case-area start -->
    <div class="wpo-case-area-2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <span>Onboarding</span>
                        <h2>Rank Bonus</h2>
                    </div>
                </div>
            </div>
            <div class="wpo-case-wrap">
                <div class="row">
                    @foreach(\App\Rank::all() as $rank)
                        <div class="col-md-4 col-sm-6 custom-grid col-12">
                            <div class="wpo-case-item">
                                <div class="wpo-case-img">
                                    <img src="{{asset('assets/images/compensation/'.$rank->id.' ')}}" alt="">
                                </div>
                                <div class="wpo-case-content">
                                    <div class="wpo-case-text-top">
                                        <h2>{{$rank->name}}</h2>
                                        <h5>PVS:- {{number_format($rank->total_pvs)}}</h5>
                                        {{--                                    <div class="progress-section">--}}
                                        {{--                                        <h5>Matching Bonus</h5>--}}
                                        {{--                                        <div class="process">--}}
                                        {{--                                            <div class="progress">--}}
                                        {{--                                                <div class="progress-bar">--}}
                                        {{--                                                    <div class="progress-value">--}}
                                        {{--                                                        <span>{{$package->matching_bonus}}</span>%--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        <h5>Bonus &#x20a6; {{number_format($rank->bonus)}}</h5>
                                        <h5>{{$rank->incentive}}</h5>
                                    </div>
                                    <div class="case-btn">
                                        <ul>
                                            <li><a href="{{route('register')}}?rank={{$rank->id}}">Join Now</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-case-area end -->
@endsection
