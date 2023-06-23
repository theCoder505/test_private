@extends('menufacturers.layouts.app')

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

        .tox.tox-tinymce {
            height: 500px !important;
        }

        .category_image {
            max-width: 100%;
            height: auto;
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

                        <h2 class="mb-0 mt-5 font-weight-bold mb-4">
                            Reply The Query to get citations, more trusts & rank!
                        </h2>

                        <form action="/admin/submit-questions-reply" method="post">
                            @csrf

                            <div class="form-group">

                                @forelse ($question_spec_data as $item)
                                    <center>
                                        <img src="{{ $item->question_image }}" alt="image" class="category_image">
                                    </center>
                                    <p class="question_title">{{ $item->title }}</p>
                                    <p class="question_details">{{ $item->details }}</p>
                                @empty
                                @endforelse

                                @if ($count_query > 0)
                                    <label class="font-weight-bold mt-5 mb-3">Your Reply:</label>
                                    <pre class="qstnreply">{!! $reply_data !!}</pre>
                                @else
                                    <input type="hidden" name="question_sno" value="{{ $question_sno }}">
                                    <input type="hidden" name="question_image" value="{{ $item->question_image }}">
                                    <input type="hidden" name="question_title" value="{{ $item->title }}">
                                    <input type="hidden" name="question_details" value="{{ $item->details }}">
                                    <textarea class="form-control" id="query_reply" rows="10" name="query_reply" placeholder="Reply Questions Answer"></textarea>
                                    <button class="btn btn-lg btn-block btn-dark">SUBMIT REPLY</button>
                                @endif

                            </div>



                        </form>


                    </div>


                </div>





            </div>


        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(".answer_queries").addClass("active");
        tinymce.init({
            selector: '#query_reply',
        });
    </script>
@endsection
