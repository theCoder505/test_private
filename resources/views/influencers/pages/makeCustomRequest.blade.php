@extends('influencers.layouts.app')

@section('title')
    Add New Custom Project To {{ $appname }}
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

                        <h2 class="centered_text"> Add New Custom Project For entrepreneur </h2>

                        <div class="portal_line">

                            <div id="complete_profile">
                                <form action="/influencer/new-custom-project-add" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label> Requesting Product Image </label>
                                        <input type="file" class="form-control" required name="project_photos[]"
                                            accept="image/*" multiple onchange="showMultipleImages(this)">
                                    </div>

                                    <div id="multple_gallery"></div>


                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" class="form-control" required name="item_name">
                                    </div>

                                    <div class="form-group">
                                        <label>Describe The Product</label>
                                        <textarea class="form-control" id="comp_bio" name="prod_desc" rows="3" required></textarea>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Sample Price (In $) </label>
                                                <input type="number" class="form-control" required name="sample_price">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Sample MOQ <small class="text-danger">Input the number of units the
                                                        sample contains. This is usually "1".</small> </label>
                                                <input type="number" class="form-control" required name="sample_moq">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> What will the Influencer receive? </label>
                                                <input type="text" class="form-control" required name="what_receives">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Production Per Unit Cost (In $) </label>
                                                <input type="number" class="form-control" required name="prod_unit_cost">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Production MOQ</label>
                                                <input type="number" class="form-control" required name="prod_mcq">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="product_category" id="" class="form-control">
                                            <option value="Category Option 1">Category Option 1</option>
                                            <option value="Category Option 2">Category Option 2</option>
                                            <option value="Category Option 3">Category Option 3</option>
                                            <option value="Category Option 4">Category Option 4</option>
                                            <option value="Category Option 5">Category Option 5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Sku Number <small class="text-danger">This is used for your personal item
                                                management and is not visible to your customer.</small> </label>
                                        <input type="number" class="form-control" required name="skunumber">
                                    </div>


                                    <center>
                                        <button class="btn btn-dark px-5">Add Product</button>
                                    </center>

                                </form>
                            </div>

                        </div>




                        <h3 class="headline_text mt-5">
                            All Your {{ $appname }} Custom Project Request
                        </h3>

                        <div class="all_added_projects">
                            @forelse ($all_cstm_products as $key => $item)
                                <div class="product_line">
                                    <div class="img_holder">
                                        @php
                                            $images = explode('|', $item->project_photos);
                                            foreach ($images as $key => $imgsrc) {
                                                if ($key < 1) {
                                                    echo '<img src="' . $imgsrc . '" class="prod_img">';
                                                }
                                            }
                                        @endphp
                                    </div>
                                    <div class="prod_title">{{ Str::limit($item->item_name, 150) }}...</div>
                                    <a href="/influencer/edit-custom-request-product/{{ $item->sno }}" class="btn btn-dark btn-block">
                                        View Product
                                    </a>
                                    <button
                                        onclick="copyUrl('{{ url('/') }}/for-entrepreneur/see-custom-product/{{ $item->sno }}/{{ $item->product_category }}/{{ $item->item_name }}')"
                                        class="btn btn-info btn-block">
                                        Copy Product URL
                                    </button>
                                </div>
                            @empty
                                <h3 class="text-center font-weight-bold text-danger">No Product Yet!</h3>
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
        $(".custom_reqs").addClass("active");
    </script>
@endsection
