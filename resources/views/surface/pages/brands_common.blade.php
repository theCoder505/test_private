@forelse ($rest_data as $item)

    <section class="petra_ways">
        <h1 class="ways_petra_text sec_3_title"> {{ $item->sec_3_title }} </h1>

        <div class="grid_petra">

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->launch_img }}" alt="photo" class="petra_img launch_img image_thing">
                </div>
                <p class="petra_heading launch_title">{{ $item->launch_title }}</p>
                <p class="petra_details launch_text">
                    {!! $item->launch_text !!}
                </p>
                <p class="petra_red launch_red_text">
                    {!! $item->launch_red_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->streamline_img }}" alt="photo" class="petra_img streamline_img image_thing">
                </div>
                <p class="petra_heading streamline_title">{!! $item->streamline_title !!}</p>
                <p class="petra_details streamline_text">
                    {!! $item->streamline_text !!}
                </p>
                <p class="petra_red streamline_red_text">
                    {!! $item->streamline_red_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->scale_img }}" alt="photo" class="petra_img scale_img image_thing">
                </div>
                <p class="petra_heading scale_title">{!! $item->scale_title !!}</p>
                <p class="petra_details scale_text">
                    {!! $item->scale_text !!}
                </p>
                <p class="petra_red scale_red_text">
                    {!! $item->scale_red_text !!}
                </p>
            </div>



        </div>
    </section>





    <section class="smartest_operator">
        <h1 class="next_gen_capital_text sec_4_title"> {{ $item->sec_4_title }} </h1>
        <div class="container">

            <div class="row ecomLine">
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_1_title">
                            {!! $item->chain_1_title !!}
                        </h1>
                        <p class="ecom_para chain_1_short_text">
                            {!! $item->chain_1_short_text !!}
                        </p>

                        <a href="/learr-more-about-brand/1/{!! $item->chain_1_title !!}" class="btn learnmorebtn">Learn More
                            → </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{!! $item->chain_1_img !!}" alt="photo" class="ecomImage chain_1_img image_thing">
                </div>
            </div>



            <div class="row ecomLine">
                <div class="col-md-6">
                    <img src="{!! $item->chain_2_img !!}" alt="photo" class="ecomImage chain_2_img image_thing">
                </div>
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_2_title">
                            {!! $item->chain_2_title !!}
                        </h1>
                        <p class="ecom_para chain_2_short_text">
                            {!! $item->chain_2_short_text !!}
                        </p>

                        <a href="/learr-more-about-brand/2/{!! $item->chain_2_title !!}" class="btn learnmorebtn">Learn More
                            → </a>
                    </div>
                </div>
            </div>




            <div class="row ecomLine">
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_3_title">
                            {!! $item->chain_3_title !!}
                        </h1>
                        <p class="ecom_para chain_3_short_text">
                            {!! $item->chain_3_short_text !!}
                        </p>

                        <a href="/learr-more-about-brand/3/{!! $item->chain_3_title !!}" class="btn learnmorebtn">Learn More
                            → </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{!! $item->chain_3_img !!}" alt="photo" class="ecomImage chain_3_img image_thing">
                </div>
            </div>



            <div class="row ecomLine">
                <div class="col-md-6">
                    <img src="{!! $item->chain_4_img !!}" alt="photo" class="ecomImage chain_4_img image_thing">
                </div>
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_4_title">
                            {!! $item->chain_4_title !!}
                        </h1>
                        <p class="ecom_para chain_4_short_text">
                            {!! $item->chain_4_short_text !!}
                        </p>

                        <a href="/learr-more-about-brand/4/{!! $item->chain_4_title !!}" class="btn learnmorebtn">Learn More
                            → </a>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section class="all_reviews">
        <h1 class="ways_petra_text"> The Reviews Are In </h1>

        <div class="container">

            <div id="all_review_lines" class="owl-carousel owl-theme">

                <div class="item review_line">
                    <div class="left_part">
                        <p class="left_header">FORM by Sami Clarke</p>
                        <p class="left_details">
                            We have absolutely loved working with {{ $appname }}! Their suppliers are top tier,
                            customer service
                            is
                            exceptional and they make operating a storefront extremely simple.
                        </p>
                    </div>
                    <div class="right_part">
                        <img src="/surface/assets/images/review1.jpg" alt="" class="right_part_img">
                    </div>
                </div>

                <div class="item review_line">
                    <div class="left_part">
                        <p class="left_header">FORM by Sami Clarke 2</p>
                        <p class="left_details">
                            We have absolutely loved working with {{ $appname }}! Their suppliers are top tier,
                            customer service
                            is
                            exceptional and they make operating a storefront extremely simple.
                        </p>
                    </div>
                    <div class="right_part">
                        <img src="/surface/assets/images/review1.jpg" alt="" class="right_part_img">
                    </div>
                </div>

                <div class="item review_line">
                    <div class="left_part">
                        <p class="left_header">FORM by Sami Clarke 3</p>
                        <p class="left_details">
                            We have absolutely loved working with {{ $appname }}! Their suppliers are top tier,
                            customer service
                            is
                            exceptional and they make operating a storefront extremely simple.
                        </p>
                    </div>
                    <div class="right_part">
                        <img src="/surface/assets/images/review1.jpg" alt="" class="right_part_img">
                    </div>
                </div>

                <div class="item review_line">
                    <div class="left_part">
                        <p class="left_header">FORM by Sami Clarke 4</p>
                        <p class="left_details">
                            We have absolutely loved working with {{ $appname }}! Their suppliers are top tier,
                            customer service
                            is
                            exceptional and they make operating a storefront extremely simple.
                        </p>
                    </div>
                    <div class="right_part">
                        <img src="/surface/assets/images/review1.jpg" alt="" class="right_part_img">
                    </div>
                </div>

            </div>

        </div>


        <center>
            <button class="startFreeBtn mt-5" onclick="showSignUp()">Start For Free</button>
        </center>

    </section>




    <section class="petra_ways">
        <h1 class="ways_petra_text sec_5_title"> {!! $item->sec_5_title !!} </h1>

        <div class="grid_petra_4">

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_1_img !!}" alt="photo" class="petra_img subscription_1_img">
                </div>
                <p class="petra_heading subscription_1_title">{!! $item->subscription_1_title !!}</p>
                <p class="petra_details subscription_1_text">
                    {!! $item->subscription_1_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_2_img !!}" alt="photo" class="petra_img subscription_2_img">
                </div>
                <p class="petra_heading subscription_2_title">{!! $item->subscription_2_title !!}</p>
                <p class="petra_details subscription_2_text">
                    {!! $item->subscription_2_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_3_img !!}" alt="photo" class="petra_img subscription_3_img">
                </div>
                <p class="petra_heading subscription_3_title">{!! $item->subscription_3_title !!}</p>
                <p class="petra_details subscription_3_text">
                    {!! $item->subscription_3_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_4_img !!}" alt="photo" class="petra_img subscription_4_img">
                </div>
                <p class="petra_heading subscription_4_title">{!! $item->subscription_4_title !!}</p>
                <p class="petra_details subscription_4_text">
                    {!! $item->subscription_4_text !!}
                </p>
            </div>



        </div>
    </section>




    <section class="petra_popular_questions">
        <h1 class="ways_petra_text"> Popular Questions </h1>
        <p class="text-center my-4 font3">
            Here's what other people are asking before signing up for {{ $appname }}. If you have any questions
            that
            aren't <br>
            listed here, please email creators@{{ $appname }}studio.com
        </p>

        <div class="container">
            <div id="all_accordion">
                <div class="collapsible-tabs__wrapper">

                    @forelse ($allfaqs as $faq_item)
                        <div class="collapsibles-wrapper">
                            <button type="button" class="collapsible-trigger-btn">
                                {{ $faq_item->title }}
                            </button>
                            <div class="collapsible-content">
                                <div class="collapsible-content__inner">
                                    <p>
                                        {{ $faq_item->answer }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse


                </div>
            </div>
        </div>

    </section>


@empty

@endforelse
