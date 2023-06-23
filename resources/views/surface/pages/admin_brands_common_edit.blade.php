@forelse ($rest_data as $item)
    <section class="petra_ways">
        <h1 class="ways_petra_text sec_3_title" contenteditable="true"> {{ $item->sec_3_title }} </h1>

        <div class="grid_petra">

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->launch_img }}" alt="photo" class="petra_img launch_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="launch_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading launch_title" contenteditable="true">{{ $item->launch_title }}</p>
                <p class="petra_details launch_text" contenteditable="true">
                    {!! $item->launch_text !!}
                </p>
                <p class="petra_red launch_red_text" contenteditable="true">
                    {!! $item->launch_red_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->streamline_img }}" alt="photo" class="petra_img streamline_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="streamline_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading streamline_title" contenteditable="true">{!! $item->streamline_title !!}</p>
                <p class="petra_details streamline_text" contenteditable="true">
                    {!! $item->streamline_text !!}
                </p>
                <p class="petra_red streamline_red_text" contenteditable="true">
                    {!! $item->streamline_red_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="text-center">
                    <img src="{{ $item->scale_img }}" alt="photo" class="petra_img scale_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="scale_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading scale_title" contenteditable="true">{!! $item->scale_title !!}</p>
                <p class="petra_details scale_text" contenteditable="true">
                    {!! $item->scale_text !!}
                </p>
                <p class="petra_red scale_red_text" contenteditable="true">
                    {!! $item->scale_red_text !!}
                </p>
            </div>



        </div>
    </section>






    <section class="smartest_operator">
        <h1 class="next_gen_capital_text sec_4_title" contenteditable="true"> {{ $item->sec_4_title }} </h1>
        <div class="container">

            <div class="row ecomLine">
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_1_title" contenteditable="true">
                            {!! $item->chain_1_title !!}
                        </h1>
                        <p class="ecom_para chain_1_short_text" contenteditable="true">
                            {!! $item->chain_1_short_text !!}
                        </p>

                        <div class="form-group">
                            <label for="">Content For Learn More Page</label>
                            <textarea class="form-control w-100 chain_1_long_text" name="chain_1_long_text" id="richTextEditor" rows="7">{!! $item->chain_1_long_text !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{!! $item->chain_1_img !!}" alt="photo" class="ecomImage chain_1_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="chain_1_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
            </div>



            <div class="row ecomLine">
                <div class="col-md-6">
                    <img src="{!! $item->chain_2_img !!}" alt="photo" class="ecomImage chain_2_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="chain_2_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_2_title" contenteditable="true">
                            {!! $item->chain_2_title !!}
                        </h1>
                        <p class="ecom_para chain_2_short_text" contenteditable="true">
                            {!! $item->chain_2_short_text !!}
                        </p>

                        <div class="form-group">
                            <label for="">Content For Learn More Page</label>
                            <textarea class="form-control w-100 chain_2_long_text" name="chain_2_long_text" contenteditable="true" id="richTextEditor"
                                rows="7"> {!! $item->chain_2_long_text !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row ecomLine">
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_3_title" contenteditable="true">
                            {!! $item->chain_3_title !!}
                        </h1>
                        <p class="ecom_para chain_3_short_text" contenteditable="true">
                            {!! $item->chain_3_short_text !!}
                        </p>

                        <div class="form-group">
                            <label for="">Content For Learn More Page</label>
                            <textarea class="form-control w-100 chain_3_long_text" name="chain_3_long_text" id="richTextEditor" rows="7">{!! $item->chain_3_long_text !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{!! $item->chain_3_img !!}" alt="photo" class="ecomImage chain_3_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="chain_3_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
            </div>



            <div class="row ecomLine">
                <div class="col-md-6">
                    <img src="{!! $item->chain_4_img !!}" alt="photo" class="ecomImage chain_4_img image_thing"
                        onclick="activateInput(this)">
                    <input type="file" name="chain_4_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <div class="center_items col-md-6">
                    <div class="text_holder">
                        <h1 class="ecom_header chain_4_title" contenteditable="true">
                            {!! $item->chain_4_title !!}
                        </h1>
                        <p class="ecom_para chain_4_short_text" contenteditable="true">
                            {!! $item->chain_4_short_text !!}
                        </p>

                        <div class="form-group">
                            <label for="">Content For Learn More Page</label>
                            <textarea class="form-control w-100 chain_4_long_text" name="chain_4_long_text" id="richTextEditor" rows="7"> {!! $item->chain_4_long_text !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>





    <section class="petra_ways">
        <h1 class="ways_petra_text sec_5_title" contenteditable="true"> {!! $item->sec_5_title !!} </h1>

        <div class="grid_petra_4">

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_1_img !!}" alt="photo"
                        class="petra_img subscription_1_img image_thing" onclick="activateInput(this)">
                    <input type="file" name="subscription_1_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading subscription_1_title" contenteditable="true">{!! $item->subscription_1_title !!}</p>
                <p class="petra_details subscription_1_text" contenteditable="true">
                    {!! $item->subscription_1_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_2_img !!}" alt="photo"
                        class="petra_img subscription_2_img image_thing" onclick="activateInput(this)">
                    <input type="file" name="subscription_2_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading subscription_2_title" contenteditable="true">{!! $item->subscription_2_title !!}</p>
                <p class="petra_details subscription_2_text" contenteditable="true">
                    {!! $item->subscription_2_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_3_img !!}" alt="photo"
                        class="petra_img subscription_3_img image_thing" onclick="activateInput(this)">
                    <input type="file" name="subscription_3_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading subscription_3_title" contenteditable="true">{!! $item->subscription_3_title !!}</p>
                <p class="petra_details subscription_3_text" contenteditable="true">
                    {!! $item->subscription_3_text !!}
                </p>
            </div>

            <div class="petra_line">
                <div class="petra_img_line">
                    <img src="{!! $item->subscription_4_img !!}" alt="photo"
                        class="petra_img subscription_4_img image_thing" onclick="activateInput(this)">
                    <input type="file" name="subscription_4_img" class="file_input d-none" accept="image/*"
                        onchange="showSpecImageInSpecField(this)">
                </div>
                <p class="petra_heading subscription_4_title" contenteditable="true">{!! $item->subscription_4_title !!}</p>
                <p class="petra_details subscription_4_text" contenteditable="true">
                    {!! $item->subscription_4_text !!}
                </p>
            </div>



        </div>
    </section>


@empty
@endforelse

<div class="container mb-5 pb-5">
    <button class="btn btn-block btn-lg btn-primary" onclick="saveBrandingPage(this)">Save Changes</button>
</div>
