@extends('surface.layouts.app')

@section('title')
    New Brands - {{ $appname }}
@endsection



@section('content')
    @forelse ($brand_data as $brand)

        <section class="first_section">
            <h1 class="next_gen_capital_text sec_2_title" contenteditable="true"> {!! $brand->sec_2_title !!}</h1>

            <p class="getup_text sec_2_short_desac" contenteditable="true"> {!! $brand->sec_2_short_desac !!}</p>


            <div class="container my-5">

                <div class="row affordable">


                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->supply_img !!}" alt="photo" class="afford_img supply_img">
                        </div>
                        <p class="affordable_heading supply_title" contenteditable="true">{!! $brand->supply_title !!}</p>
                        <p class="affordable_para supply_text" contenteditable="true">{!! $brand->supply_text !!}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->fulfil_img !!}" alt="photo" class="afford_img fulfil_img">
                        </div>
                        <p class="affordable_heading fulfil_title" contenteditable="true">{!! $brand->fulfil_title !!}</p>
                        <p class="affordable_para fulfil_text" contenteditable="true">{!! $brand->fulfil_text !!}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->ecom_img !!}" alt="photo" class="afford_img ecom_img">
                        </div>
                        <p class="affordable_heading ecom_title" contenteditable="true">{!! $brand->ecom_title !!}</p>
                        <p class="affordable_para ecom_text" contenteditable="true">{!! $brand->ecom_text !!}</p>
                    </div>


                </div>

            </div>


            <div class="container">
                <div class="grid_petra_4_lines d-none">

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_1_img !!}" alt="photo" class="petra_img sec_2_1_img">
                        </div>
                        <p class="petra_heading sec_2_1_title" contenteditable="true">{!! $brand->sec_2_1_title !!}</p>
                        <p class="petra_details sec_2_1_text" contenteditable="true">
                            {!! $brand->sec_2_1_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_2_img !!}" alt="photo" class="petra_img sec_2_2_img">
                        </div>
                        <p class="petra_heading sec_2_2_title" contenteditable="true">{!! $brand->sec_2_2_title !!}</p>
                        <p class="petra_details sec_2_2_text" contenteditable="true">
                            {!! $brand->sec_2_2_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_3_img !!}" alt="photo" class="petra_img sec_2_3_img">
                        </div>
                        <p class="petra_heading sec_2_3_title" contenteditable="true">{!! $brand->sec_2_3_title !!}</p>
                        <p class="petra_details sec_2_3_text" contenteditable="true">
                            {!! $brand->sec_2_3_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_4_img !!}" alt="photo" class="petra_img sec_2_4_img">
                        </div>
                        <p class="petra_heading sec_2_4_title" contenteditable="true">{!! $brand->sec_2_4_title !!}</p>
                        <p class="petra_details sec_2_4_text" contenteditable="true">
                            {!! $brand->sec_2_4_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_5_img !!}" alt="photo" class="petra_img sec_2_5_img">
                        </div>
                        <p class="petra_heading sec_2_5_title" contenteditable="true">{!! $brand->sec_2_5_title !!}</p>
                        <p class="petra_details sec_2_5_text" contenteditable="true">
                            {!! $brand->sec_2_5_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_6_img !!}" alt="photo" class="petra_img sec_2_6_img">
                        </div>
                        <p class="petra_heading sec_2_6_title" contenteditable="true">{!! $brand->sec_2_6_title !!}</p>
                        <p class="petra_details sec_2_6_text" contenteditable="true">
                            {!! $brand->sec_2_6_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_7_img !!}" alt="photo" class="petra_img sec_2_7_img">
                        </div>
                        <p class="petra_heading sec_2_7_title" contenteditable="true">{!! $brand->sec_2_7_title !!}</p>
                        <p class="petra_details sec_2_7_text" contenteditable="true">
                            {!! $brand->sec_2_7_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_8_img !!}" alt="photo" class="petra_img sec_2_8_img">
                        </div>
                        <p class="petra_heading sec_2_8_title" contenteditable="true">{!! $brand->sec_2_8_title !!}</p>
                        <p class="petra_details sec_2_8_text" contenteditable="true">
                            {!! $brand->sec_2_8_text !!}
                        </p>
                    </div>

                </div>
            </div>


            <div class="text-center">
                <button class="see_more_less">See More</button>
            </div>


        </section>

    @empty
    @endforelse


    @include('surface.pages.brands_common')
@endsection



@section('scripts')
    <script>
        $(".new_brands").addClass("active");
    </script>
@endsection
