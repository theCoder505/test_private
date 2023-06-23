@extends('question_controllers.layouts.app')

@section('title')
    Monitor Alll Questions Of {{ $appname }}
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
        
        .title_container{
            max-width: 300px;
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
                                    Manage All Questions & Replies
                                </h2>
                            </div>
                        </div>


                        <form action="/question-controler/bulk-publish" method="post">
                            @csrf

                            <table class="table table-striped" id="all_questions">
                                <thead>
                                    <tr>
                                        <th scope="col">Bulk</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Question</th>
                                        {{-- <th scope="col">Question For</th> --}}
                                        <th scope="col">Responses</th>
                                        <th scope="col">Publish Date: </th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($questions_data as $key => $item)
                                        <tr>
                                            <td>
                                                @if ($item->deadline <= now()->toDateString() && $item->publish_status != -1)
                                                    <input type="checkbox" class="form-control" name="checkboxes[]"
                                                        value="{{ $item->question_id }}">
                                                @else
                                                    <input type="checkbox" class="form-control" name="checkboxes[]"
                                                        value="{{ $item->question_id }}" disabled>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ $item->question_image }}" alt="photo"
                                                    class="small_table_img question_add_img">
                                            </td>
                                            <td class="title_container">
                                                {{ $item->title }}
                                            </td>
                                            {{-- <td>
                                                <p class="normal_text">{{ $item->user_type }}</p>
                                            </td> --}}
                                            <td>
                                                <center>
                                                    <a href="/question-controler/see-question-responses/{{ $item->question_id }}"
                                                        class="btn btn-sm btn-primary">View ({{ $item->tot_resp }}) </a>
                                                </center>
                                            </td>
                                            <td class="text-center font-weight-normal">
                                                {{ $item->deadline }}
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn btn-sm btn-outline-primary"
                                                        onclick="showRelatedDataByController(this)"
                                                        data-id="{{ $item->question_id }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <a href="/question-controler/see-experts-blog-view/{{ $item->question_id }}/{{ $item->title }}"
                                                    class="btn btn-sm btn-dark" target="_blank">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>

                                                <a href="/question-controler/delete-particular-question-data/{{ $item->question_id }}"
                                                    class="btn btn-sm btn-danger m-1">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                @if ($item->deadline <= now()->toDateString())
                                                    @if ($item->publish_status == 1)
                                                        <a href="/question-controler/publish-question-qsno/{{ $item->question_id }}"
                                                            class="btn btn-sm btn-info">
                                                            Unpublish
                                                        </a>
                                                    @elseif($item->publish_status == -1)
                                                        <div class="btn btn-outline-danger btn-sm">Discarded</div>
                                                    @else
                                                        <a href="/question-controler/publish-question-qsno/{{ $item->question_id }}"
                                                            class="btn btn-sm btn-success">
                                                            Publish
                                                        </a>
                                                    @endif
                                                @else
                                                    <button class="btn btn-outline-success btn-sm"
                                                        disabled>Publish</button>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-dark">Bulk Publish</button>
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

                        {{-- <div class="form-group">
                            <label for="">Deadline</label>
                            <input type="date" name="deadline" required class="form-control deadline_time">
                        </div> --}}

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
        $(".questions_page").addClass("active");
        let table = new DataTable('#all_questions');



        function showRelatedDataByController(passedThis) {
            let dataSpecId = $(passedThis).data("id");
            let tokenVal = $(".tokenVal").val();
            $(".spec_id").val(dataSpecId);
            $("#question_reply").modal("show");

            $.post('/question-controler/get-question-specific-response', {
                _token: tokenVal,
                data_id: dataSpecId,
            }).done(function(response) {

                $(".edit_question_image").attr('src', response[0].question_image);
                $(".edit_question_title").val(response[0].title);
                $(".deadline_time").val(response[0].deadline);

                let selected_value = response[0].user_type;
                // $(".edit_user_type option").each(function() {
                //     if ($(this).val() == selected_value) {
                //         $(this).attr("selected", "selected");
                //     }
                // });

                let selected_industries = response[0].industries_data;
                $(".edit_industry_data input").removeAttr("checked");

                $(".edit_industry_data input").each(function() {
                    if (selected_industries.includes($(this).val())) {
                        $(this).attr("checked", "true");
                    }
                });

                $(".edit_question_details").val(response[0].details);
            });

        }
    </script>
@endsection
