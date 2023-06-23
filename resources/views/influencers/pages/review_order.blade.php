@extends('influencers.layouts.app')

@section('title')
    Review Product | {{ $appname }}
@endsection

@section('content')
    <style>
        .page-body {
            background: -moz-linear-gradient(-45deg, #e67e22 0%, #f39c12 100%);
            background: -webkit-linear-gradient(-45deg, #e67e22 0%, #f39c12 100%);
            background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%);
            height: auto;
            min-height: calc(100vh);
            font-family: 'Lato', sans-serif;
            font-weight: 500;
        }
    </style>
    <!-- // main webpage content is here  -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">



                        <div id="wrapper">
                            <div id="container">
                                <div id="left-col">
                                    <div id="left-col-cont">
                                        <h2>Review Order</h2>

                                        @forelse ($order_details as $item)
                                            <div class="item">
                                                <div>
                                                    <img src="{{ $item->prod_image }}" alt="" class="item_img">
                                                </div>
                                                <div>
                                                    <p class="prod_item_title">{{ $item->prod_name }}</p>
                                                    <p class="tot_amount_para">Per Unit Cost: ${{ $item->cost_per_unit }}
                                                    </p>
                                                    <p class="tot_amount_para">Total Amount: {{ $item->amount }}</p>
                                                    <p class="tot_amount_para">Delivery Time:
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->delivered_at)->format('d M, Y') }}
                                                    </p>
                                                    <p class="tot_amount_para">Ordered At: 
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->ordered_at)->format('d M, Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse

                                        <p id="total">Total</p>
                                        <h4 id="total-price"><span>$</span> {{ $item->total_cost }}</h4>
                                    </div>
                                </div>
                                <div id="right-col">
                                    <div class="w-100">

                                        @if (session()->has('alertMsg'))
                                            <div class="alert text-center {{ session()->get('type') }} alert-dismissible fade show"
                                                role="alert">
                                                {{ session()->get('alertMsg') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @if ($review == '')
                                            <h2>Share Us Your Experience</h2>
                                            <div class="">
                                                <form action="/review-the-product" method="post">
                                                    @csrf
                                                    <input type="hidden" name="review_on_order" value="{{ $order_serial }}">
                                                    <input type="hidden" name="review_on_product" value="{{ $prod_serial }}">
                                                    <input type="hidden" class="review_stars" name="review_stars"
                                                        value="5">

                                                    <div class="review_star_icons">
                                                        <i class="fa fa-star text-warning review_icon"
                                                            onclick="review_point(1)"></i>
                                                        <i class="fa fa-star text-warning review_icon"
                                                            onclick="review_point(2)"></i>
                                                        <i class="fa fa-star text-warning review_icon"
                                                            onclick="review_point(3)"></i>
                                                        <i class="fa fa-star text-warning review_icon"
                                                            onclick="review_point(4)"></i>
                                                        <i class="fa fa-star text-warning review_icon"
                                                            onclick="review_point(5)"></i>
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" required name="review_text"
                                                            placeholder="Share Your Esperience"></textarea>
                                                    </div>

                                                    <center>
                                                        <button class="btn btn-block btn-lg btn-dark">Upload Review</button>
                                                    </center>
                                                </form>
                                            </div>
                                        @else
                                            <div class="your_review_side">
                                                <h2>Your Shared Review </h2>
                                                <div class="review">Your Rating: </div>
                                                <div class="review_star_icons">
                                                    <i class="fa fa-star text-warning review_icon"></i>
                                                    <i class="fa fa-star text-warning review_icon"></i>
                                                    <i class="fa fa-star text-warning review_icon"></i>
                                                    <i class="fa fa-star text-warning review_icon"></i>
                                                    <i class="fa fa-star text-warning review_icon"></i>
                                                </div>


                                                <div class="review">Your Review: </div>
                                                <div class="your_review">
                                                    {{ $review }}
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
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
        review_point({{ $stars }});
    </script>
@endsection
