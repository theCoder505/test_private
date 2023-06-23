@extends('entrepreneurs.layouts.app')

@section('title')
    Find Vendors From {{ $appname }}
@endsection

@section('content')
    <!-- // main webpage content is here  -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <h2 class="centered_text">Welcome back to {{ $appname }} </h2>

                        <div class="portal_line">
                            <h3 class="headline_text">
                                Find Suppliers/Menufacturers From {{ $appname }}
                            </h3>

                            <div class="item_grid_4">


                                @forelse ($all_products as $item)
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
                                            <a href="/entrepreneur/see-product/{{ $item->sno }}/{{ $item->product_category }}/{{ $item->item_name }}"
                                                class="continue_btn">See Product</a>
                                        </center>
                                    </div>

                                @empty
                                @endforelse

                            </div>
                        </div>





                        <div class="portal_line">
                            <h3 class="headline_text">
                                Find Influencers From {{ $appname }}
                            </h3>

                            <div class="item_grid_4">


                                @forelse ($all_inflncr_products as $item)
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
                                            <a href="/entrepreneur/see-product/{{ $item->sno }}/{{ $item->product_category }}/{{ $item->item_name }}"
                                                class="continue_btn">See Product</a>
                                        </center>
                                    </div>

                                @empty
                                @endforelse

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
        $(".home").addClass("active");
    </script>
@endsection
