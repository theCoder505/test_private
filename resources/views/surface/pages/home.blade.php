@extends('surface.layouts.app')

@section('title')
    Welcome To {{ $appname }}
@endsection


@section('content')

    @forelse ($homepageData as $item)
        <style>
            @keyframes changeImage {
                0% {
                    background-image: url("{{ $item->slider1 }}");
                }

                12.5% {
                    background-image: url("{{ $item->slider1 }}");
                }

                25% {
                    background-image: url("{{ $item->slider2 }}");
                }

                37.5% {
                    background-image: url("{{ $item->slider3 }}");
                }

                50% {
                    background-image: url("{{ $item->slider4 }}");
                }

                67.5% {
                    background-image: url("{{ $item->slider5 }}");
                }

                75% {
                    background-image: url("{{ $item->slider6 }}");
                }

                87.5% {
                    background-image: url("{{ $item->slider7 }}");
                }

                100% {
                    background-image: url("{{ $item->slider8 }}");
                }
            }
        </style>





        <section class="welcome_slider">
            <div class="row">
                <div class="holder col-md-7">
                    <div class="allItems">
                        <h1 class="startText">
                            Everything you need are here
                        </h1>
                        <p class="startSmallPara">
                            Get help with sourcing, order fulfillment, and eCommerce.
                        </p>
                        <button class="createNew" onclick="showSignUp()">Create A Free Account</button>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img_lines">
                        <div class="slider_img_line" style="background-image: url('{{ $item->slider1 }}');"> </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="interpreneur_slider">


            <div class="helpingText">
                <img src="/surface/assets/images/stars.png" alt="" class="starsicons">
                Helping your favorite entrepreneurs turn their passion into successful businesses.
                <img src="/surface/assets/images/stars.png" alt="" class="starsicons">
            </div>


            <div id="interpreneur">

                @forelse ($enterprenuer_profiles as $profile)
                    <div class="interpreneur_tab" style="background-image: url('{{ $profile->company_logo }}');">
                        <div class="interpreneur_details">
                            <p class="details">{{ $profile->comp_bio }}</p>
                            <p class="name">{{ $profile->business_name }}</p>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

        </section>



        <section class="next_gen">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $item->left_img_file }}" alt="" class="w-100 leftrightimg">
                </div>

                <div class="col-md-6">
                    <h1 class="next_gen_capital_text">{{ $item->sec2_title }}</h1>

                    <p class="next_gen_norm">
                        {{ $item->sec2_text }}
                    </p>

                    <center>
                        <button class="startFreeBtn" onclick="showSignUp()">Start For Free</button>
                    </center>
                </div>

                <div class="col-md-3">
                    <img src="{{ $item->right_img_file }}" alt="" class="w-100 leftrightimg">
                </div>
            </div>
        </section>



        <section class="section_sourcing">
            <h1 class="next_gen_capital_text text-light">{{ $appname }} makes sourcing, fulfillment, and selling
                online,
                easier.
            </h1>


            <div class="all_source_tabs">

                <div class="src_tab">
                    <a href="{{ $item->pdf_file_src1 }}">
                        <img src="{{ $item->pdf_src1_img }}" alt="" class="source_img">
                        <p class="small_details">
                            {!! $item->sm_dtls_txt_1 !!}
                        </p>
                    </a>
                </div>

                <div class="src_tab">
                    <a href="{{ $item->pdf_file_src2 }}">
                        <img src="{{ $item->pdf_src2_img }}" alt="" class="source_img">
                        <p class="small_details">
                            {!! $item->sm_dtls_txt_2 !!}
                        </p>
                    </a>
                </div>

                <div class="src_tab">
                    <a href="{{ $item->pdf_file_src3 }}">
                        <img src="{{ $item->pdf_src3_img }}" alt="" class="source_img">
                        <p class="small_details">
                            {!! $item->sm_dtls_txt_3 !!}
                        </p>
                    </a>
                </div>

                <div class="src_tab">
                    <a href="{{ $item->pdf_file_src4 }}">
                        <img src="{{ $item->pdf_src4_img }}" alt="" class="source_img">
                        <p class="small_details">
                            {!! $item->sm_dtls_txt_4 !!}
                        </p>
                    </a>
                </div>


            </div>


        </section>


        <section class="all_brands">

            <div class="container branding_tabs">

                @php
                    $images = explode('|', $item->brand_line_images);
                    foreach ($images as $key => $imgsrc) {
                        echo '<div class="brand_tab"><img src="' . $imgsrc . '" class="brand_img image_thing"> </div>';
                    }
                @endphp

            </div>

        </section>





        <section class="unlock_potential">
            <div class="container">

                <h1 class="next_gen_capital_text unlockText">Unlock Your Full Potential.</h1>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_1 }}" alt="" class="unlockimg">
                        </div>
                        <div class="col-md-6">
                            <p class="headline">{{ $item->potential_title_1 }}</p>
                            <p class="unlock_details">
                                {{ $item->potential_short_desc_1 }}
                            </p>
                        </div>
                        <div class="center_items col-md-3">
                            <a href="/unlock-potential/1" class="btn">Learn More → </a>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_2 }}" alt="" class="unlockimg">
                        </div>
                        <div class="col-md-6">
                            <p class="headline">{{ $item->potential_title_2 }}</p>
                            <p class="unlock_details">
                                {{ $item->potential_short_desc_2 }}
                            </p>
                        </div>
                        <div class="center_items col-md-3">
                            <a href="/unlock-potential/2" class="btn">Learn More → </a>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_3 }}" alt="" class="unlockimg">
                        </div>
                        <div class="col-md-6">
                            <p class="headline">{{ $item->potential_title_3 }}</p>
                            <p class="unlock_details">
                                {{ $item->potential_short_desc_3 }}
                            </p>
                        </div>
                        <div class="center_items col-md-3">
                            <a href="/unlock-potential/3" class="btn">Learn More → </a>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_4 }}" alt="" class="unlockimg">
                        </div>
                        <div class="col-md-6">
                            <p class="headline">{{ $item->potential_title_4 }}</p>
                            <p class="unlock_details">
                                {{ $item->potential_short_desc_4 }}
                            </p>
                        </div>
                        <div class="center_items col-md-3">
                            <a href="/unlock-potential/4" class="btn">Learn More → </a>
                        </div>
                    </div>
                </div>





            </div>

        </section>





        <section class="petra_flows">
            <div class="container">

                <div class="tab_container">
                    <button class="select_type tab_active" onclick="activeTab(this)" data-id="1">01 Overview</button>
                    <button class="select_type" onclick="activeTab(this)" data-id="2">02 Sourcing</button>
                    <button class="select_type" onclick="activeTab(this)" data-id="3">03 Fulfillment &
                        Storage</button>
                    <button class="select_type" onclick="activeTab(this)" data-id="4">04 eCommerce</button>
                </div>



                <div id="tab_all_data">

                    <div class="tabline_data">
                        <h3 class="text-center mb-4">{{ $appname }} puts everything in one place.</h3>
                        <div class="tab_row">

                            <div class="tabline">
                                <img src="{{ $item->overview_img1 }}" alt="" class="tabline_img">
                                <div class="tabline_details">
                                    {!! $item->overview_text_1 !!}
                                </div>
                            </div>

                            <div class="tabline">
                                <img src="{{ $item->overview_img2 }}" alt="" class="tabline_img">
                                <div class="tabline_details">
                                    {!! $item->overview_text_2 !!}
                                </div>
                            </div>

                            <div class="tabline">
                                <img src="{{ $item->overview_img3 }}" alt="" class="tabline_img">
                                <div class="tabline_details">
                                    {!! $item->overview_text_3 !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tabline_data d-none">
                        <div class="row">
                            <div class="items_centered col-md-6">
                                <div class="holder_div">
                                    <p class="headline_data_text">
                                        {{ $item->sourcing_title }}
                                    </p>
                                    <p class="detailed_texts">
                                        {!! $item->sourcing_text !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->sourcing_img }}" alt="" class="tabline_right_img">
                            </div>
                        </div>
                    </div>

                    <div class="tabline_data d-none">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->storage_img }}" alt="" class="tabline_right_img">
                            </div>
                            <div class="items_centered col-md-6">
                                <div class="holder_div">
                                    <p class="headline_data_text">
                                        {{ $item->storage_title }}
                                    </p>
                                    <p class="detailed_texts">
                                        {!! $item->storage_text !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabline_data d-none">
                        <div class="row">
                            <div class="items_centered col-md-6">
                                <div class="holder_div">
                                    <p class="headline_data_text">
                                        {{ $item->ecommerce_title }}
                                    </p>
                                    <p class="detailed_texts">
                                        {!! $item->ecommerce_text !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->ecommerce_img }}" alt="" class="tabline_right_img">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <section class="powerful_platform">
            <h1 class="next_gen_capital_text text-light">One powerful platform to execute on your vision.</h1>

            <div class="three_tabs">

                <div class="three_tab_line hovered_tab">
                    <img src="{{ $item->screenshot_img }}" alt="" class="tab_main_img">
                    <div class="tab_text_line">
                        <p class="main_text">{!! $item->screenshot_text !!}</p>
                        <div class="start_now_btn" onclick="showSignUp()">Start Now</div>
                    </div>
                </div>

                <div class="three_tab_line">
                    <img src="{{ $item->soap_img }}" alt="" class="tab_main_img">
                    <div class="tab_text_line">
                        <p class="main_text">{!! $item->soap_text !!}</p>
                        <div class="start_now_btn" onclick="showSignUp()">Start Now</div>
                    </div>
                </div>

                <div class="three_tab_line">
                    <img src="{{ $item->daddy_img }}" alt="" class="tab_main_img">
                    <div class="tab_text_line">
                        <p class="main_text">{!! $item->daddy_text !!}</p>
                        <div class="start_now_btn" onclick="showSignUp()">Start Now</div>
                    </div>
                </div>

            </div>

        </section>





        <section class="doing_for_all">
            <h1 class="next_gen_capital_text">Faster, easier, cheaper, than doing it yourself.</h1>

            <div class="doing_images">
                <img src="{{ $item->varifiedss_img }}" alt="" class="doing_img">
                <img src="{{ $item->lowcostss_img }}" alt="" class="doing_img d-none">
                <img src="{{ $item->ecomss_img }}" alt="" class="doing_img d-none">
            </div>


            <div class="tab_lines_all_texts">
                <button class="doing_tab doing_active" onclick="showDoing(this)" data-id="1">
                    A Vetted Factory Network
                </button>
                <button class="doing_tab" onclick="showDoing(this)" data-id="2">Low Cost Fulfillment Center</button>
                <button class="doing_tab" onclick="showDoing(this)" data-id="3">eCommerce & Tools to Grow</button>
            </div>
        </section>




        <div class="in_good_company">
            <h1 class="next_gen_capital_text">You're in good company.</h1>
            <h3 class="text-center">Get inspired by fellow Creators.</h3>

            <div id="company_sliders" class="owl-carousel owl-theme">

                @forelse ($influencer_profiles as $inflncrs)
                    <div class="item company_line">
                        <a href="/see-profile/{{ $inflncrs->vendor_user_id }}">

                            <div class="items_centered">
                                <img src="{{ $inflncrs->company_logo }}" alt="" class="company_main_img"
                                    data-main="{{ $inflncrs->company_logo }}" data-hover="{{ $inflncrs->company_logo }}"
                                    onmouseover="changeImg(this)" onmouseleave="defaultImg(this)">
                            </div>

                            <p class="company_name">{{ $inflncrs->business_name }}</p>
                            <p class="shop_linked">Shop Linked</p>
                        </a>
                    </div>
                @empty
                @endforelse

            </div>






        </div>

    @empty
    @endforelse
@endsection


@section('scripts')
    <script>
        $(".home").addClass("active");
    </script>
@endsection
