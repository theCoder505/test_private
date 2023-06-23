@extends('influencers.layouts.app')

@section('title')
    Your All Ordered Products | {{ $appname }}
@endsection

@section('content')
    <style>
        .portal_line {
            width: 100%;
            overflow-x: auto;
        }
    </style>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <div class="col-12 allAlerts">
                            @if (session()->has('alertMsg'))
                                <div class="alert text-center {{ session()->get('type') }} alert-dismissible fade show"
                                    role="alert">
                                    {{ session()->get('alertMsg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>


                        <div class="rfp_holder">
                            <h2 class="centered_text"> Create New RFP </h2>

                            <div class="portal_line">

                                <form action="/influencer/create-new-rfp-post" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Product Category For Request</label>
                                        <select name="prod_cat" class="form-control" required>
                                            <option value="Apparel">Apparel</option>
                                            <option value="Babby And Toddler">Babby And Toddler</option>
                                            <option value="Beauty">Beauty</option>
                                            <option value="Beverage">Beverage</option>
                                            <option value="Candles">Candles</option>
                                            <option value="Cleaning Supplies">Cleaning Supplies</option>
                                            <option value="Coffie & Tea">Coffie & Tea</option>
                                            <option value="Condiments">Condiments</option>
                                            <option value="Fashion Accessories">Fashion Accessories</option>
                                            <option value="Fitness">Fitness</option>
                                            <option value="Foods">Foods</option>
                                            <option value="Fragnance">Fragnance</option>
                                            <option value="Home Goods">Home Goods</option>
                                            <option value="Jewellery">Jewellery</option>
                                            <option value="Leather Goods">Leather Goods</option>
                                            <option value="Merch">Merch</option>
                                            <option value="Pet">Pet</option>
                                            <option value="Paper Goods">Paper Goods</option>
                                            <option value="Shoes">Shoes</option>
                                            <option value="Smooking Accessories">Smooking Accessories</option>
                                            <option value="Sweets">Sweets</option>
                                            <option value="Swimwears">Swimwears</option>
                                            <option value="Tech Gadgeets">Tech Gadgeets</option>
                                            <option value="Toys">Toys</option>
                                            <option value="Toys & Games">Toys & Games</option>
                                            <option value="Wellness">Wellness</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" class="form-control" name="product_title" required>
                                    </div>


                                    <div class="form-group">
                                        <label> Please upload reference photos and/or design files for your supplier:
                                        </label>
                                        <input type="file" class="form-control" name="product_image[]" accept="image/*"
                                            multiple onchange="showMultipleImages(this)" required>
                                    </div>

                                    <div id="multple_gallery"></div>


                                    <div class="form-group">
                                        <label>Describe your project in detail:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" required name="prod_details"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Please add any reference links to help suppliers understand what you’re
                                            looking
                                            for:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="ref_links"></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label>Do you need a custom sample before ordering bulk?</label>
                                        <select name="need_smaple_query" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>How many units would you like to produce?</label>
                                        <select name="units_to_produce" class="form-control" required>
                                            <option value="50-250">50-250</option>
                                            <option value="250-500">250-500</option>
                                            <option value="500-1000">500-1000</option>
                                            <option value="1000+">1000+</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>When do you want to launch this product?</label>
                                        <select name="launch_time" class="form-control" required>
                                            <option value="1 - 3 months">1 - 3 months</option>
                                            <option value="3 -6 months">3 -6 months</option>
                                            <option value="6 - 12 months">6 - 12 months</option>
                                            <option value="12+ months">12+ months</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>What is your budget?</label>
                                        <select name="budget" class="form-control" required>
                                            <option value="<$500">
                                                <$500 </option>
                                            <option value="$500 - 1,000">$500 - 1,000</option>
                                            <option value="$1,000 - 5,000">$1,000 - 5,000</option>
                                            <option value="$5,000 - 10,000">$5,000 - 10,000</option>
                                            <option value="$10,000 - 20,000">$10,000 - 20,000</option>
                                            <option value="$20,000+">$20,000+</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Factory Requirements:</label>
                                        <select name="factory_requirements" class="form-control" required>
                                            <option value="Made in America Only">Made in America Only</option>
                                            <option value="Any factory that meets my requirements">Any factory that meets
                                                my
                                                requirements</option>
                                        </select>
                                    </div>


                                    <center>
                                        <button class="btn btn-danger px-5">Upload RFP</button>
                                    </center>



                                </form>


                            </div>
                        </div>








                        <div class="portal_line">
                            <h3 class="headline_text">
                                Your All Created RFP and Responses
                            </h3>

                            <div class="item_grid_4">


                                @forelse ($all__related_rfps as $item)
                                    <div class="item_grid_line">
                                        <div class="prod_item_img_holder">
                                            @php
                                                $images = explode('|', $item->rfp_images);
                                                foreach ($images as $key => $imgsrc) {
                                                    if ($key < 1) {
                                                        echo '<img src="' . $imgsrc . '" alt="" class="item_img">';
                                                    }
                                                }
                                            @endphp

                                        </div>
                                        <p class="prod_item_title">{{ $item->title }}</p>
                                        <p class="item_category">Total Responses: {{ $item->total_bids }}</p>
                                        <a href="/view-or-edit-rpf/{{ $item->sno }}/{{ $item->category }}/{{ $item->title }}"
                                            class="btn px-4 mb-2 btn-sm btn-dark">View</a>
                                        <a href="/delete-rpf/{{ $item->sno }}/{{ $item->category }}/{{ $item->title }}"
                                            class="btn px-4 mb-2 ml-2 btn-sm btn-danger">Delete</a>
                                    </div>

                                @empty
                                    <h3 class="text-center font-weight-bold text-danger">No RFP Is Created Yet!</h3>
                                @endforelse

                            </div>
                        </div>






                    </div>


                </div>





            </div>


        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".add_rfp").addClass("active");
        let table = new DataTable('#order_table');
    </script>
@endsection
