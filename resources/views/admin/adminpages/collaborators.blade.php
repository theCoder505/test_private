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
                                    Add New Colleborator
                                </h2>
                            </div>
                        </div>



                        <form action="/admin/add-new-collaborator" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Name" name="col_name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required
                                    placeholder="Designation. Exp: marketing" name="designation">
                            </div>

                            <div class="form-group">
                                <label for="">Colleborator Image</label>
                                <input type="file" class="form-control" required name="image_file" accept="image/*">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Facebook Link"
                                    name="fblink">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Twitter Link"
                                    name="twitlink">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Pinterest Link"
                                    name="pinlink">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="LinkedIn Link"
                                    name="linkedin_link">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Google Link"
                                    name="google_link">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="About Colleborator"
                                    name="about_text">
                            </div>


                            <center>
                                <button class="btn btn-primary px-5">Complete Profile</button>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col">Twitter</th>
                                        <th scope="col">Pinterest</th>
                                        <th scope="col">LinkedIn</th>
                                        <th scope="col">Google</th>
                                        <th scope="col">About</th>
                                        <th scope="col">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_collaborators as $key => $item)
                                        <tr>
                                            <form action="/admin/update-colleborator-data" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <td>
                                                    <input type="hidden" value="{{ $item->sno }}" name="serial">
                                                    <input type="text" class="form-control" value="{{ $item->col_name }}"
                                                        required placeholder="Name" name="col_name">
                                                </td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->designation }}" required
                                                        placeholder="Designation. Exp: marketing" name="designation"></td>
                                                <td>
                                                    <input type="file" class="form-control d-none" name="image_file"
                                                        accept="image/*" onchange="showImage(this)">
                                                        <img src="{{$item->image_file}}" alt="" class="user_img" onclick="activateInput(this)">
                                                 </td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->fblink }}" required placeholder="Facebook Link"
                                                        name="fblink"></td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->twitlink }}" required placeholder="Twitter Link"
                                                        name="twitlink"></td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->pinlink }}" required placeholder="Pinterest Link"
                                                        name="pinlink"></td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->linkedin_link }}" required
                                                        placeholder="LinkedIn Link" name="linkedin_link"></td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->google_link }}" required
                                                        placeholder="Google Link" name="google_link"></td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $item->about_text }}" required
                                                        placeholder="About Colleborator" name="about_text"></td>

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
        $(".collaborators").addClass("active");
    </script>
@endsection
