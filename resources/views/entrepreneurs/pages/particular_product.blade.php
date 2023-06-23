@extends('entrepreneurs.layouts.app')

@section('title')
    {{ $prod_name }} | {{ $appname }}
@endsection

@section('content')
    <!-- // main webpage content is here  -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <h2 class="centered_text">Product Details </h2>


                        @forelse ($particular_product as $item)
                            <div class="product_show_page">

                                <form action="/entrepreneur/send-to-order-product" method="post">
                                    @csrf


                                    <div class="row border_bottom">
                                        <div class="col-md-5">
                                            <div class="prod_img_holder">
                                                @php
                                                    $images = explode('|', $item->project_photos);
                                                    foreach ($images as $key => $imgsrc) {
                                                        if ($key < 1) {
                                                            echo '<img src="' . $imgsrc . '" class="prod_img">';
                                                        }
                                                    }
                                                @endphp
                                            </div>

                                            <div class="prod_photos">
                                                @php
                                                    $images = explode('|', $item->project_photos);
                                                    foreach ($images as $key => $imgsrc) {
                                                        if ($key < 1) {
                                                            echo '<div class="photo_line active_line" onclick="showParticularimage(this)"><img src="' . $imgsrc . '" class="prod_pic"></div>';
                                                        } else {
                                                            echo '<div class="photo_line" onclick="showParticularimage(this)"><img src="' . $imgsrc . '" class="prod_pic"></div>';
                                                        }
                                                    }
                                                @endphp


                                            </div>
                                        </div>

                                        <div class="col-md-7 left_side_border">
                                            <h3 class="headline_text text-danger">
                                                {{ $item->item_name }}
                                            </h3>

                                            <div class="more_details">
                                                <span class="detail_title">You will receive: </span>
                                                <span class="detail_amount">
                                                    {{ $item->what_receives }}
                                                </span>
                                            </div>

                                            <div class="detail_title mt-3">Product Details:</div>
                                            <pre class="prod_desc">{!! $item->prod_desc !!}</pre>
                                            <button class="btn btn-sm btn-dark px-2" onclick="seemore(this)">Read
                                                More</button>

                                            <div class="more_details"><span class="detail_title">Sample Cost: </span> <span
                                                    class="detail_amount">${{ $item->sample_price }}</span> </div>

                                            <div class="more_details"><span class="detail_title">Sample Exists: </span>
                                                <span class="detail_amount">${{ $item->sample_moq }}</span>
                                            </div>

                                            <div class="more_details"><span class="detail_title">Sample Production Time:
                                                </span>
                                                <span class="detail_amount">{{ $typical_run_time }} Days</span>
                                            </div>

                                            <div class="more_details"><span class="detail_title">Create & ship samples Time:
                                                </span>
                                                <span class="detail_amount">{{ $create_n_ship_time }} Days</span>
                                            </div>

                                            <div class="more_details"><span class="detail_title">Production / Unit Cost:
                                                </span>
                                                <span class="detail_amount">${{ $item->prod_unit_cost }}</span>
                                            </div>

                                            <div class="more_details"><span class="detail_title">Minimum Order Quantity
                                                    (MOQ)
                                                    :
                                                </span> <span class="detail_amount">{{ $item->prod_mcq }}</span> </div>


                                            <div class="more_details">
                                                <div class="form-group">
                                                    <label class="detail_title">Amount:</label>
                                                    <input type="number" class="form-control productNumber" required
                                                        name="product_amount" value="{{ $item->prod_mcq }}"
                                                        onchange="calculateAmount(this)">
                                                </div>
                                            </div>

                                            <div class="more_details">
                                                <span class="detail_title">Sub Total</span>
                                                <input type="hidden" value="{{ $item->sno }}" name="prod_id">
                                                <input type="hidden" value="{{ $item->prod_unit_cost }}" class="per_unit"
                                                    name="cost_per_unit">
                                                <span
                                                    class="detail_amount subtotal_amount">${{ $item->prod_mcq * $item->prod_unit_cost }}</span>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn px-3 mt-2 btn-dark">
                                                    Proceed To Order
                                                </button>

                                                <a href="/addto-cart/{{ $item->sno }}/{{ $item->product_category }}/{{ $item->item_name }}"
                                                    class="btn px-3 mt-2 btn-danger mx-3">Add To Cart</a>

                                                <a href="/contact/menufacturer/{{ $company_name }}/{{ $item->vendor_unique_id }}"
                                                    class="btn px-3 mt-2 btn-primary">Conatct</a>

                                                <a href="/entrepreneur/see-vendor-profile/{{ $item->vendor_type }}/{{ $item->vendor_unique_id }}"
                                                    class="btn px-3 mt-2 btn-dark mx-3">See Profile</a>
                                            </div>

                                        </div>
                                </form>






                            </div>




                        @empty
                            <h3 class="text-center text-danger font-weight-bold">No such product.</h3>
                        @endforelse




                        <h2 class="centered_text mt-5 mb-0">Similar Products </h2>
                        <div class="product_show_page">
                            <div class="item_grid_4">

                                @forelse ($all_related_products as $item)
                                    <div class="item_grid_line">
                                        <div class="prod_item_img_holder">
                                            @php
                                                $images = explode('|', $item->project_photos);
                                                foreach ($images as $key => $imgsrc) {
                                                    if ($key < 1) {
                                                        echo '<img src="' . $imgsrc . '" alt="" class="item_img">';
                                                    }
                                                }
                                            @endphp

                                        </div>
                                        <p class="prod_item_title">{{ $item->item_name }}</p>
                                        <p class="item_category">Category: {{ $item->product_category }}</p>
                                        <center>
                                            <a href="/see-product/{{ $item->sno }}/{{ $item->product_category }}/{{ $item->item_name }}"
                                                class="continue_btn">See Product</a>
                                        </center>
                                    </div>

                                @empty
                                    <div class=""></div>
                                    <div class="">
                                        <h5 class="text-center text-danger font-weight-bold">No more product in this
                                            category.</h5>
                                    </div>
                                    <div class=""></div>
                                    <div class=""></div>
                                @endforelse

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
        var prod_desc = $(".prod_desc").html();
        var shor_desc = prod_desc.substring(0, 100);
        $(".prod_desc").html(shor_desc + "...");

        function seemore(passedThis) {
            $(".prod_desc").html(prod_desc);
            $(passedThis).remove();
        }
    </script>
@endsection
