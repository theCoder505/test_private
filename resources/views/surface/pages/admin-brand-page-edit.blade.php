@extends('surface.layouts.app')

@section('title')
    Edit Brands - {{ $appname }}
@endsection



@section('content')
    <input type="hidden" class="token" value="{{ csrf_token() }}">


    @forelse ($brand_data as $brand)
        <section class="first_section">
            <a href="/admin/admindashboard" class="btn btn-dark mt-3 px-5">Back To Dashboard</a>

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
                                    class="place_manage_img div_1_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_1_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_2_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_2_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_3_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_3_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_4_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_4_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_5_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_5_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_6_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_6_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_7_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_7_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
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
                                    class="place_manage_img div_8_img image_thing" onclick="activateInput(this)">
                                <input type="file" name="div_8_img" class="file_input d-none" accept="image/*"
                                    onchange="showSpecImageInSpecField(this)">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>




        <section class="first_section">
            <h1 class="next_gen_capital_text sec_2_title" contenteditable="true"> {!! $brand->sec_2_title !!}</h1>

            <p class="getup_text sec_2_short_desac" contenteditable="true"> {!! $brand->sec_2_short_desac !!}</p>


            <div class="container my-5">

                <div class="row affordable">


                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->supply_img !!}" alt="photo" class="afford_img supply_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="supply_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="affordable_heading supply_title" contenteditable="true">{!! $brand->supply_title !!}</p>
                        <p class="affordable_para supply_text" contenteditable="true">{!! $brand->supply_text !!}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->fulfil_img !!}" alt="photo" class="afford_img fulfil_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="fulfil_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="affordable_heading fulfil_title" contenteditable="true">{!! $brand->fulfil_title !!}</p>
                        <p class="affordable_para fulfil_text" contenteditable="true">{!! $brand->fulfil_text !!}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="image_holder">
                            <img src="{!! $brand->ecom_img !!}" alt="photo" class="afford_img ecom_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="ecom_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
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
                            <img src="{!! $brand->sec_2_1_img !!}" alt="photo" class="petra_img sec_2_1_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_1_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_1_title" contenteditable="true">{!! $brand->sec_2_1_title !!}</p>
                        <p class="petra_details sec_2_1_text" contenteditable="true">
                            {!! $brand->sec_2_1_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_2_img !!}" alt="photo" class="petra_img sec_2_2_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_2_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_2_title" contenteditable="true">{!! $brand->sec_2_2_title !!}</p>
                        <p class="petra_details sec_2_2_text" contenteditable="true">
                            {!! $brand->sec_2_2_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_3_img !!}" alt="photo" class="petra_img sec_2_3_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_3_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_3_title" contenteditable="true">{!! $brand->sec_2_3_title !!}</p>
                        <p class="petra_details sec_2_3_text" contenteditable="true">
                            {!! $brand->sec_2_3_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_4_img !!}" alt="photo" class="petra_img sec_2_4_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_4_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_4_title" contenteditable="true">{!! $brand->sec_2_4_title !!}</p>
                        <p class="petra_details sec_2_4_text" contenteditable="true">
                            {!! $brand->sec_2_4_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_5_img !!}" alt="photo" class="petra_img sec_2_5_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_5_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_5_title" contenteditable="true">{!! $brand->sec_2_5_title !!}</p>
                        <p class="petra_details sec_2_5_text" contenteditable="true">
                            {!! $brand->sec_2_5_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_6_img !!}" alt="photo" class="petra_img sec_2_6_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_6_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_6_title" contenteditable="true">{!! $brand->sec_2_6_title !!}</p>
                        <p class="petra_details sec_2_6_text" contenteditable="true">
                            {!! $brand->sec_2_6_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_7_img !!}" alt="photo" class="petra_img sec_2_7_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_7_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
                        </div>
                        <p class="petra_heading sec_2_7_title" contenteditable="true">{!! $brand->sec_2_7_title !!}</p>
                        <p class="petra_details sec_2_7_text" contenteditable="true">
                            {!! $brand->sec_2_7_text !!}
                        </p>
                    </div>

                    <div class="petra_line">
                        <div class="text-center">
                            <img src="{!! $brand->sec_2_8_img !!}" alt="photo" class="petra_img sec_2_8_img image_thing"
                                onclick="activateInput(this)">
                            <input type="file" name="sec_2_8_img" class="file_input d-none" accept="image/*"
                                onchange="showSpecImageInSpecField(this)">
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



    @include('surface.pages.admin_brands_common_edit')
@endsection



@section('scripts')
    <script>
        $(".navigation").remove();
        $(".navigation_after_spacer").remove();
    </script>
@endsection
