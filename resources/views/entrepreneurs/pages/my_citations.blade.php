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
                            All My Citations
                        </h2>


                        <div class="admin_questions_holder">

                            @forelse ($citation_data as $item)
                                <div class="citation_line">
                                    @forelse ($admin_queries as $qstns)
                                        @if ($qstns->question_id == $item->question_serial)
                                            <img src="{{ $qstns->question_image }}" alt="image" class="citation_img">
                                        @endif
                                    @empty
                                    @endforelse
                                    <a href="/see-specific-admin-question/{{ $item->question_serial }}"
                                        class="btn btn-info btn-block">Preview</a>
                                </div>
                            @empty
                                <div class="citation_line"></div>
                                <div class="citation_line">
                                    <h2 class="text-center font-weight-bold text-danger">You have no Citations yet!</h2>
                                </div>
                                <div class="citation_line"></div>
                            @endforelse

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
        $(".citations").addClass("active");
        tinymce.init({
            selector: '#query_reply',
        });
    </script>
@endsection
