@extends('entrepreneurs.layouts.app')

@section('title')
    {{ $vendor_name }} - {{ $vendortype }} | {{ $appname }}
@endsection

@section('content')
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


                        <h2 class="centered_text"> {{ $vendor_name }}'s Profile </h2>

                        <div class="portal_line">

                            @forelse ($profile_data as $item)
                                <div class="row border_bottom">
                                    <div class="col-md-5">
                                        <div class="prod_img_holder">
                                            <img src="{{ $item->company_logo }}" class="prod_img">
                                        </div>

                                    </div>

                                    <div class="col-md-7 left_side_border">
                                        <h3 class="headline_text text-danger">
                                            {{ $item->business_name }}
                                        </h3>

                                        <div class="detail_title mt-3">Company Bio:</div>
                                        <pre class="prod_desc">{!! $item->comp_bio !!}</pre>
                                        <button class="btn btn-sm btn-dark px-2" onclick="seemore(this)">
                                            Read More
                                        </button>

                                        <div class="more_details"><span class="detail_title">Country: </span> <span
                                                class="detail_amount">{{ $item->country }}</span> </div>

                                        <div class="more_details"><span class="detail_title">State: </span> <span
                                                class="detail_amount">{{ $item->state }}</span> </div>


                                        <div class="more_details"><span class="detail_title">Create & ship samples Time:
                                            </span>
                                            <span class="detail_amount">{{ $item->create_n_ship_time }} Days</span>
                                        </div>

                                        <div class="more_details"><span class="detail_title">Typical Run Time:
                                            </span>
                                            <span class="detail_amount">{{ $item->typical_run_time }} Days</span>
                                        </div>

                                        <div class="more_details"><span class="detail_title">Average Yearly Sales:
                                            </span>
                                            <span class="detail_amount">${{ $item->avg_yearly_sales }}</span>
                                        </div>

                                        <div class="more_details"><span class="detail_title">Total Citations:
                                            </span>
                                            <span class="detail_amount">{{ $item->tot_citations }}</span>
                                        </div>

                                        <div class="more_details"><span class="detail_title">Notable Projects:
                                            </span>
                                            <span class="detail_amount">{{ $item->notable_projects }}</span>
                                        </div>


                                        <div class="mt-3">
                                            <a href="/contact/menufacturer/{{ $item->business_name }}/{{ $item->vendor_user_id }}"
                                                class="btn px-3 mt-2 btn-primary">Conatct Menufacturer</a>
                                        </div>

                                    </div>

                                </div>

                                <h2 class="centered_text"> {{ $vendor_name }}'s Project Gallery </h2>

                                <div id="multple_gallery_4">
                                    @php
                                        $images = explode('|', $item->project_gallery);
                                        foreach ($images as $key => $imgsrc) {
                                            echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                        }
                                    @endphp
                                </div>

                            @empty
                                <h3 class="text-center text-danger font-weight-bold">No Match</h3>
                            @endforelse

                        </div>




                        <h2 class="centered_text mt-5 mb-0"> All Services Of - {{ $vendor_name }} </h2>
                        <div class="portal_line">

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
        // $(".home").addClass("active");
        var prod_desc = $(".prod_desc").html();
        var shor_desc = prod_desc.substring(0, 100);
        $(".prod_desc").html(shor_desc + "...");

        function seemore(passedThis) {
            $(".prod_desc").html(prod_desc);
            $(passedThis).remove();
        }
    </script>
@endsection
