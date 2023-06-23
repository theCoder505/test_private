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


                        <h2 class="centered_text">All Request for proposals (RFP) from {{ $appname }} </h2>

                        <div class="portal_line">

                            <div class="item_grid_4">


                                @forelse ($all_rfps as $item)
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
                                        <p class="item_category">Category: {{ $item->category }}</p>
                                        <center>
                                            <a href="/see-particular-request-for-proposal/{{ $item->sno }}/{{ $item->category }}/{{ $item->title }}"
                                                class="continue_btn">See Request</a>
                                        </center>
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
    </div>
@endsection


@section('scripts')
    <script>
        $(".rfp_requests").addClass("active");
    </script>
@endsection
