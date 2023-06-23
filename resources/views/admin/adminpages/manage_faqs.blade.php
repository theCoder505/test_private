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
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Frequently Asked Questions Management
                                </h2>
                            </div>
                        </div>



                        <form action="/admin/add-new-faq" method="post">
                            @csrf

                            <input type="hidden" class="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control" required placeholder="FAQ Title"
                                        name="title">
                                </div>

                                <div class="form-group mt-4">
                                    <textarea class="form-control" required name="faq_answer" rows="3" placeholder="FAQ Answer"></textarea>
                                </div>

                                <center>
                                    <button class="btn btn-primary px-5">Add New FAQ</button>
                                </center>
                            </div>

                        </form>





                        <div class="row mt-5">
                            <div class="col">
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    All Frequently Asked Questions
                                </h4>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">FAQ Title</th>
                                    <th scope="col">FAQ Answer</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allfaqs as $key => $item)
                                    <tr>
                                        <form action="/admin/update-faq" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="serial" value="{{ $item->sno }}">
                                                <input type="text" class="form-control" required placeholder="FAQ Title"
                                                    name="title" value="{{ $item->title }}">
                                            </td>
                                            <td>
                                                <textarea class="form-control" required name="faq_answer" rows="3" placeholder="FAQ Answer">{{ $item->answer }}</textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-faq/{{ $item->sno }}" class="btn btn-danger btn-sm px-5">Delete</a>
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
        $(".managefaqs").addClass("active");
    </script>
@endsection
