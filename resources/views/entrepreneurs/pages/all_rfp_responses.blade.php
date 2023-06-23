@extends('entrepreneurs.layouts.app')

@section('title')
    Your All Ordered Products | {{ $appname }}
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


                        <div id="all_responses">

                            <table class="table" id="order_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Response</th>
                                        <th scope="col">Visit Profile</th>
                                        <th scope="col">Contact Menufacturer</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @forelse ($all_responses as $key => $item)
                                        
                                   
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td scope="col">
                                            <div class="user_image">
                                                @php
                                                $images = explode('|', $item->rfp_images);
                                                foreach ($images as $key => $imgsrc) {
                                                    if ($key < 1) {
                                                        echo '<img src="' . $imgsrc . '" alt="" class="resp_user_img">';
                                                    }
                                                }
                                            @endphp
                                            </div>
                                        </td>
                                        <td scope="col"><div class="resp_user_name">{{$item->user_name}}</div></td>

                                        <td scope="col">
                                            <div class="response_desc">
                                                <div class="prod_short_desc"> {{ substr($item->user_response, 0, 50) }} </div>
                                                <pre class="prod_desc read_total d-none">{!!$item->user_response!!}</pre>
                                                <button class="btn btn-info btn-sm mt-2" onclick="readmorebtn(this)">Read More</button>
                                            </div>
                                        </td>

                                        <td scope="col">
                                            <div>
                                                <a href="/see-vendor-profile/{{$item->user_type}}/{{$item->user_id}}" target="_blank" class="btn btn-dark px-5 mb-2 btn-sm">Click</a>
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <div>
                                                <a href="/contact/{{$item->user_type}}/{{$item->user_name}}/{{$item->user_id}}" target="_blank" class="btn btn-primary px-5 mb-2 btn-sm">Contact</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>


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
        $(".add_rfp").addClass("active");
        let table = new DataTable('#order_table');
    </script>
@endsection
