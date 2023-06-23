@extends('surface.layouts.app')

@section('title')
    Existing Brands - {{ $appname }}
@endsection



@section('content')
    @forelse ($brand_data as $brand)

        <section class="first_section">
            <h1 class="next_gen_capital_text sec_1_title" contenteditable="true"> {!! $brand->sec_1_title !!}
            </h1>

            <p class="getup_text sec_1_short_desac" contenteditable="true">
                {!! $brand->sec_1_short_desac !!}
            </p>




            <div class="container my-5">

                <div class="existing_brands affordable">

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_1_title" contenteditable="true">{!! $brand->div_1_title !!}</p>
                                <p class="place_details div_1_text" contenteditable="true">{!! $brand->div_1_text !!}</p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_1_img !!}" alt="photo"
                                    class="place_manage_img div_1_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_2_title" contenteditable="true">{!! $brand->div_2_title !!}</p>
                                <p class="place_details div_2_text" contenteditable="true">
                                    {!! $brand->div_2_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_2_img !!}" alt="photo"
                                    class="place_manage_img div_2_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_3_title" contenteditable="true">{!! $brand->div_3_title !!}</p>
                                <p class="place_details div_3_text" contenteditable="true">
                                    {!! $brand->div_3_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_3_img !!}" alt="photo"
                                    class="place_manage_img div_3_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_4_title" contenteditable="true">{!! $brand->div_4_title !!}</p>
                                <p class="place_details div_4_text" contenteditable="true">
                                    {!! $brand->div_4_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_4_img !!}" alt="photo"
                                    class="place_manage_img div_4_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_5_title" contenteditable="true">{!! $brand->div_5_title !!}</p>
                                <p class="place_details div_5_text" contenteditable="true">
                                    {!! $brand->div_5_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_5_img !!}" alt="photo"
                                    class="place_manage_img div_5_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_6_title" contenteditable="true">{!! $brand->div_6_title !!}</p>
                                <p class="place_details div_6_text" contenteditable="true">
                                    {!! $brand->div_6_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_6_img !!}" alt="photo"
                                    class="place_manage_img div_6_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_7_title" contenteditable="true">{!! $brand->div_7_title !!}</p>
                                <p class="place_details div_7_text" contenteditable="true">
                                    {!! $brand->div_7_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_7_img !!}" alt="photo"
                                    class="place_manage_img div_7_img image_thing">
                            </div>
                        </div>
                    </div>

                    <div class="existing_line">
                        <div class="row">
                            <div class="col-8">
                                <p class="place_header div_8_title" contenteditable="true">{!! $brand->div_8_title !!}</p>
                                <p class="place_details div_8_text" contenteditable="true">
                                    {!! $brand->div_8_text !!}
                                </p>
                            </div>
                            <div class="center_items col-4">
                                <img src="{!! $brand->div_8_img !!}" alt="photo"
                                    class="place_manage_img div_8_img image_thing">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    @empty
    @endforelse

    @include('surface.pages.brands_common')
@endsection



@section('scripts')
    <script>
        $(".exstngbrands").addClass("active");
    </script>
@endsection
