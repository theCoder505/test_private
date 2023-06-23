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
                                    Add New Colleborator
                                </h2>
                            </div>
                        </div>



                        <form action="/admin/add-new-image-to-gallery" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">Gallery Image</label>
                                <input type="file" class="form-control" required name="gallery_image">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Project Title"
                                    name="gallery_title">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Link" name="gallery_link">
                            </div>

                            <center>
                                <button class="btn btn-primary px-5">Add To Gallery</button>
                            </center>

                        </form>





                        <div class="row mt-5">
                            <div class="col">
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    All Frequently Asked Questions
                                </h4>
                            </div>
                        </div>


                        <div class="overflow_auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Gallery Image</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($full_gallery as $key => $item)
                                        <tr>
                                            <form action="/admin/update-gallery-image-data" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <td>
                                                    <input type="hidden" value="{{ $item->sno }}" name="serial">
                                                    {{ $key + 1 }}
                                                </td>

                                                <td>
                                                    <input type="file" class="form-control d-none" name="gallery_image" accept="image/*" onchange="showImage(this)">
                                                    <img src="{{ $item->gallery_image }}" alt="" class="user_img"
                                                        onclick="activateInput(this)">
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required
                                                            placeholder="Project Title" value="{{ $item->gallery_title }}"
                                                            name="gallery_title">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required
                                                            value="{{ $item->gallery_link }}" placeholder="Link"
                                                            name="gallery_link">
                                                    </div>
                                                </td>

                                                <td>
                                                    <button class="btn btn-primary btn-sm px-5">Update</button>
                                                </td>
                                            </form>
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


    <script>
        $(".gallery").addClass("active");
    </script>
@endsection
