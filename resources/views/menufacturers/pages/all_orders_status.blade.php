@extends('menufacturers.layouts.app')

@section('title')
    Your All Ordered Products | {{ $appname }}
@endsection

@section('content')
    <style>
        .portal_line {
            width: 100%;
            overflow-x: auto;
        }

        .review_text::before {
            content: "Review: ";
            font-weight: bold;
            font-size: 1.125rem;
            display: inherit;
        }

        .review_text {
            margin-bottom: 20px;
        }

        .modal-body {
            text-align: center;
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

                        <h2 class="centered_text mb-0"> Ongoing Orders - {{ $appname }} </h2>

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
                                        <th scope="col">Delivery Time</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Update Order Status</th>
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
                                            <form action="/menufacturer/change-order-status" method="post">
                                                @csrf
                                                <input type="hidden" name="order_serial" value="{{ $item->sno }}">
                                                <td scope="col">
                                                    <select name="change_status" class="form-control">
                                                        <option @if ($item->delivery_status == 'Order confirmed') selected @endif
                                                            value="Order confirmed">Order confirmed</option>
                                                        <option @if ($item->delivery_status == 'Picked by courier') selected @endif
                                                            value="Picked by courier">Picked by courier</option>
                                                        <option @if ($item->delivery_status == 'On the way') selected @endif
                                                            value="On the way">On the way</option>
                                                        <option @if ($item->delivery_status == 'Ready for pickup') selected @endif
                                                            value="Ready for pickup">Ready for pickup</option>
                                                        <option @if ($item->delivery_status == 'complete') selected @endif
                                                            value="complete">Delivered</option>
                                                    </select>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <button class="btn btn-sm btn-primary px-3">Update</button>
                                                    </center>
                                                </td>
                                            </form>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>


                        </div>




                        <h2 class="centered_text mb-0 mt-5"> All Delivered Orders - {{ $appname }} </h2>

                        <div class="portal_line">


                            <table class="table" id="order_table2">
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
                                        <th scope="col">See Review</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($delivered_orders as $key2 => $item)
                                        <tr>
                                            <td scope="col">{{ $key2 + 1 }}</td>
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
                                                    @if ($item->delivered_at != null)
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->delivered_at)->format('Y-m-d') }}
                                                    @else
                                                    @endif
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <center>
                                                    <button class="btn btn-sm btn-info" data-id="{{ $item->sno }}"
                                                        onclick="showReview(this)">Click</button>
                                                </center>
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




    <!-- Modal -->
    <div class="modal fade" id="review_popup" tabindex="-1" aria-labelledby="review_popupLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="review_popupLabel">See Reviews</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="review_star_icons"></div>
                    <div class="review_text"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".orders").addClass("active");
        let table = new DataTable('#order_table');
        let table2 = new DataTable('#order_table2');
    </script>
@endsection
