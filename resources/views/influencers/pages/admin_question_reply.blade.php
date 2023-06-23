@extends('influencers.layouts.app')

@section('title')
    Reply admin questions and get citations, more trusts & rank higher on {{ $appname }}
@endsection

@section('content')
    <style>
        .admin_questions_holder {
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(4, 1fr);
            margin: 70px auto;
        }

        .citation_img {
            width: 100%;
            height: 200px;
            margin-bottom: 15px;
        }

        .citation_line {
            box-shadow: 0px 0px 5px 0px rgb(206 206 206 / 73%);
            padding: 20px;
            transition: all 0.5s;
        }

        .citation_line:hover {
            box-shadow: 0px 0px 5px 0px #1c8adb;
        }

        .title_href {
            font-weight: 600;
            font-size: 1.25rem;
        }
    </style>





    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

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

                        <h2 class="font-weight-bold">
                            Questions
                        </h2>

                        <p class="normalDetailedText">
                            Answer questions with a chance of getting featured in upcoming publications. Each question that
                            you submit will be reviewed by our editorial team; we will select the top quotes to send over to
                            our publishers.
                        </p>


                        <div class="overflow_auto mt-5">
                            <table class="table table-striped" id="questionsTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Source</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions_data as $key => $item)
                                        <?php
                                            $a = $users_industries_data;
                                            $b = $item->industries_data;
                                            $array_a = json_decode($a);
                                            $array_b = json_decode($b);
                                            $commonElements = array_intersect($array_a, $array_b);
                                            if (!empty($commonElements)) {
                                        ?>
                                        <tr>
                                            <td class="users_ans">{{ $item->title }}</td>
                                            <td>{{ $item->source }}</td>
                                            <td>{{ $item->deadline }}</td>
                                            <td>
                                                <div class="full_height_width">
                                                    <div class="buttons_box">
                                                        <button type="button" class="btn btn-danger rounded-btn"
                                                            onclick="answerPopup(this)"
                                                            data-id="{{ $item->question_id }}">Answer</button>
                                                        <button type="button" class="btn btn-dark rounded-btn mx-2"
                                                            onclick="skipItem(this)">Skip</button>
                                                        <a class="linktext1rem"
                                                            href="mailto:{{ $contact_email }}?subject=Question From {{ $appname }}&body={{ $item->title }}">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
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
    <div class="modal fade" id="answer_question" tabindex="-1" aria-labelledby="answer_question" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Answer Question:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/submit-questions-reply" method="post" enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" name="question_sno" class="question_serial">

                        <div class="form-group">
                            <label for="">Headline</label>
                            <input type="text" class="form-control headline_user_reply"
                                placeholder="Summarize your answer" maxlength="150" maxlength="1000" required
                                name="headline_user_reply">
                        </div>
                        <div class="form-group">
                            <label for="">Write Your Answer</label>
                            <textarea class="form-control user_answer" id="exampleFormControlTextarea1" placeholder="Write Here..."
                                name="user_answer" required rows="10" minlength="250"></textarea>
                        </div>

                        <button type="submit" class="btn submit_answer">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".answer_queries").addClass("active");
        let table = new DataTable('#order_table');
    </script>
@endsection
