@extends('question_controllers.layouts.app')

@section('title')
    Upload New Question | {{ $appname }}
@endsection

@section('content')
    <style>
        .normal_text {
            font-weight: 500;
            text-transform: capitalize;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: 25px;
        }

        .sorting_1 {
            display: flex;
            justify-content: center;
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
                                    Add New Question
                                </h2>
                            </div>
                        </div>


                        <form action="/question-controler/add-new-question-to-database" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <center>
                                    <img src="{{ asset('admin/assets/images/upload.png') }}" alt="photo"
                                        class="ecomImage question_image image_thing" onclick="activateInput(this)">
                                    <input type="file" name="question_image" class="file_input d-none" accept="image/*"
                                        onchange="showSpecImageInSpecField(this)" required>
                                </center>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Type Question..."
                                    name="question_title" required>
                            </div>

                            {{-- <div class="form-group">
                                <select class="form-control" name="user_type" required="">
                                    <option disabled="">Select User Type</option>
                                    <option value="menufacturer">Menufacturer</option>
                                    <option value="influencer">Influencer</option>
                                    <option value="entrepreneur">Entrepreneur</option>
                                </select>
                            </div> --}}



                            <div class="text-dark mt-3"> Select industries, the question is related with:</div>
                            <div class="row px-3 mb-3">

                                @forelse ($all_added_industries as $key22 => $industries)
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="industry{{ $key22 }}"
                                            value="{{ $industries->option_name }}" name="industries_data[]">
                                        <label class="form-check-label"
                                            for="industry{{ $key22 }}">{{ $industries->option_name }}</label>
                                    </div>
                                @empty
                                @endforelse

                            </div>

                            <div class="form-group">
                                <textarea class="form-control" required name="question_details" rows="7" placeholder="Question Details"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Deadline</label>
                                <input type="date" name="deadline" id="" required class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" name="source" placeholder="Source" required class="form-control">
                            </div>

                            <center>
                                <button class="btn btn-dark btn-lg btn-block">Upload Question</button>
                            </center>
                        </form>



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
                    <form action="/question-controler/update-existing-question" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="tokenVal" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <center>
                                <img src="{{ asset('admin/assets/images/upload.png') }}" alt="photo"
                                    class="ecomImage edit_question_image image_thing" onclick="activateInput(this)">
                                <input type="file" name="edit_question_image" class="file_input d-none"
                                    accept="image/*" onchange="showSpecImageInSpecField(this)">
                            </center>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="spec_id" name="spec_id">
                            <input type="text" class="form-control edit_question_title" placeholder="Question Title"
                                name="edit_question_title" required>
                        </div>

                        <div class="form-group">
                            <label for="">Deadline</label>
                            <input type="date" name="deadline" required class="form-control deadline_time">
                        </div>

                        <div class="form-group">
                            <select class="form-control edit_user_type" name="edit_user_type" required="">
                                <option disabled="">Select User Type</option>
                                <option value="menufacturer">Menufacturer</option>
                                <option value="influencer">Influencer</option>
                                <option value="entrepreneur">Entrepreneur</option>
                            </select>
                        </div>



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

                        <div class="form-group">
                            <textarea class="form-control edit_question_details" required name="edit_question_details" rows="10"
                                placeholder="Question Details"></textarea>
                        </div>

                        <center>
                            <button class="btn btn-primary btn-lg btn-block">UPDATE</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>









    <script>
        $(".add_new_question_page").addClass("active");
    </script>
@endsection
