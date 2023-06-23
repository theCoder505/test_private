@extends('question_controllers.layouts.app')

@section('title')
    See Question Replies at {{ $appname }}
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
            box-shadow: 0px 0px 5px 0px rgba(112, 110, 110, 0.73);
            padding: 20px;
            transition: all 0.5s;
        }

        .citation_line:hover {
            box-shadow: 0px 0px 5px 0px #1c8adb;
        }

        .title_href {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .question_title {
            font-weight: 600;
            font-size: 1.5rem;
            margin-top: 15px;
        }

        .question_details {
            font-weight: 500;
            margin-bottom: 35px;
            padding: 15px;
            border: 2px solid #cecece;
        }

        .qstnreply {
            font-family: 'arial';
            font-size: 1.2rem;
            white-space: pre-wrap;
            margin-bottom: 15px;
        }

        .modal-backdrop {
            z-index: 0;
        }

        #tabular_data {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px silver;
        }

        .users_ans {
            width: 300px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            margin-left: 3px;
            margin-bottom: 20px;
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

                    <div class="">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    See Specific Question Replies From Users
                                </h2>
                            </div>
                        </div>




                        <div class="overflow_auto mt-3" id="tabular_data">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Submitted On</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Source</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($query_replies as $key => $item)
                                        <tr>
                                            <form action="/question-controler/add-for-citation" method="post">
                                                @csrf
                                                <input type="hidden" name="answer_serial" value="{{ $item->id }}">
                                                <input type="hidden" name="replier_id" value="{{ $item->replier_id }}">
                                                <input type="hidden" name="question_serial"
                                                    value="{{ $item->question_serial }}">


                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td class="users_ans">{!! $item->user_answer !!}</td>
                                                <td>{{ $item->source }}</td>
                                                <td>
                                                    <select name="citation_status" class="form-control">
                                                        <option @if ($item->citation == 0) selected @endif
                                                            value="0">In Review</option>
                                                        <option @if ($item->citation == 3) selected @endif
                                                            value="3">Unselected</option>
                                                        <option @if ($item->citation == 1) selected @endif
                                                            value="1">Selected To Publish</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary px-3">Update</button>
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







                <!-- Modal -->
                <div class="modal fade" id="showQuestionPopUp" tabindex="-1" role="dialog"
                    aria-labelledby="showQuestionPopUpTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">See Reply</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <form action="/admin/add-for-citation" method="post">
                                        @csrf
                                        <input type="hidden" name="sno" class="reply_id" value="">
                                        <input type="hidden" name="question_serial" class="question_serial" value="">
                                        <input type="hidden" name="replier_id" class="replier_id" value="">
                                        <pre class="qstnreply"></pre>
                                        <button class="btn btn-primary px-5 citation_btn">Add For Citation</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <script>
        $(".questions_page").addClass("active");
        let table = new DataTable('#tabular_data .table');
    </script>
@endsection
