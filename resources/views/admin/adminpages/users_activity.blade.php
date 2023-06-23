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
                                    Check & Change Users Activity
                                </h2>
                            </div>
                        </div>


                        <div class="overflow_auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Account Email</th>
                                        <th scope="col">Account Type</th>
                                        <th scope="col">OTP Verified?</th>
                                        <th scope="col">Activity Status</th>
                                        <th scope="col">Change Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_users_data as $key => $item)
                                        <tr>
                                            <form action="/admin/update-users-activity" method="post">
                                                @csrf

                                                <td>
                                                    {{ $key + 1 }}
                                                </td>

                                                <td>
                                                    <input type="hidden" value="{{ $item->user_unique_id }}"
                                                        name="serial">
                                                    {{ $item->full_name }}
                                                </td>
                                                <td>
                                                    {{ $item->acc_name }}
                                                </td>
                                                <td>
                                                    <div class="uppercase"> {{ $item->type }} </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $item->user_email }}">{{ $item->user_email }}</a>
                                                </td>
                                                <td>
                                                    @if ($item->status > 0)
                                                        <div class="btn btn-success btn-sm">Verified</div>
                                                    @else
                                                        <div class="btn btn-danger btn-sm">Not Verified</div>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($item->activity_status_by_admin > 0)
                                                        <div class="btn btn-primary btn-sm">Active</div>
                                                    @else
                                                        <div class="btn btn-danger btn-sm">Deactivated</div>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($item->activity_status_by_admin > 0)
                                                        <button class="btn btn-danger btn-sm">Deactivate</button>
                                                    @else
                                                        <button class="btn btn-primary btn-sm">Activate</button>
                                                    @endif
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
        $(".manageusersactivity").addClass("active");
    </script>
@endsection
