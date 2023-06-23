@extends('admin.layouts.app')

@section('title')
    Blogs Management {{ $appname }}
@endsection

@section('content')
    <style>
        .blog_img {
            width: 100% !important;
            height: 150px !important;
        }

        .card-body {
            padding: 0px;
        }

        .card {
            padding: 20px;
            border-radius: 5px;
            color: #fff;
        }
    </style>

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
                                    Update Blog
                                </h2>
                            </div>
                        </div>


                        @forelse ($spec_blog as $item)
                            <form action="/admin/update-particular-blog" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="blog_serial" value="{{ $item->sno }}">

                                <center>
                                    <img src="{{ $item->blog_image }}" id="logo_pic" alt="Company Logo" class="blog_image"
                                        onclick="clickToChangeLogo(this)">
                                </center>
                                <input type="file" class="comp_logo_input d-none" name="blog_image" accept="image/*"
                                    oninput="logo_pic.src=window.URL.createObjectURL(this.files[0])">


                                <div class="form-group">
                                    <input type="text" class="form-control" name="blog_title" required
                                        placeholder="Blog Title" value="{{ $item->blog_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-control" name="blog_category" id="exampleFormControlSelect2">
                                        @forelse ($all_cats as $key => $cat_item)
                                            <option @if ($cat_item->category_name == $item->blog_category) selected @endif
                                                value="{{ $cat_item->category_name }}"> {{ $cat_item->category_name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="tinymce_desc" name="blog_description" placeholder="Blog Description" required
                                        rows="3">{{ $item->blog_description }}</textarea>
                                </div>

                                <button class="btn btn-lg btn-block btn-dark">Update Blog</button>

                            </form>
                        @empty
                        @endforelse



                    </div>
                </div>



            </div>
        </div>
    </div>


    <script>
        $(".manageblogs").addClass("active");

        function clickToChangeLogo(passedThis) {
            $(".comp_logo_input").click();
        }

        
        tinymce.init({
            selector: '#tinymce_desc',
        });
    </script>
@endsection
