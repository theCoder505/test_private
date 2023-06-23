@extends('surface.layouts.app')

@section('title')
    Edit Homepage Of {{ $appname }}
@endsection


@section('content')
    <style>
        .next_gen {
            margin-top: 0px;
        }

        img {
            cursor: pointer;
        }
    </style>



    @forelse ($homepageData as $item)
        <input type="hidden" class="token" value="{{ csrf_token() }}">



        <section class="welcome_slider_edit_page">
            <a href="/admin/admindashboard" class="btn btn-dark mb-5 px-5">Back To Dashboard</a>

            <div class="row">

                <div class="col-md-7">
                    <div class="all_images_holder">
                        <div class="img_bar activated_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider1 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider1" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider2 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider2" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider3 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider3" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider4 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider4" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider5 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider5" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider6 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider6" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider7 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider7" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                        <div class="img_bar" onclick="activate_tab(this)">
                            <img src="{{ $item->slider8 }}" alt="" class="main_img">
                            <input type="file" class="form-control" name="slider8" onchange="showImage(this)"
                                accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="left_img_holder">
                        <img src="{{ $item->slider1 }}" alt="" class="home_img_holder">
                    </div>
                </div>

            </div>
        </section>








        <section class="next_gen">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $item->left_img_file }}" alt="" class="w-100 leftrightimg image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="left_img_file" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>

                <div class="col-md-6">
                    <h1 contenteditable="true" class="next_gen_capital_text sec2_title">{{ $item->sec2_title }}</h1>

                    <p contenteditable="true" class="next_gen_norm sec2_text">
                        {{ $item->sec2_text }}
                    </p>

                    {{-- <center>
                    <button class="startFreeBtn" onclick="showSignUp()">Start For Free</button>
                </center> --}}
                </div>

                <div class="col-md-3">
                    <img src="{{ $item->right_img_file }}" alt="" class="w-100 leftrightimg image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="right_img_file" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
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
                    <img src="{{ $item->pdf_src1_img }}" alt="" class="source_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="pdf_src1_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">

                    <input type="file" name="pdf_file_src1" id="" class="form-control"
                        accept=".pdf,.doc,.docx">

                    <p class="small_details sm_dtls_txt_1" contenteditable="true">
                        {!! $item->sm_dtls_txt_1 !!}
                    </p>
                    <a href="{{ $item->pdf_file_src1 }}" class="btn btn-sm btn-dark px-5 mb-4 text-light">See Current
                        PDF</a>
                </div>


                <div class="src_tab">
                    <img src="{{ $item->pdf_src2_img }}" alt="" class="source_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="pdf_src2_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">

                    <input type="file" name="pdf_file_src2" id="" class="form-control"
                        accept=".pdf,.doc,.docx">

                    <p class="small_details sm_dtls_txt_2" contenteditable="true">
                        {!! $item->sm_dtls_txt_2 !!}
                    </p>
                    <a href="{{ $item->pdf_file_src2 }}" class="btn btn-sm btn-dark px-5 mb-4 text-light">See Current
                        PDF</a>
                </div>


                <div class="src_tab">
                    <img src="{{ $item->pdf_src3_img }}" alt="" class="source_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="pdf_src3_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">

                    <input type="file" name="pdf_file_src3" id="" class="form-control"
                        accept=".pdf,.doc,.docx">

                    <p class="small_details sm_dtls_txt_3" contenteditable="true">
                        {!! $item->sm_dtls_txt_3 !!}
                    </p>
                    <a href="{{ $item->pdf_file_src3 }}" class="btn btn-sm btn-dark px-5 mb-4 text-light">See Current
                        PDF</a>
                </div>


                <div class="src_tab">
                    <img src="{{ $item->pdf_src4_img }}" alt="" class="source_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="pdf_src4_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">

                    <input type="file" name="pdf_file_src4" id="" class="form-control"
                        accept=".pdf,.doc,.docx">

                    <p class="small_details sm_dtls_txt_4" contenteditable="true">
                        {!! $item->sm_dtls_txt_4 !!}
                    </p>
                    <a href="{{ $item->pdf_file_src4 }}" class="btn btn-sm btn-dark px-5 mb-4 text-light">See Current
                        PDF</a>
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

            <div class="brand_tab">
                <label for="">Update Brand List</label>
                <input type="file" class="form-control" name="brand_line_images" accept="image/*"
                    onchange="addNewBrand(this)" multiple>
            </div>

        </section>





        <section class="unlock_potential">
            <div class="container">

                <h1 class="next_gen_capital_text unlockText">Unlock Your Full Potential.</h1>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_1 }}" alt="" class="unlockimg image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="potential_img_1" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <div class="col-md-5">
                            <p class="headline potential_title_1" contenteditable="true"> {{ $item->potential_title_1 }}
                            </p>
                            <p class="unlock_details potential_short_desc_1" contenteditable="true">
                                {{ $item->potential_short_desc_1 }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Content For Learn More Page</label>
                                <textarea class="form-control w-100" name="potential_desc_1" id="richTextEditor" rows="7"> {{ $item->potential_desc_1 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_2 }}" alt="" class="unlockimg image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="potential_img_2" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <div class="col-md-5">
                            <p class="headline potential_title_2" contenteditable="true"> {{ $item->potential_title_2 }}
                            </p>
                            <p class="unlock_details potential_short_desc_2" contenteditable="true">
                                {{ $item->potential_short_desc_2 }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Content For Learn More Page</label>
                                <textarea class="form-control w-100" name="potential_desc_2" id="richTextEditor" rows="7"> {{ $item->potential_desc_2 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_3 }}" alt="" class="unlockimg image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="potential_img_3" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <div class="col-md-5">
                            <p class="headline potential_title_3" contenteditable="true"> {{ $item->potential_title_3 }}
                            </p>
                            <p class="unlock_details potential_short_desc_3" contenteditable="true">
                                {{ $item->potential_short_desc_3 }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Content For Learn More Page</label>
                                <textarea class="form-control w-100" name="potential_desc_3" id="richTextEditor" rows="7"> {{ $item->potential_desc_3 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="unlocking_lines">
                    <div class="row">
                        <div class="center_items col-md-3">
                            <img src="{{ $item->potential_img_4 }}" alt="" class="unlockimg image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="potential_img_4" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <div class="col-md-5">
                            <p class="headline potential_title_4" contenteditable="true"> {{ $item->potential_title_4 }}
                            </p>
                            <p class="unlock_details potential_short_desc_4" contenteditable="true">
                                {{ $item->potential_short_desc_4 }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Content For Learn More Page</label>
                                <textarea class="form-control w-100" name="potential_desc_4" id="richTextEditor" rows="7"> {{ $item->potential_desc_4 }}</textarea>
                            </div>
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
                                <img src="{{ $item->overview_img1 }}" alt="" class="tabline_img image_thing"
                                    onclick="activateInput(this)">
                                <input type="file" name="overview_img1" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">

                                <div class="tabline_details overview_text_1" contenteditable="true">
                                     {!! $item->overview_text_1 !!}
                                </div>
                            </div>

                            <div class="tabline">
                                <img src="{{ $item->overview_img2 }}" alt="" class="tabline_img image_thing"
                                    onclick="activateInput(this)">
                                <input type="file" name="overview_img2" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">

                                <div class="tabline_details overview_text_2" contenteditable="true">
                                      {!! $item->overview_text_2 !!}
                                </div>
                            </div>

                            <div class="tabline">
                                <img src="{{ $item->overview_img3 }}" alt="" class="tabline_img image_thing"
                                    onclick="activateInput(this)">
                                <input type="file" name="overview_img3" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">

                                <div class="tabline_details overview_text_3" contenteditable="true">
                                      {!! $item->overview_text_3 !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tabline_data d-none">
                        <div class="row">
                            <div class="items_centered col-md-6">
                                <div class="holder_div">
                                    <p class="headline_data_text sourcing_title" contenteditable="true">
                                        {{ $item->sourcing_title }}
                                    </p>
                                    <p class="detailed_texts sourcing_text" contenteditable="true">
                                        {{ $item->sourcing_text }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->sourcing_img }}" alt=""
                                    class="tabline_right_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="sourcing_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
                            </div>
                        </div>
                    </div>

                    <div class="tabline_data d-none">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->storage_img }}" alt="" class="tabline_right_img image_thing"
                                    onclick="activateInput(this)">
                                <input type="file" name="storage_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
                            </div>
                            <div class="items_centered col-md-6">
                                <div class="holder_div">
                                    <p class="headline_data_text storage_title" contenteditable="true">
                                        {{ $item->storage_title }}
                                    </p>
                                    <p class="detailed_texts storage_text" contenteditable="true">
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
                                    <p class="headline_data_text ecommerce_title" contenteditable="true">
                                        {{ $item->ecommerce_title }}
                                    </p>
                                    <p class="detailed_texts ecommerce_text" contenteditable="true">
                                        {!! $item->ecommerce_text !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ $item->ecommerce_img }}" alt=""
                                    class="tabline_right_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="ecommerce_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                    <img src="{{ $item->screenshot_img }}" alt="" class="tab_main_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="screenshot_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                    <div class="tab_text_line">
                        <p class="main_text screenshot_text" contenteditable="true">{!! $item->screenshot_text !!}</p>
                        {{-- <div class="start_now_btn" onclick="showSignUp()">Start Now</div> --}}
                    </div>
                </div>

                <div class="three_tab_line">
                    <img src="{{ $item->soap_img }}" alt="" class="tab_main_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="soap_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                    <div class="tab_text_line">
                        <p class="main_text soap_text" contenteditable="true">{!! $item->soap_text !!}</p>
                        {{-- <div class="start_now_btn" onclick="showSignUp()">Start Now</div> --}}
                    </div>
                </div>

                <div class="three_tab_line">
                    <img src="{{ $item->daddy_img }}" alt="" class="tab_main_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="daddy_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                    <div class="tab_text_line">
                        <p class="main_text daddy_text" contenteditable="true">{!! $item->daddy_text !!}</p>
                        {{-- <div class="start_now_btn" onclick="showSignUp()">Start Now</div> --}}
                    </div>
                </div>

            </div>

        </section>














        <section class="doing_for_all">
            <h1 class="next_gen_capital_text">Faster, easier, cheaper, than doing it yourself.</h1>

            <div class="doing_images">
                <div class="doing_holder">
                    <img src="{{ $item->varifiedss_img }}" alt="" class="doing_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="varifiedss_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <div class="doing_holder d-none">
                    <img src="{{ $item->lowcostss_img }}" alt="" class="doing_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="lowcostss_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <div class="doing_holder d-none">
                    <img src="{{ $item->ecomss_img }}" alt="" class="doing_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="ecomss_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
            </div>


            <div class="tab_lines_all_texts">
                <button class="doing_tab doing_active" onclick="showDoingAdmin(this)" data-id="1">
                    A Vetted Factory Network
                </button>
                <button class="doing_tab" onclick="showDoingAdmin(this)" data-id="2">Low Cost Fulfillment
                    Center</button>
                <button class="doing_tab" onclick="showDoingAdmin(this)" data-id="3">eCommerce & Tools to
                    Grow</button>
            </div>
        </section>



        <div class="container my-5">
            <center>
                <button class="btn btn-block btn-lg btn-primary uppercase" onclick="submitHomepageForm(this)">
                    Save Updates
                </button>
            </center>
        </div>

    @empty
    @endforelse
@endsection


@section('scripts')
    <script>
        $(".navigation").remove();
        $(".navigation_after_spacer").remove();
    </script>
@endsection
