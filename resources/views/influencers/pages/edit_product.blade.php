@extends('influencers.layouts.app')

@section('title')
    Edit/Update Project {{ $appname }}
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

                        <h2 class="centered_text"> View/Update Particular Project </h2>

                        <div class="portal_line">

                            @forelse ($vendor_product_data as $item)
                                <div id="complete_profile">
                                    <form action="/menufacturer/edit-existing-product" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label> Projects Photos </label>
                                            <input type="file" class="form-control" name="project_photos[]"
                                                accept="image/*" multiple onchange="showMultipleImages(this)">
                                        </div>

                                        <div id="multple_gallery">
                                            @php
                                                if ($item->project_photos != '') {
                                                    $images = explode('|', $item->project_photos);
                                                    foreach ($images as $key => $imgsrc) {
                                                        echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                                    }
                                                }
                                            @endphp
                                        </div>

                                        <input type="hidden" name="product_id" value="{{ $item->sno }}">


                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" required
                                                value="{{ $item->item_name }}" name="item_name">
                                        </div>

                                        <div class="form-group">
                                            <label>Describe The Product</label>
                                            <textarea class="form-control" id="comp_bio" name="prod_desc" rows="3" required>{{ $item->prod_desc }}</textarea>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Sample Price (In $) </label>
                                                    <input type="number" class="form-control" required
                                                        value="{{ $item->sample_price }}" name="sample_price">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Sample MOQ <small class="text-warning">Input the number of units
                                                            the
                                                            sample contains. This is usually "1".</small> </label>
                                                    <input type="number" class="form-control" required
                                                        value="{{ $item->sample_moq }}" name="sample_moq">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> What will the Influencer receive? </label>
                                                    <input type="text" class="form-control" required
                                                        value="{{ $item->what_receives }}" name="what_receives">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> Production Per Unit Cost (In $) </label>
                                                    <input type="number" class="form-control" required
                                                        value="{{ $item->prod_unit_cost }}" name="prod_unit_cost">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> Production MOQ</label>
                                                    <input type="number" class="form-control" required
                                                        value="{{ $item->prod_mcq }}" name="prod_mcq">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="product_category" id="" class="form-control">
                                                <option @if ($item->product_category == 'Category Option 1') selected @endif
                                                    value="Category Option 1">Category Option 1</option>
                                                <option @if ($item->product_category == 'Category Option 2') selected @endif
                                                    value="Category Option 2">Category Option 2</option>
                                                <option @if ($item->product_category == 'Category Option 3') selected @endif
                                                    value="Category Option 3">Category Option 3</option>
                                                <option @if ($item->product_category == 'Category Option 4') selected @endif
                                                    value="Category Option 4">Category Option 4</option>
                                                <option @if ($item->product_category == 'Category Option 5') selected @endif
                                                    value="Category Option 5">Category Option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label> Sku Number <small class="text-warning">This is used for your personal
                                                    item
                                                    management and is not visible to your customer.</small> </label>
                                            <input type="number" class="form-control" required
                                                value="{{ $item->skunumber }}" name="skunumber">
                                        </div>


                                        <center>
                                            <button class="btn btn-dark px-5">Update Product</button>
                                        </center>

                                    </form>
                                </div>

                            @empty
                            @endforelse

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".products").addClass("active");
    </script>
@endsection
