@extends('menufacturers.layouts.app')

@section('title')
    Welcome To {{ $appname }}
@endsection

@section('content')
    <!-- // main webpage content is here  -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <h2 class="centered_text">Welcome back to {{ $appname }} </h2>

                        <div class="portal_line">
                            <h3 class="headline_text">
                                Get started with {{ $appname }}
                            </h3>

                            @forelse ($data as $resources)
                                <div class="item_grid_4">


                                    <div class="item_grid">
                                        <div class="item_img_holder">
                                            <img src="{{ asset('vendor/assets/images/training.png') }}" alt=""
                                                class="item_img">
                                        </div>
                                        <p class="item_title">Training Module</p>
                                        <p class="item_desc">Learn how to use the Partner Portal to find
                                            customers and...</p>
                                        <center>
                                            <a href="{{ $resources->traning_module }}" class="continue_btn">Continue
                                                Reading</a>
                                        </center>
                                    </div>

                                    <div class="item_grid">
                                        <div class="item_img_holder">
                                            <img src="{{ asset('vendor/assets/images/bill.png') }}" alt=""
                                                class="item_img">
                                        </div>
                                        <p class="item_title">Invoicing & Fulfillment</p>
                                        <p class="item_desc">Learn how to properly invoice and fulfill
                                            Creator
                                            orders.</p>
                                        <center>
                                            <a href="{{ $resources->invoicing_fullfilment }}" class="continue_btn">Continue
                                                Reading</a>
                                        </center>
                                    </div>

                                    <div class="item_grid">
                                        <div class="item_img_holder">
                                            <img src="{{ asset('vendor/assets/images/guide.png') }}" alt=""
                                                class="item_img">
                                        </div>
                                        <p class="item_title">Receiving Guidelines</p>
                                        <p class="item_desc">Review how to ship products to {{ $appname }}'s
                                            Fulfillment Center...</p>
                                        <center>
                                            <a href="{{ $resources->receiving_guidelines }}" class="continue_btn">Continue
                                                Reading</a>
                                        </center>
                                    </div>

                                    <div class="item_grid">
                                        <div class="item_img_holder">
                                            <img src="{{ asset('vendor/assets/images/profile_avatar_man.png') }}"
                                                alt="" class="item_img">
                                        </div>
                                        <p class="item_title">Set Up Business Profile</p>
                                        <p class="item_desc">Describe your business and its private label
                                            and...
                                        </p>
                                        <center>
                                            <a href="{{ $resources->setup_business_profile }}"
                                                class="continue_btn">Continue Reading</a>
                                        </center>
                                    </div>

                                    <div class="item_grid">
                                        <div class="item_img_holder">
                                            <img src="{{ asset('vendor/assets/images/request-payment.png') }}"
                                                alt="" class="item_img">
                                        </div>
                                        <p class="item_title">Set Up Direct Deposit</p>
                                        <p class="item_desc">Allow Creators to send you money for each
                                            order...
                                        </p>
                                        <center>
                                            <a href="{{ $resources->orders_shipments }}" class="continue_btn">Continue
                                                Reading</a>
                                        </center>
                                    </div>



                                </div>

                            @empty
                            @endforelse
                        </div>



                        <div class="portal_line">
                            <h3 class="headline_text">
                                Keeping Up With Customers
                            </h3>

                            <div class="item_grid_4">


                                <div class="item_grid">
                                    <div class="item_img_holder">
                                        <img src="{{ asset('vendor/assets/images/messages.png') }}" alt=""
                                            class="item_img">
                                    </div>
                                    <p class="item_title">Your Customer Messages</p>
                                    <p class="item_desc">Reply Customers Soon...</p>
                                    <center>
                                        <a href="https://web.whatsapp.com/" class="continue_btn">Continue</a>
                                    </center>
                                </div>

                                <div class="item_grid">
                                    <div class="item_img_holder">
                                        <img src="{{ asset('vendor/assets/images/orders.png') }}" alt=""
                                            class="item_img">
                                    </div>
                                    <p class="item_title">Orders & Shipments</p>
                                    <p class="item_desc">Track Your Orders</p>
                                    <center>
                                        <a href="/menufacturer/Orders-&-Shipments" class="continue_btn">Continue</a>
                                    </center>
                                </div>

                            </div>
                        </div>


                        <div class="portal_line">
                            <h3 class="headline_text">
                                Find New Customers
                            </h3>

                            <div class="item_grid_4">


                                <div class="item_grid">
                                    <div class="item_img_holder">
                                        <img src="{{ asset('vendor/assets/images/links.png') }}" alt=""
                                            class="item_img">
                                    </div>
                                    <p class="item_title">share Profile To Influencer</p>
                                    <br>
                                    <center>
                                        <button class="continue_btn copy_link"
                                            onclick="copy_link(this)" data-link="{{ url('/') }}/see-vendor-profile/menufacturer/{{ $loggerUniqueId }}">
                                            Copy Link
                                        </button>
                                    </center>
                                </div>

                                <div class="item_grid">
                                    <div class="item_img_holder">
                                        <img src="{{ asset('vendor/assets/images/links.png') }}" alt=""
                                            class="item_img">
                                    </div>
                                    <p class="item_title">Share Profile To Enterprenuer</p>
                                    <br>
                                    <center>
                                        <button class="continue_btn copy_link"
                                            onclick="copy_link(this)" data-link="{{ url('/') }}/entrepreneur/see-vendor-profile/menufacturer/{{ $loggerUniqueId }}">
                                            Copy Link
                                        </button>
                                    </center>
                                </div>

                            </div>
                        </div>


                        <div class="portal_line">
                            <h3 class="headline_text">
                                How To Videos - {{ $appname }}
                            </h3>

                            <div class="item_grid_4">


                                @forelse ($edu_rsrc as $edu_last_rsrcs)
                                    <div class="item_grid video_grid">
                                        <div class="video_holder">
                                            {!! $edu_last_rsrcs->resource_code !!}
                                        </div>
                                        <p class="item_title">Welcome to the {{ $appname }} Partner Portal (pt. 1)
                                        </p>
                                        <p class="item_desc">Learn about the modules and functions of the
                                            {{ $appname }} Partner Portal.</p>
                                        <center>
                                            <button class="continue_btn" onclick="watchIt(this)"
                                                data-id="1">Watch</button>
                                        </center>
                                    </div>
                                @empty
                                @endforelse


                                <div class="total_center">
                                    <a href="/2" class="centered_watch_text">View All</a>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>

                <div id="styleSelector">

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".home").addClass("active");
    </script>
@endsection
