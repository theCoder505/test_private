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
                            Track your answers
                        </h2>

                        <p class="normalDetailedText">
                            See when your insights wil be published. Please select on the different tabs below to view which
                            stage your quote is in. This tracker
                            reflects quotes that you submitted in the past time.
                        </p>

                        <div class="three_div">
                            <div class="answers_div">
                                <div class="left_answers">
                                    <div class="bold_text">Answers</div>
                                    <div class="marks">{{ $total_count }}</div>
                                </div>
                                <div class="right_icon">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="answers_div">
                                <div class="left_answers">
                                    <div class="bold_text">PUBLISHED</div>
                                    <div class="marks">{{ $published_count }}</div>
                                </div>
                                <div class="right_icon">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="answers_div">
                                <div class="left_answers">
                                    <div class="bold_text">Success Rate</div>
                                    <div class="marks">
                                        @if ($total_count == 0)
                                            0
                                        @else
                                            {{ ($published_count / $total_count) * 100 }}
                                        @endif
                                    </div>
                                </div>
                                <div class="right_icon">
                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>


                        <div class="five_grid">
                            <div class="grid_particle activated_part" data-id="summary" onclick="show_spec_part(this)">
                                SUMMARY
                            </div>
                            <div class="grid_particle" data-id="review" onclick="show_spec_part(this)">
                                In Review ({{ $inreview_count }})
                            </div>
                            <div class="grid_particle" data-id="selected" onclick="show_spec_part(this)">
                                Selected ({{ $selected_count }})
                            </div>
                            <div class="grid_particle" data-id="published" onclick="show_spec_part(this)">
                                Published ({{ $published_count }})
                            </div>
                            <div class="grid_particle" data-id="not_selected" onclick="show_spec_part(this)">
                                NOT SELECTED ({{ $not_selected_count }})
                            </div>
                        </div>

                        <div id="table_holder">
                            <div class="overflow_auto common_tables mt-5" id="summary">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Question</th>
                                            <th scope="col">Submitted On</th>
                                            <th scope="col">Publishing Deadline</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($answers_data as $key => $item)
                                            <tr>
                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->deadline }}</td>
                                                <td class="users_ans">{!! $item->user_answer !!}</td>
                                                <td>{{ $item->source }}</td>
                                                <td>
                                                    @if ($item->citation == 0)
                                                        In Review
                                                    @elseif($item->citation == 3)
                                                        Not Selected
                                                    @elseif($item->citation == 1 && $item->deadline > now()->format('Y-m-d'))
                                                        Selected
                                                    @elseif($item->citation == 1 && $item->deadline <= now()->format('Y-m-d'))
                                                        Published
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>



                            <div class="overflow_auto common_tables d-none mt-5" id="review">

                                <div class="detailed_text">
                                    <b>In Review:</b> These answers are being reviewed by our editorial team for
                                    publication.
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Question</th>
                                            <th scope="col">Submitted On</th>
                                            <th scope="col">Publishing Deadline</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Source</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($answers_data as $key => $item)
                                            @if ($item->citation == 0)
                                                <tr>
                                                    <td>{{ $item->question }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->deadline }}</td>
                                                    <td class="users_ans">{!! $item->user_answer !!}</td>
                                                    <td>{{ $item->source }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>



                            <div class="overflow_auto common_tables d-none mt-5" id="selected">
                                <div class="detailed_text">
                                    <b>Selected:</b> {{ $appname }} has selected your answer, and shared it with the
                                    publisher for consideration. This does not not guarantee publication.
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Question</th>
                                            <th scope="col">Submitted On</th>
                                            <th scope="col">Publishing Deadline</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Source</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($answers_data as $key => $item)
                                            @if ($item->citation == 1 && $item->deadline > now()->format('Y-m-d'))
                                                <tr>
                                                    <td>{{ $item->question }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->deadline }}</td>
                                                    <td class="users_ans">{!! $item->user_answer !!}</td>
                                                    <td>{{ $item->source }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>



                            <div class="overflow_auto common_tables d-none mt-5" id="published">
                                <div class="detailed_text">
                                    <b>Published:</b> Answers you have submitted that have been published. Congrats!
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Article Title</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Published Date</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Share</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($answers_data as $key => $item)
                                            @if ($item->citation == 1 && $item->deadline <= now()->format('Y-m-d'))
                                                <tr>
                                                    <td>{{ $item->question }}</td>
                                                    <td>
                                                        <a target="_blank"
                                                            href="/read-experts-articles/{{ $item->question_serial }}/{{ $item->question }}"
                                                            class="btn btn-primary btn-sm px-3">Visit Link</a>
                                                    </td>
                                                    <td class="users_ans">{{ $item->published_date }}</td>
                                                    <td>{{ $item->source }}</td>
                                                    <td>
                                                        <button class="btn btn-dark btn-sm px-3"
                                                            data-url="{{ url('/') }}/read-experts-articles/{{ $item->question_serial }}/{{ $item->question }}"
                                                            onclick="copyText(this)">Copy URL</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>


                            <div class="overflow_auto common_tables d-none mt-5" id="not_selected">
                                <div class="detailed_text">
                                    <b>Not Selected:</b> Questions you have answered, but were not selected. You can edit
                                    the answers again, if it is within the delivery time.
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Question</th>
                                            <th scope="col">Submitted On</th>
                                            <th scope="col">Publishing Deadline</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Source</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($answers_data as $key => $item)
                                            @if ($item->citation == 3)
                                                <tr>
                                                    <td>{{ $item->question }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->deadline }}</td>
                                                    <td class="users_ans">{!! $item->user_answer !!}</td>
                                                    <td>{{ $item->source }}</td>
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
    </div>
@endsection


@section('scripts')
    <script>
        $(".track_answers").addClass("active");
        let table = new DataTable('#summary .table');
        let table2 = new DataTable('#review .table');
        let table3 = new DataTable('#selected .table');
        let table4 = new DataTable('#published .table');
        let table5 = new DataTable('#not_selected .table');
    </script>
@endsection
