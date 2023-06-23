@extends('admin.layouts.app')

@section('title')
    Add New Post & See All Posts
@endsection

@section('content')
    <style>
        .normal_text {
            font-weight: 500;
            text-transform: capitalize;
        }

        .table {
            font-size: 0.80rem;
        }
    </style>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="col-12 allAlerts">
                    @if (session()->has('alertMsg'))
                        <div class="alert text-center {{ session()->get('type') }} alert-dismissible fade show"
                            role="alert">
                            {!! session()->get('alertMsg') !!}
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
                                    Questions added by controllers
                                </h2>
                            </div>
                        </div>



                        <table class="table table-striped" id="all_questions">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($controllers_qstns_data as $key => $item)
                                    <tr>
                                        <td>
                                            <img src="{{ $item->question_image }}" alt="photo"
                                                class="small_table_img question_add_img">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @forelse ($all_q_controllers as $user_data)
                                                @if ($user_data->controller_id == $item->controller_id)
                                                    {{ $user_data->controller_email }}
                                                @endif
                                            @empty
                                            @endforelse
                                        </td>
                                        <td class="font-weight-normal">
                                            @if ($item->publish_status == 1)
                                                Published
                                            @elseif ($item->publish_status == 0)
                                                In Review
                                            @else
                                                Discarded
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn btn-outline-primary btn-sm" onclick="showRelatedData2(this)"
                                                data-id="{{ $item->question_id }}">
                                                Click
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/admin/discard-question/{{ $item->question_id }}"
                                                class="btn btn-sm btn-outline-danger w-100 mb-2">
                                                Discard
                                            </a>
                                            <a href="/admin/active-question/{{ $item->question_id }}"
                                                class="btn btn-sm btn-outline-primary w-100">
                                                Active
                                            </a>
                                        </td>
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




















    <!-- Modal -->
    <div class="modal fade" id="question_reply" tabindex="-1" role="dialog" aria-labelledby="question_replyTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">

                    <input type="hidden" class="tokenVal" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <center>
                            <img src="{{ asset('admin/assets/images/upload.png') }}" alt="photo"
                                class="ecomImage edit_question_image image_thing">
                        </center>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control edit_question_title" placeholder="Question Title"
                            name="edit_question_title" required>
                    </div>

                    {{-- <div class="form-group">
                        <select class="form-control edit_user_type" name="edit_user_type" required="">
                            <option disabled="">Select User Type</option>
                            <option value="menufacturer">Menufacturer</option>
                            <option value="influencer">Influencer</option>
                            <option value="entrepreneur">Entrepreneur</option>
                        </select>
                    </div> --}}



                    <div class="text-dark mt-3"> Select industries, the question is related with:
                    </div>
                    <div class="row px-3 mb-3">

                        @forelse ($all_added_industries as $key22 => $industries)
                            <div class="col-md-4 edit_industry_data">
                                <input class="" type="checkbox" id="edit_industry{{ $key22 }}"
                                    value="{{ $industries->option_name }}" name="edit_industries_data[]">
                                <label class="form-check-label"
                                    for="edit_industry{{ $key22 }}">{{ $industries->option_name }}</label>
                            </div>
                        @empty
                        @endforelse

                    </div>

                    <div class="text-dark mb-4">
                        Publish Deadline:
                        <input type="date" name="" class="form-control deadline">
                    </div>

                    <div class="text-dark mb-4">
                        Total Responses: <span class="responses"></span> | 
                        <a href="" target="_blank" class="blog_link"> Read In Blog Fromat </a>
                    </div>



                    <div class="text-dark mb-5">
                        Question Details:
                        <p class="edit_question_details"></p>
                    </div>

                    <form action="/admin/discard-question" method="post">
                        @csrf

                        <input type="hidden" class="spec_id" name="spec_id">
                        <div class="form-group">
                            <label for="">Write Comment For Discarding:</label>
                            <textarea class="form-control comment_text" required name="comment_text" rows="10" placeholder="Type Here..."></textarea>
                        </div>

                        <button class="btn btn-danger btn-lg">DISCARD QUESTION</button>
                    </form>
                </div>
            </div>
        </div>
    </div>








    <script>
        $(".question_requests").addClass("active");
        let table = new DataTable('#all_questions');
    </script>
@endsection
