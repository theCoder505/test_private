@extends('influencers.layouts.app')

@section('title')
    Fillup Information To Order Product | {{ $appname }}
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


                        <div id="wrapper">
                            <div id="container">
                                <div id="left-col">
                                    <div id="left-col-cont">
                                        <h2>Summary</h2>

                                        @forelse ($particular_product as $item)
                                            <div class="item">
                                                <div>
                                                    @php
                                                        $images = explode('|', $item->project_photos);
                                                        foreach ($images as $key => $imgsrc) {
                                                            if ($key < 1) {
                                                                echo '<img src="' . $imgsrc . '" alt="" class="item_img">';
                                                            }
                                                        }
                                                    @endphp
                                                </div>
                                                <div>
                                                    <p class="prod_item_title">{{ $item->item_name }}</p>
                                                    <p class="tot_amount_para">Per Unit Cost: ${{ $cost_per_unit }}</p>
                                                    <p class="tot_amount_para">Total Amount: {{ $product_amount }}</p>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse

                                        <p id="total">Total</p>
                                        <h4 id="total-price"><span>$</span> {{ $cost_per_unit * $product_amount }}</h4>
                                    </div>
                                </div>
                                <div id="right-col">
                                    <div class="paymnet_form">
                                        <h2>Payment</h2>
                                        <div id="logotype">
                                            <img id="mastercard" src="{{ asset('vendor/assets/images/mastercard.png') }}" />
                                        </div>

                                        <form onsubmit="submitForm(event)" id="paymentForm">
                                            @csrf


                                            @forelse ($particular_product as $item)
                                                @php
                                                    $images = explode('|', $item->project_photos);
                                                    foreach ($images as $key => $imgsrc) {
                                                        if ($key < 1) {
                                                            echo '<input type="hidden" required name="item_image" value="' . $imgsrc . '">';
                                                        }
                                                    }
                                                @endphp
                                                <input type="hidden" required name="item_name" value="{{ $item->item_name }}">
                                            @empty
                                            @endforelse

                                            <input type="hidden" required name="prod_serial" value="{{ $prod_serial }}">
                                            <input type="hidden" required name="cost_per_unit" value="{{ $cost_per_unit }}">
                                            <input type="hidden" required name="product_amount" value="{{ $product_amount }}">
                                            <input type="hidden" required name="prod_unique_id" value="{{ $prod_unique_id }}">
                                            <input type="hidden" required name="prod_type" value="{{ $prod_type }}">
                                            <input type="hidden" required name="order_type" value="{{ $order_type }}">
                                            <input type="hidden" required name="prod_cat" value="{{ $prod_cat }}">

                                            <label>Cardnumber</label>
                                            <div id="cardnumber">
                                                <input type="text"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)"
                                                    required name="card_number_1" placeholder="0123" /> <span
                                                    class="divider">-</span>
                                                <input type="text"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)"
                                                    required name="card_number_2" placeholder="4567" /> <span
                                                    class="divider">-</span>
                                                <input type="text"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)"
                                                    required name="card_number_3" placeholder="8901" /> <span
                                                    class="divider">-</span>
                                                <input type="text"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)"
                                                    required name="card_number_4" placeholder="2345" />
                                            </div>

                                            <label>Cardholder</label>
                                            <input id="cardholder" required name="cardholder" type="text" placeholder="John Doe" />
                                            <div class="left">
                                                <label>Expiration Date</label>
                                                <select required name="month" id="month" onchange="" size="1">
                                                    <option value="00">Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                <select required name="year" id="year" onchange="" size="1">
                                                    <option disabled selected>Year</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                            </div>

                                            <div class="right">
                                                <label id="cvc-label">CVC <i class="fa fa-question-circle-o"
                                                        aria-hidden="true"></i></label>
                                                <input id="cvc" type="text" placeholder="123" maxlength="3" required name="cvc" />
                                            </div>
                                            <button id="purchase">Purchase</button>
                                            <button type="button" id="payment_successful" class="d-none" disabled>Payment Successful</button>
                                        </form>
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
        // $(".home").addClass("active");
    </script>
@endsection
