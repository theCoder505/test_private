@extends('admin.layouts.app')

@section('title')
    Manage Question Controllers at {{ $appname }}
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
                                    Add New Question Controller
                                </h4>
                            </div>
                        </div>



                        <form action="/admin/add-new-question-controler" method="post">
                            @csrf

                            <div class="form-group">


                                <div class="form-group mt-4">
                                    <label>Controller Name</label>
                                    <input type="text" class="form-control" required
                                        placeholder="Provide full name of this cntroller" name="controller_name">
                                </div>

                                <div class="form-group">
                                    <label>Controller Email</label>
                                    <input type="text" class="form-control" required
                                        placeholder="Provide an email for this cntroller" name="controller_email">
                                </div>

                                <div class="form-group">
                                    <label>Controller Password</label>
                                    <input type="text" class="form-control" required
                                        placeholder="Set a password for this controller" name="controller_password">
                                </div>
                            </div>

                            <center>
                                <button class="btn btn-primary px-5">SUBMIT</button>
                            </center>
                    </div>

                    </form>




                    <div class="bg-light mt-5 p-5">
                        <div class="row">
                            <div class="col">
                                <h4 class="mb-2 mb-md-4 text-dark">
                                    All Question Controller Data &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/') }}/question-controler/login" target="_blank"
                                        rel="noopener noreferrer">Controller Login URL</a>
                                </h4>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Controller Name</th>
                                    <th scope="col">Controller Email</th>
                                    <th scope="col">Controller Password</th>
                                    <th scope="col">Update Access</th>
                                    <th scope="col">remove Controller</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all_controllers as $key => $item)
                                    <tr>
                                        <form action="/admin/update-controller-access" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="controller_id"
                                                    value="{{ $item->controller_id }}">
                                                <input type="text" class="form-control" required
                                                    placeholder="Controller Name" name="controller_name"
                                                    value="{{ $item->controller_name }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" required
                                                    placeholder="Controller Email" name="controller_email"
                                                    value="{{ $item->controller_email }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" required
                                                    placeholder="Controller Password" name="controller_password"
                                                    value="{{ $item->controller_password }}">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/remove-controller/{{ $item->controller_id }}"
                                                    class="btn btn-danger btn-sm px-5">Remove</a>
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
        $(".question_controllers").addClass("active");
    </script>
@endsection
