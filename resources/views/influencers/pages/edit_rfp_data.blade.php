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


                                @forelse ($particular_rfp_data as $item)
                                    <form action="/influencer/edit-particular-rfp-post" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="edit_rfp_sno" value="{{ $rfp_serial }}">
                                        <input type="hidden" name="edit_rfp_category" value="{{ $rfp_category }}">
                                        <input type="hidden" name="edit_rfp_title" value="{{ $rfp_title }}">

                                        <div class="form-group">
                                            <label>Product Category For Request</label>
                                            <select name="prod_cat" class="form-control" required>
                                                <option @if ($item->category == 'Apparel') selected @endif value="Apparel">
                                                    Apparel</option>
                                                <option @if ($item->category == 'Babby And Toddler') selected @endif
                                                    value="Babby And Toddler">Babby And Toddler</option>
                                                <option @if ($item->category == 'Beauty') selected @endif value="Beauty">
                                                    Beauty</option>
                                                <option @if ($item->category == 'Beverage') selected @endif value="Beverage">
                                                    Beverage</option>
                                                <option @if ($item->category == 'Candles') selected @endif value="Candles">
                                                    Candles</option>
                                                <option @if ($item->category == 'Cleaning Supplies') selected @endif
                                                    value="Cleaning Supplies">Cleaning Supplies</option>
                                                <option @if ($item->category == 'Coffie & Tea') selected @endif
                                                    value="Coffie & Tea">Coffie & Tea</option>
                                                <option @if ($item->category == 'Condiments') selected @endif
                                                    value="Condiments">Condiments</option>
                                                <option @if ($item->category == 'Fashion Accessories') selected @endif
                                                    value="Fashion Accessories">Fashion Accessories</option>
                                                <option @if ($item->category == 'Fitness') selected @endif value="Fitness">
                                                    Fitness</option>
                                                <option @if ($item->category == 'Foods') selected @endif value="Foods">
                                                    Foods</option>
                                                <option @if ($item->category == 'Fragnance') selected @endif
                                                    value="Fragnance">Fragnance</option>
                                                <option @if ($item->category == 'Home Goods') selected @endif
                                                    value="Home Goods">Home Goods</option>
                                                <option @if ($item->category == 'Jewellery') selected @endif
                                                    value="Jewellery">Jewellery</option>
                                                <option @if ($item->category == 'Leather Goods') selected @endif
                                                    value="Leather Goods">Leather Goods</option>
                                                <option @if ($item->category == 'Merch') selected @endif value="Merch">
                                                    Merch</option>
                                                <option @if ($item->category == 'Pet') selected @endif value="Pet">
                                                    Pet</option>
                                                <option @if ($item->category == 'Paper Goods') selected @endif
                                                    value="Paper Goods">Paper Goods</option>
                                                <option @if ($item->category == 'Shoes') selected @endif value="Shoes">
                                                    Shoes</option>
                                                <option @if ($item->category == 'Smooking Accessories') selected @endif
                                                    value="Smooking Accessories">Smooking Accessories</option>
                                                <option @if ($item->category == 'Sweets') selected @endif value="Sweets">
                                                    Sweets</option>
                                                <option @if ($item->category == 'Swimwears') selected @endif
                                                    value="Swimwears">Swimwears</option>
                                                <option @if ($item->category == 'Tech Gadgeets') selected @endif
                                                    value="Tech Gadgeets">Tech Gadgeets</option>
                                                <option @if ($item->category == 'Toys') selected @endif value="Toys">
                                                    Toys</option>
                                                <option @if ($item->category == 'Toys & Games') selected @endif
                                                    value="Toys & Games">Toys & Games</option>
                                                <option @if ($item->category == 'Wellness') selected @endif
                                                    value="Wellness">Wellness</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Product Title</label>
                                            <input type="text" class="form-control" name="product_title"
                                                value="{{ $item->title }}" required>
                                        </div>


                                        <div class="form-group">
                                            <label> Please upload reference photos and/or design files for your supplier:
                                            </label>
                                            <input type="file" class="form-control" name="product_image[]"
                                                accept="image/*" multiple onchange="showMultipleImages(this)">
                                        </div>

                                        <div id="multple_gallery">
                                            @php
                                                $images = explode('|', $item->rfp_images);
                                                foreach ($images as $key => $imgsrc) {
                                                    echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                                }
                                            @endphp
                                        </div>


                                        <div class="form-group">
                                            <label>Describe your project in detail:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" required name="prod_details">{{ $item->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Please add any reference links to help suppliers understand what you’re
                                                looking
                                                for:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="ref_links">{{ $item->ref_links }}</textarea>
                                        </div>



                                        <div class="form-group">
                                            <label>Do you need a custom sample before ordering bulk?</label>
                                            <select name="need_smaple_query" class="form-control" required>
                                                <option @if ($item->sample_query == 'Yes') selected @endif value="Yes">
                                                    Yes</option>
                                                <option @if ($item->sample_query == 'No') selected @endif value="No">
                                                    No</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>How many units would you like to produce?</label>
                                            <select name="units_to_produce" class="form-control" required>
                                                <option @if ($item->units == '50-250') selected @endif value="50-250">
                                                    50-250</option>
                                                <option @if ($item->units == '250-500') selected @endif value="250-500">
                                                    250-500</option>
                                                <option @if ($item->units == '500-1000') selected @endif
                                                    value="500-1000">500-1000</option>
                                                <option @if ($item->units == '1000+') selected @endif value="1000+">
                                                    1000+</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>When do you want to launch this product?</label>
                                            <select name="launch_time" class="form-control" required>
                                                <option @if ($item->launch_time == '1 - 3 months') selected @endif
                                                    value="1 - 3 months">1 - 3 months</option>
                                                <option @if ($item->launch_time == '3 -6 months') selected @endif
                                                    value="3 -6 months">3 -6 months</option>
                                                <option @if ($item->launch_time == '6 - 12 months') selected @endif
                                                    value="6 - 12 months">6 - 12 months</option>
                                                <option @if ($item->launch_time == '12+ months') selected @endif
                                                    value="12+ months">12+ months</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>What is your budget?</label>
                                            <select name="budget" class="form-control" required>
                                                <option @if ($item->budget == '<$500') selected @endif value="<$500">
                                                    <$500 </option>
                                                <option @if ($item->budget == '$500 - 1,000') selected @endif
                                                    value="$500 - 1,000">$500 - 1,000</option>
                                                <option @if ($item->budget == '$1,000 - 5,000') selected @endif
                                                    value="$1,000 - 5,000">$1,000 - 5,000</option>
                                                <option @if ($item->budget == '$5,000 - 10,000') selected @endif
                                                    value="$5,000 - 10,000">$5,000 - 10,000</option>
                                                <option @if ($item->budget == '$10,000 - 20,000') selected @endif
                                                    value="$10,000 - 20,000">$10,000 - 20,000</option>
                                                <option @if ($item->budget == '$20,000+') selected @endif
                                                    value="$20,000+">$20,000+</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Factory Requirements:</label>
                                            <select name="factory_requirements" class="form-control" required>
                                                <option @if ($item->requirement == 'Made in America Only') selected @endif
                                                    value="Made in America Only">Made in America Only</option>
                                                <option @if ($item->requirement == 'Any factory that meets my requirements') selected @endif
                                                    value="Any factory that meets my requirements">
                                                    Any factory that meets my requirements
                                                </option>
                                            </select>
                                        </div>


                                        <button class="btn btn-dark px-5">Update RFP</button>
                                        <a href="/influencer/see-rfp-responses/{{ $rfp_serial }}/{{ $rfp_category }}/{{ $rfp_title }}"
                                            class="btn btn-info ml-3 px-5">See Responses</a>



                                    </form>


                                @empty
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
