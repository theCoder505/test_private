@extends('admin.layouts.app')

@section('title')
    Add New Post & See All Posts
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
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    Add New Category
                                </h4>
                            </div>
                        </div>



                        <form action="/admin/add-new-category" method="post">
                            @csrf

                            <input type="hidden" class="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">

                                <label for="">Select Category Type:</label>
                                <select name="category_type" id="" class="form-control">
                                    <option value="product">Product</option>
                                    <option value="blog">Blog</option>
                                </select>
                                
                                <div class="form-group mt-4">
                                    <label for="">Write Category Title:</label>
                                    <input type="text" class="form-control" required placeholder="Category Title"
                                        name="category_name">
                                </div>

                                <center>
                                    <button class="btn btn-primary px-5">Add New Category</button>
                                </center>
                            </div>

                        </form>





                        <div class="row mt-5">
                            <div class="col">
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    All Categories For Products
                                </h4>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Type</th>
                                    <th scope="col">Category Title</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all_prod_categories as $key => $item)
                                    <tr>
                                        <form action="/admin/update-category" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <select name="category_type" id="" class="form-control">
                                                    <option @if ($item->cat_type == 'product') selected @endif value="product">Product</option>
                                                    <option @if ($item->cat_type == 'blog') selected @endif value="blog">Blog</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="category_serial" value="{{ $item->sno }}">
                                                <input type="text" class="form-control" required placeholder="FAQ Title"
                                                    name="category_name" value="{{ $item->category_name }}">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-category/{{ $item->sno }}" class="btn btn-danger btn-sm px-5">Delete</a>
                                            </td>
                                        </form>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>



                        

                        <div class="row mt-5">
                            <div class="col">
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    All Categories For Blog Posts
                                </h4>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Type</th>
                                    <th scope="col">Category Title</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all_blog_categories as $key => $item)
                                    <tr>
                                        <form action="/admin/update-category" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <select name="category_type" id="" class="form-control">
                                                    <option @if ($item->cat_type == 'product') selected @endif value="product">Product</option>
                                                    <option @if ($item->cat_type == 'blog') selected @endif value="blog">Blog</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="category_serial" value="{{ $item->sno }}">
                                                <input type="text" class="form-control" required placeholder="FAQ Title"
                                                    name="category_name" value="{{ $item->category_name }}">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-category/{{ $item->sno }}" class="btn btn-danger btn-sm px-5">Delete</a>
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


    <script>
        $(".managecats").addClass("active");
    </script>
@endsection
