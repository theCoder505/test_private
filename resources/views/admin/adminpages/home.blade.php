@extends('admin.layouts.app')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        <h2 class="mb-2 mb-md-4 text-center title">
                            Admin Dashboard
                        </h2>
                    </div>
                </div>
                <div class="row mb-3">

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card approve-content-card card-shadow">
                            <div class="card-content">
                                <div>
                                    <h2 class="content-number mb-2">{{$total_menufacturers}}</h2>
                                    <h4 class="approve">Total Menufacturers</h4>
                                </div>

                                <div>
                                    <img src="{{ asset('admin/assets/images/approved.png') }}" alt="category">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-shadow approval-card">
                            <div class="card-content">
                                <div>
                                    <h2 class="content-number mb-2">{{$total_influencers}}</h2>
                                    <h4 class="approve">Total Influencers</h4>
                                </div>

                                <div>
                                    <img src="{{ asset('admin/assets/images/right.png') }}" alt="category">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card like-card card-shadow">
                            <div class="card-content">
                                <div>
                                    <h2 class="content-number mb-2">{{$total_enterprenuers}}</h2>
                                    <h4 class="approve">Total Entreprenuers</h4>
                                </div>

                                <div>
                                    <img src="{{ asset('admin/assets/images/bg-title-01.jpg') }}" alt="category">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card view-card card-shadow">
                            <div class="card-content">
                                <div>
                                    <h2 class="content-number mb-2">{{$tot_orders}}</h2>
                                    <h4 class="approve">Total Orders </h4>
                                </div>

                                <div>
                                    <img src="{{ asset('admin/assets/images/bg-title-02.jpg') }}" alt="category">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card view-card card-shadow">
                            <div class="card-content">
                                <div>
                                    <h2 class="content-number mb-2">{{$tot_reviews}}</h2>
                                    <h4 class="approve">Total Reviews </h4>
                                </div>

                                <div>
                                    <img src="{{ asset('admin/assets/images/bg-title-02.jpg') }}" alt="category">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(".dashboard").addClass("active");
    </script>
@endsection
