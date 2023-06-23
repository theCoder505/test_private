@extends('menufacturers.layouts.app')

@section('title')
    All RFP's | {{ $appname }}
@endsection

@section('content')
    <style>
        .portal_line {
            width: 100%;
            overflow-x: auto;
        }

        .prod_item_img_holder {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 200px;
            height: 200px;
            margin: 0px auto;
            border: 2px solid #000;
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


                        <h2 class="centered_text">Specific RFP Details </h2>

                        <div class="portal_line">



                            @forelse ($spec_rfp as $item)
                                <div class="row container">
                                    <div class="col-md-4">
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


                                        <div class="item_grid_4 mt-5">
                                            @php
                                                $images = explode('|', $item->rfp_images);
                                                foreach ($images as $key => $imgsrc) {
                                                    if ($key < 1) {
                                                        echo '<div class="gallery_line activated_line" onclick="showSpecImage(this)"><img src="' . $imgsrc . '"/></div>';
                                                    } else {
                                                        echo '<div class="gallery_line" onclick="showSpecImage(this)"><img src="' . $imgsrc . '"/></div>';
                                                    }
                                                }
                                            @endphp
                                        </div>

                                    </div>

                                    <div class="col-md-8">
                                        <p class="prod_item_title"><button class="btn btn-sm px-4 btn-danger uppercase">
                                                {{ $item->rfp_creator_type }}'s RFP
                                            </button>
                                        </p>
                                        <br>

                                        <p class="prod_item_title">{{ $item->title }}</p>
                                        <p class="item_category">Category: {{ $item->category }}</p>
                                        <p class="item_category">Description: <br>
                                            <pre class="prod_desc">{!! $item->description !!}</pre>
                                        </p>
                                        <p class="item_category">Refference Links: <br>
                                            <pre class="prod_desc">{!! $item->ref_links !!}</pre>
                                        </p>
                                        <p class="item_category">Do vendor need a custom sample before ordering bulk?:
                                            {{ $item->sample_query }}</p>
                                        <p class="item_category">How many units would vendor like to produce?:
                                            {{ $item->units }}</p>
                                        <p class="item_category">When vendor wants to launch this product?
                                            {{ $item->launch_time }}</p>
                                        <p class="item_category">Budget: {{ $item->budget }}</p>
                                        <p class="item_category">Factory Requirements: {{ $item->requirement }}</p>


                                    </div>

                                    <div class="col-12">
                                        @if ($check > 0)
                                            <p class="item_category mt-5">Your Response: <br>
                                                <pre class="prod_desc">{!! $response !!}</pre>
                                            </p>
                                        @else
                                            <form action="/add-response-on-rfp" method="post">
                                                @csrf
                                                <input type="hidden" name="bid_over" value="{{ $item->sno }}">
                                                <input type="hidden" name="rfp_for_user_type"
                                                    value="{{ $item->rfp_creator_type }}">
                                                <input type="hidden" name="rfp_for_user_id"
                                                    value="{{ $item->rfp_creator_id }}">
                                                <input type="hidden" name="rfp_images" value="{{ $item->rfp_images }}">
                                                <input type="hidden" name="total_bids" value="{{ $item->total_bids }}">
                                                <div class="form-group">
                                                    <label for="">Add Your Response</label>
                                                    <textarea name="user_response" class="form-control" rows="7"></textarea>
                                                </div>

                                                <center>
                                                    <button class="btn btn-dark btn-lg btn-block px-5">Bid Now</button>
                                                </center>
                                            </form>
                                        @endif

                                    </div>
                                </div>

                            @empty
                            @endforelse

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
        $(".rfp_requests").addClass("active");
    </script>
@endsection
