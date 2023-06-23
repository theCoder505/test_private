@extends('entrepreneurs.layouts.app')

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

        .user_comp_logo {
            margin: 15px auto;
            text-align: center;
            border: 0px;
            border-radius: 0%;
            width: 200px;
            height: auto;
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
                                <form action="/entrepreneur/complete-user-profile" method="post"
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
                                        <input type="number" class="form-control" required value="{{ $phone_number }}"
                                            name="phone_number" maxlength="15">
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

                                    <div class="row my-2">
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
