@extends('admin.layouts.app')

@section('title')
    Questions Dashboard For Admin | {{ $appname }}
@endsection

@section('content')
    <style>
        .normal_text {
            font-weight: 500;
            text-transform: capitalize;
        }


        .five_grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            margin-top: 40px;
        }

        .grid_particle {
            text-align: center;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 0.75rem;
            border-bottom: 1px solid #e0e0e0;
            padding: 10px;
        }

        .activated_part {
            color: #b70e0e;
            border: 1px solid #e0e0e0;
            border-bottom: 0px solid #e0e0e0;
        }


        #table_holder {
            overflow-x: auto;
        }

        .normalDetailedText {
            color: #6f6f6f;
            max-width: 1000px;
        }


        .btn-danger.rounded-btn {
            background: #b70e0e;
        }

        .rounded-btn {
            border-radius: 25px;
            font-size: 0.75rem;
            padding: 7px 1.5rem;
        }

        .page-wrapper {
            overflow: hidden;
            background: #fff;
            padding-bottom: 8vh;
        }


        .page-container {
            background: #fff;
            padding-left: 300px;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .title_container {
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

                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-2 md-5 title">
                                Questions Those Uploaded By Controllers
                            </h2>
                            <p>
                                Track the progress of controller articles. You can update the deadline of any question if needed!
                            </p>
                        </div>
                    </div>



                    <div class="five_grid">
                        <div class="grid_particle activated_part" data-id="submitted" onclick="show_spec_part(this)">
                            SUBMITTED ({{ $submitted_count }})
                        </div>
                        <div class="grid_particle" data-id="in_progress" onclick="show_spec_part(this)">
                            In PROGRESS ({{ $in_progress_count }})
                        </div>
                        <div class="grid_particle" data-id="completed" onclick="show_spec_part(this)">
                            COMPLETED ({{ $completed_count }})
                        </div>
                        <div class="grid_particle" data-id="published" onclick="show_spec_part(this)">
                            Published ({{ $published_count }})
                        </div>
                        <div class="grid_particle" data-id="DISCARDED" onclick="show_spec_part(this)">
                            DISCARDED ({{ $discarded_count }})
                        </div>
                    </div>





                    <div id="table_holder">
                        <div class="overflow_auto common_tables mt-5" id="submitted">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Expected Delivery</th>
                                        <th scope="col">Source</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        <tr>
                                            <td>{{ $item->deadline }}</td>
                                            <td>{{ $item->source }}</td>
                                            <td class="title_container">{{ $item->title }}</td>
                                            <td class="uppercase">
                                                @if ($item->publish_status == 0 && $item->deadline > now()->format('Y-m-d'))
                                                    In Progress
                                                @elseif($item->publish_status == -1)
                                                    DISCARDED
                                                @elseif($item->publish_status == 0 && $item->deadline <= now()->format('Y-m-d'))
                                                    Completed
                                                @elseif($item->publish_status == 1 && $item->deadline <= now()->format('Y-m-d'))
                                                    Published
                                                @endif
                                            </td>

                                            <td>
                                                <div class="buttons_box">
                                                    <button type="button" class="btn btn-danger rounded-btn"
                                                        onclick="showRelatedDataByController(this)"
                                                        data-id="{{ $item->question_id }}">
                                                        Edit Question
                                                    </button>
                                                    <a href="/admin/delete-particular-question-data/{{ $item->question_id }}"
                                                        class="btn btn-dark rounded-btn mx-2">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>



                        <div class="overflow_auto common_tables d-none mt-5" id="in_progress">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Expected Delivery</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Question Start Date</th>
                                        <th scope="col">Question Close Date</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        @if ($item->publish_status == 0 && $item->deadline > now()->format('Y-m-d'))
                                            <tr>
                                                <td>{{ $item->deadline }}</td>
                                                <td class="title_container">{{ $item->title }}</td>
                                                <td>{{ $item->added_time }}</td>
                                                <td>{{ $item->deadline }}</td>
                                                <td>
                                                    <a href="/admin/see-experts-blog-view/{{ $item->question_id }}/{{ $item->title }}"
                                                        class="btn btn-dark" target="_blank">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>



                        <div class="overflow_auto common_tables d-none mt-5" id="completed">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        @if ($item->publish_status == 0 && $item->deadline <= now()->format('Y-m-d'))
                                            <tr>
                                                <td class="title_container">{{ $item->title }}</td>
                                                <td>
                                                    <div class="buttons_box">
                                                        <a href="/admin/see-experts-blog-view/{{ $item->question_id }}/{{ $item->title }}"
                                                            class="btn btn-dark" target="_blank">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="/admin/publish-question-qsno/{{ $item->question_id }}"
                                                            class="btn btn-danger rounded-btn">Publish</a>
                                                        <a href="/admin/question/delete-{{ $item->question_id }}"
                                                            class="btn btn-dark rounded-btn mx-2">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>



                        <div class="overflow_auto common_tables d-none mt-5" id="published">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        @if ($item->publish_status == 1 && $item->deadline <= now()->format('Y-m-d'))
                                            <tr>
                                                <td class="title_container">{{ $item->title }}</td>
                                                <td>
                                                    <div class="buttons_box">
                                                        <a href="/admin/see-experts-blog-view/{{ $item->question_id }}/{{ $item->title }}"
                                                            class="btn btn-dark" target="_blank">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="/admin/publish-question-qsno/{{ $item->question_id }}"
                                                            class="btn btn-danger rounded-btn">Unpublish</a>
                                                        <a href="/admin/question/delete-{{ $item->question_id }}"
                                                            class="btn btn-dark rounded-btn mx-2">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                        <div class="overflow_auto common_tables d-none mt-5" id="DISCARDED">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        @if ($item->publish_status == -1)
                                            <tr>
                                                <td class="title_container">{{ $item->title }}</td>
                                                <td>{{ $item->comment }}</td>
                                                <td>{{ $item->discart_time }}</td>
                                            </tr>
                                        @endif
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
                    <form action="/admin/update-existing-question" method="post"
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
        $(".questions_dashboard").addClass("active");
        let table1 = new DataTable('#submitted .table');
        let table2 = new DataTable('#in_progress .table');
        let table3 = new DataTable('#completed .table');
        let table4 = new DataTable('#published .table');
        let table5 = new DataTable('#DISCARDED .table');







        function show_spec_part(passedEvent) {
            let thisdataid = $(passedEvent).attr("data-id");
            $(".grid_particle").removeClass("activated_part");
            $(passedEvent).addClass("activated_part");

            $(".common_tables").addClass("d-none");
            $("#" + thisdataid).removeClass("d-none");
        }





        function showRelatedDataByController(passedThis) {
            let dataSpecId = $(passedThis).data("id");
            let tokenVal = $(".tokenVal").val();
            $(".spec_id").val(dataSpecId);
            $("#question_reply").modal("show");

            $.post('/admin/get-question-specific-response', {
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
