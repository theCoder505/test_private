@extends('menufacturers.layouts.app')

@section('title')
    Setup Your Profile At {{ $appname }}
@endsection

@section('content')
    <style>
        .portal_line {
            padding: 50px;
            border-radius: 15px;
            border: 2px solid #000 !important;
            background: #fff;
        }
    </style>


    <!-- // main webpage content is here  -->
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

                        <h2 class="centered_text"> Setup Your Profile At {{ $appname }} </h2>

                        <div class="portal_line">
                            <h3 class="headline_text">
                                Complete Your {{ $appname }} Profile
                            </h3>


                            @forelse ($vendor_data as $item)
                                @php
                                    $company_logo = $item->company_logo;
                                    $business_name = $item->business_name;
                                    $comp_bio = $item->comp_bio;
                                    $pdf_file = $item->pdf_file;
                                    $phone_number = $item->phone_number;
                                    $partner_account = $item->partner_account;
                                    $attributes = $item->attributes;
                                    $industry_options = $item->industry_options;
                                    $country = $item->country;
                                    $state = $item->state;
                                    $create_n_ship_time = $item->create_n_ship_time;
                                    $typical_run_time = $item->typical_run_time;
                                    $avg_yearly_sales = $item->avg_yearly_sales;
                                    $notable_projects = $item->notable_projects;
                                    $linkedin_url = $item->linkedin_url;
                                    $website_url = $item->website_url;
                                    $project_gallery = $item->project_gallery;
                                @endphp
                            @empty
                                @php
                                    $company_logo = asset('vendor/assets/images/user.jpg');
                                    $business_name = '';
                                    $comp_bio = '';
                                    $pdf_file = '';
                                    $phone_number = '';
                                    $partner_account = '';
                                    $attributes = '';
                                    $industry_options = '';
                                    $country = '';
                                    $state = '';
                                    $create_n_ship_time = '';
                                    $typical_run_time = '';
                                    $avg_yearly_sales = '';
                                    $notable_projects = '';
                                    $linkedin_url = '';
                                    $website_url = '';
                                    $project_gallery = '';
                                @endphp
                            @endforelse



                            <div id="complete_profile">
                                <form action="/menufacturer/complete-user-profile" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <center>
                                        <img src="{{ $company_logo }}" id="logo_pic" alt="Company Logo"
                                            class="user_comp_logo" onclick="clickToChangeLogo(this)">
                                    </center>
                                    <input type="file" class="comp_logo_input d-none" name="user_comp_logo"
                                        accept="image/*" oninput="logo_pic.src=window.URL.createObjectURL(this.files[0])">


                                    <div class="form-group">
                                        <label>Business Name For Your Profile</label>
                                        <input type="text" class="form-control" required value="{{ $business_name }}"
                                            name="business_name">
                                    </div>

                                    <div class="form-group">
                                        <label>Company Bio</label>
                                        <textarea class="form-control" id="comp_bio" name="comp_bio" rows="3" required>{{ $comp_bio }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Company Catalog PDF
                                            @if ($pdf_file != '')
                                                ( <a class="text-primary" href="{{ $pdf_file }}" download>See PDF</a> )
                                            @endif
                                        </label>

                                        <input type="file" class="form-control" name="comp_pdf" accept=".doc,.docx,.pdf">
                                    </div>

                                    <div class="form-group">
                                        <label> Contact Phone Number </label>
                                        <input type="text" class="form-control" required value="{{ $phone_number }}"
                                            name="phone_number" maxlength="15">
                                    </div>

                                    <div class="text-dark font-weight-bold mt-3">Type of Partner Account</div>
                                    <div class="form-check">
                                        <input class="" type="radio"
                                            @if ($partner_account == 'option1') checked @endif name="partnerType"
                                            id="partnerType1" value="option1">
                                        <label class="form-check-label" for="partnerType1">
                                            I am a manufacturer who sells physical products
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="" type="radio" name="partnerType" id="partnerType2"
                                            value="option2" @if ($partner_account == 'option2') checked @endif>
                                        <label class="form-check-label" for="partnerType2">
                                            I am a specialist or service provider
                                        </label>
                                    </div>



                                    <div class="text-dark font-weight-bold my-3">Your Attributes </div>

                                    <div class="row px-3">
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check1"
                                                value="10+ Years in Business" name="attribute[]"
                                                @if (strpos($attributes, '10+ Years in Business') !== false) checked @endif>
                                            <label class="form-check-label" for="check1">10+ Years in Business</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check2"
                                                value="Packaging Options Available" name="attribute[]"
                                                @if (strpos($attributes, 'Packaging Options Available') !== false) checked @endif>
                                            <label class="form-check-label" for="check2">Packaging Options
                                                Available</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check3"
                                                value="Private Label Products" name="attribute[]"
                                                @if (strpos($attributes, 'Private Label Products') !== false) checked @endif>
                                            <label class="form-check-label" for="check3">Private Label Products</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check4" value="Female Owned"
                                                name="attribute[]" @if (strpos($attributes, 'Female Owned') !== false) checked @endif>
                                            <label class="form-check-label" for="check4">Female Owned</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check5" value="BIPOC Owned"
                                                name="attribute[]" @if (strpos($attributes, 'BIPOC Owned') !== false) checked @endif>
                                            <label class="form-check-label" for="check5">BIPOC Owned</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check6"
                                                value="Sustainable Materials" name="attribute[]"
                                                @if (strpos($attributes, 'Sustainable Materials') !== false) checked @endif>
                                            <label class="form-check-label" for="check6">Sustainable Materials</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check7" value="Low MOQs"
                                                name="attribute[]" @if (strpos($attributes, 'Low MOQs') !== false) checked @endif>
                                            <label class="form-check-label" for="check7">Low MOQs</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check8"
                                                value="Contract Manufacturer" name="attribute[]"
                                                @if (strpos($attributes, 'Contract Manufacturer') !== false) checked @endif>
                                            <label class="form-check-label" for="check8">Contract Manufacturer</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check9"
                                                value="48 Hour Production Times" name="attribute[]"
                                                @if (strpos($attributes, '48 Hour Production Times') !== false) checked @endif>
                                            <label class="form-check-label" for="check9">48 Hour Production
                                                Times</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check10"
                                                value="Capacity for 25k+ Units" name="attribute[]"
                                                @if (strpos($attributes, 'Capacity for 25k+ Units') !== false) checked @endif>
                                            <label class="form-check-label" for="check10">Capacity for 25k+ Units</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check11" value="Vegan"
                                                name="attribute[]" @if (strpos($attributes, 'Vegan') !== false) checked @endif>
                                            <label class="form-check-label" for="check11">Vegan</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check12"
                                                value="All Natural Ingredients" name="attribute[]"
                                                @if (strpos($attributes, 'All Natural Ingredients') !== false) checked @endif>
                                            <label class="form-check-label" for="check12">All Natural Ingredients</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check13"
                                                value="Certified Organic" name="attribute[]"
                                                @if (strpos($attributes, 'Certified Organic') !== false) checked @endif>
                                            <label class="form-check-label" for="check13">Certified Organic</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check14" value="FDA Approved"
                                                name="attribute[]" @if (strpos($attributes, 'FDA Approved') !== false) checked @endif>
                                            <label class="form-check-label" for="check14">FDA Approved</label>
                                        </div>
                                        <div class=" col-md-4">
                                            <input class="" type="checkbox" id="check15" value="Fine Jewelry"
                                                name="attribute[]" @if (strpos($attributes, 'Fine Jewelry') !== false) checked @endif>
                                            <label class="form-check-label" for="check15">Fine Jewelry</label>
                                        </div>

                                    </div>


                                    <div class="text-dark font-weight-bold my-3"> Select industries, you are related with:
                                    </div>
                                    <div class="row px-3">

                                        @forelse ($industries as $key22 => $industries)
                                            <div class=" col-md-4">
                                                <input class="" type="checkbox" id="industry{{ $key22 }}"
                                                    value="{{ $industries->option_name }}" name="industries_data[]"
                                                    @if (strpos($industry_options, $industries->option_name) !== false) checked @endif>
                                                <label class="form-check-label"
                                                    for="industry{{ $key22 }}">{{ $industries->option_name }}</label>
                                            </div>
                                        @empty
                                        @endforelse

                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Country/Region</label>
                                                <input type="text" class="form-control" required
                                                    value="{{ $country }}" name="country_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> State </label>
                                                <input type="text" class="form-control" required
                                                    value="{{ $state }}" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> How long does it take to create & ship samples to
                                                    customers after purchase? (In Days) </label>
                                                <input type="number" class="form-control" required
                                                    value="{{ $create_n_ship_time }}" name="timeforcreateship">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> How long does it take to complete a typical
                                                    production run? (In Days) </label>
                                                <input type="number" class="form-control" required
                                                    value="{{ $typical_run_time }}" name="prod_full_time">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> What is your average yearly sales? (In $)
                                                </label>
                                                <input type="number" class="form-control" required
                                                    value="{{ $avg_yearly_sales }}" name="avg_yearly_sale">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label> LinkedIn URL </label>
                                        <input type="text" class="form-control" required
                                            value="{{ $linkedin_url }}" name="linkedin_url">
                                    </div>

                                    <div class="form-group">
                                        <label> Website URL </label>
                                        <input type="text" class="form-control" required
                                            value="{{ $website_url }}" name="website_url">
                                    </div>

                                    <div class="form-group">
                                        <label> Notable Past Projects or Clients </label>
                                        <input type="text" class="form-control" required
                                            value="{{ $notable_projects }}" name="notable_projects_n_clients">
                                    </div>

                                    <div class="form-group">
                                        <label> Past Projects Gallery </label>
                                        <input type="file" class="form-control" name="past_project_gallery[]"
                                            accept="image/*" multiple onchange="showMultipleImages(this)">
                                    </div>

                                    <div id="multple_gallery">
                                        @php
                                            if ($project_gallery != '') {
                                                $images = explode('|', $project_gallery);
                                                foreach ($images as $key => $imgsrc) {
                                                    echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                                }
                                            }
                                        @endphp
                                    </div>


                                    <center>
                                        <button class="btn btn-dark px-5">Complete Profile</button>
                                    </center>


                                </form>



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
        $(".profile").addClass("active");
    </script>
@endsection
