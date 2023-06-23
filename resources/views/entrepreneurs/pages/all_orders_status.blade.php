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

                        <h2 class="centered_text mb-0"> Ongoing Orders You Will Receive - {{ $appname }} </h2>

                        <div class="portal_line">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Per Unit Price</th>
                                        <th scope="col">Total Units</th>
                                        <th scope="col">Total Cost</th>
                                        <th scope="col">Ordered At</th>
                                        <th scope="col">Delivery Time</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">View Product</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($ongoing_orders as $key => $item)
                                        <tr>
                                            <td scope="col">{{ $key + 1 }}</td>
                                            <td scope="col"> <img src="{{ $item->prod_image }}" alt=""
                                                    class="left_img"></td>
                                            <td scope="col">
                                                <div class="prod_name">{{ $item->prod_name }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">${{ $item->cost_per_unit }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">${{ $item->amount }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">{{ $item->total_cost }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->ordered_at)->format('Y-m-d') }}
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <div class="delivery_time">
                                                    @if ($item->delivery_time)
                                                        @php
                                                            $now = \Carbon\Carbon::now();
                                                            $left_days = $now->diffInDays($item->delivery_time);
                                                        @endphp
                                                        <p class="text-danger">{{ $left_days }} - Days Left</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <div class="btn btn-sm btn-dark delivery_status">
                                                    {{ $item->delivery_status }}</div>
                                            </td>
                                            <td scope="col">
                                                @if ($item->order_type == 'custom')
                                                    <a href="/for-entrepreneur/see-custom-product/{{ $item->product_serial }}/{{ $item->prod_cat }}/{{ $item->prod_name }}"
                                                        class="btn btn-sm btn-primary px-3">View</a>
                                                @else
                                                    <a href="/entrepreneur/see-product/{{ $item->product_serial }}/{{ $item->prod_cat }}/{{ $item->prod_name }}"
                                                        class="btn btn-sm btn-primary px-3">View</a>
                                                @endif


                                            </td>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>


                        </div>




                        <h2 class="centered_text mb-0 mt-5"> All Completed Orders For You - {{ $appname }} </h2>

                        <div class="portal_line">


                            <table class="table" id="order_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Per Unit Price</th>
                                        <th scope="col">Total Units</th>
                                        <th scope="col">Total Cost</th>
                                        <th scope="col">Ordered At</th>
                                        <th scope="col">Delivered At</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Review Order</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($all_completed_orders as $key => $item)
                                        <tr>
                                            <td scope="col">{{ $key + 1 }}</td>
                                            <td scope="col"> <img src="{{ $item->prod_image }}" alt=""
                                                    class="left_img"></td>
                                            <td scope="col">
                                                <div class="prod_name">{{ $item->prod_name }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">${{ $item->cost_per_unit }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">${{ $item->amount }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">{{ $item->total_cost }}</div>
                                            </td>
                                            <td scope="col">
                                                <div class="product_price">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->ordered_at)->format('Y-m-d') }}
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <div class="delivery_time">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->delivered_at)->format('Y-m-d') }}
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <div class="btn btn-sm btn-dark delivery_status">
                                                    {{ $item->delivery_status }}</div>
                                            </td>
                                            <td scope="col">
                                                <a href="/entrepreneur/review-order/{{ $item->sno }}/{{ $item->product_serial }}/{{ $item->prod_cat }}/{{ $item->prod_name }}"
                                                    class="btn btn-sm btn-primary px-3">View</a>
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
        $(".orders").addClass("active");
        let table = new DataTable('#order_table');
    </script>
@endsection
