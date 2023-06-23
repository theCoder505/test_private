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
                                    Industry Options Management For Users To Answer On Specific Questions
                                </h2>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Industry Option Name</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($all_added_industries as $key => $item)
                                    <tr>
                                        <form action="/admin/update-existing-industry" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="serial" value="{{ $item->sno }}">
                                                <input type="text" class="form-control" required
                                                    placeholder="Industry Option Name" name="industry_name"
                                                    value="{{ $item->option_name }}" onkeypress="disableSpecialCharacters(event)">
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary mx-auto px-5">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-industry/{{ $item->sno }}"
                                                    class="btn btn-outline-danger mx-auto px-5"> <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </form>
                                    </tr>
                                @empty
                                @endforelse


                                <tr class="bg-dark text-light">
                                    <form action="/admin/add-new-industry-option" method="post">
                                        @csrf
                                        <th scope="row"> Add New Option </th>
                                        <td colspan="2">
                                            <input type="text" class="form-control" required
                                                placeholder="Type New Option..." name="industry_name"  onkeypress="disableSpecialCharacters(event)">
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-success px-5 w-100">
                                                SUBMIT
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>




                    </div>
                </div>







            </div>
        </div>
    </div>


    <script>
        $(".manageindustries").addClass("active");

        function disableSpecialCharacters(event) {
            var forbiddenKeys = [47, 92, 38];
            if (forbiddenKeys.includes(event.keyCode)) {
                event.preventDefault();
                return false;
            }
        }
    </script>
@endsection
