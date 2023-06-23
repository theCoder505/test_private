@extends('influencers.layouts.app')

@section('title')
    Educational Resources {{ $appname }}
@endsection

@section('content')
    <!-- // main webpage content is here  -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <h2 class="centered_text">Learn About {{ $appname }} </h2>

                        <div class="portal_line">
                            <h3 class="headline_text">
                                How To Videos - {{ $appname }}
                            </h3>

                            <div class="item_grid_5">


                                @forelse ($edu_resorces as $resources)
                                    <div class="item_grid video_grid">
                                        <div class="video_holder">
                                            {!! $resources->resource_code !!}
                                        </div>
                                        <p class="item_title">Welcome to the {{ $appname }} Partner Portal (pt. 1)
                                        </p>
                                        <p class="item_desc">Learn about the modules and functions of the
                                            {{ $appname }} Partner Portal.</p>
                                        <center>
                                            <button class="continue_btn" onclick="watchIt(this)"
                                                data-id="1">Watch</button>
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
        $(".resources").addClass("active");
    </script>
@endsection
