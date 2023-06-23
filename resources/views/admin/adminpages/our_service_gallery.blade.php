@extends('admin.layouts.app')

@section('title')
    Setup Project Gallery
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


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





                <div class="showAddNewPost mb-5">

                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Our Service Gallery Setup
                                </h2>
                            </div>
                        </div>




                        <form action="/admin/update-image-to-our-services-gallery" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="file" name="image1" oninput="showImgae1(this)" accept="image/*"
                                class="image1 d-none">
                            <input type="file" name="image2" oninput="showImgae2(this)" accept="image/*"
                                class="image2 d-none">
                            <input type="file" name="image3" oninput="showImgae3(this)" accept="image/*"
                                class="image3 d-none">
                            <input type="file" name="image4" oninput="showImgae4(this)" accept="image/*"
                                class="image4 d-none">
                            <input type="file" name="image5" oninput="showImgae5(this)" accept="image/*"
                                class="image5 d-none">
                            <input type="file" name="image6" oninput="showImgae6(this)" accept="image/*"
                                class="image6 d-none">



                            <div class="service_details">

                                <div class="gallery_views">
                                    <div class="row">
                                        @forelse ($full_gallery as $item)
                                            <div class="col-md-6 row">
                                                <div class="col-md-6 overlay_dark mb-4">
                                                    <img src="{{ $item->image1 }}" alt="service image"
                                                        onclick="pickImage1(this)" class="serviceline_image service1">
                                                </div>
                                                <div class="col-md-6 overlay_dark mb-4">
                                                    <img src="{{ $item->image2 }}" alt="service image"
                                                        onclick="pickImage2(this)" class="serviceline_image service2">
                                                </div>
                                                <div class="col-md-6 overlay_dark">
                                                    <img src="{{ $item->image3 }}" alt="service image"
                                                        onclick="pickImage3(this)" class="serviceline_image service3">
                                                </div>
                                                <div class="col-md-6 overlay_dark">
                                                    <img src="{{ $item->image4 }}" alt="service image"
                                                        onclick="pickImage4(this)" class="serviceline_image service4">
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-6 overlay_dark">
                                                    <img src="{{ $item->image5 }}" alt="service image"
                                                        onclick="pickImage5(this)" class="serviceline_long_image service5">
                                                </div>
                                                <div class="col-md-6 overlay_dark">
                                                    <img src="{{ $item->image6 }}" alt="service image"
                                                        onclick="pickImage6(this)" class="serviceline_long_image service6">
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                            </div>


                            <center>
                                <button class="btn btn-lg btn-block btn-primary">UPDATE GALLERY</button>
                            </center>

                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>


    <script>
        $(".ourservices").addClass("active");
    </script>
@endsection
