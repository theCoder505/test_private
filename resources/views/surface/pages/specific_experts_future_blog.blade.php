@extends('surface.layouts.app')

@section('title')
    Read Particular Blog From - {{ $appname }}
@endsection



@section('content')
    <div class="container my-5">

        @forelse ($question_data as $item)
            <input type="hidden" value="<?php echo csrf_token(); ?>" class="_token">

            <div class="super_blog_title">{!! $item->title !!} </div>

            <div class="row w-75 mx-auto my-5">
                <div class="col-md-6">
                    <div class="author">
                        <img src="{{ $siteicon }}" alt="" class="author_img">
                        <div class="">
                            <div class="author_name">{{ $appname }} </div>
                            <div class="blog_time text-left mb-1"> {{ date('F d, Y', strtotime($item->deadline)) }} </div>
                            <input type="hidden" class="question_id" value="{{ $item->question_id }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-right">
                    <a href="{{ $linkedIn }}" target="_blank" class="circularLink">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a href="{{ $fb }}" target="_blank" class="circularLink mx-2">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="{{ $insta }}" target="_blank" class="circularLink">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>

            </div>


            <div class="src_tab">
                <img src="{{ $item->question_image }}" alt="" class="image_thing blog_thumbnail_img"
                    onclick="activateInput(this)">
                <input type="file" name="blog_main_image" class="file_input d-none" accept="image/*"
                    onchange="showSpecImageInSpecField(this)">
            </div>


        @empty
            <h1 class="text-center font-weight-bold text-danger my-5 py-5">This Question Is Not Published Yet!</h1>
        @endforelse




        <div id="content_holder">

            <div id="left_section">
                <div class="content_blue_div">
                    <img src="{{ $sitelogo }}" alt="" class="weblogo">
                    <h5 class="text-center my-3">
                        Q&A Content for the Open Web
                    </h5>
                    <a href="/sign-in" class="btn get_started_btn">Get Started</a>
                </div>
                <div class="table_of_contents">
                    <h5 class="">Table of Contents</h5>
                    <a class="table_query">{!! $main_question !!}</a>

                    @forelse ($related_blogs as $key2 => $blog)
                        <a href="#answer{{ $key2 + 1 }}"
                            class="table_query users_head_line{{ $blog->id }}">{!! $blog->answer_headline !!}</a>
                    @empty
                    @endforelse
                </div>
            </div>




            <div id="all_related_answers">

                <h2 class="arial main_question" contenteditable="true" onkeyup="change_on_main_title(this)">
                    {!! $main_question !!} </h2>
                <p class="arial user_answer mt-4 question_details" contenteditable="true">{!! $main_question_details !!} </p>


                <ul class="mb-5">
                    @forelse ($related_blogs as $key2 => $blog)
                        <li class="users_head_line{{ $blog->id }}">{!! $blog->answer_headline !!}</li>
                    @empty
                    @endforelse
                </ul>

                <button class="btn btn-lg btn-dark px-5 my-3" onclick="updateQuestion(this)">
                    Update Question
                </button>






                @forelse ($related_blogs as $key2 => $blog)
                    <div class="answer_line" id="answer{{ $key2 + 1 }}">
                        <input type="hidden" value="{{ $blog->id }}" class="reply_id">

                        <div class="answer_title user_ans_headline" data-headline="{{ $blog->id }}"
                            contenteditable="true" onkeyup="make_title_changes(this)">
                            {!! $blog->answer_headline !!}</div>
                        <div class="user_answer user_answer" contenteditable="true">
                            {!! $blog->user_answer !!}</div>
                        <div class="user_info">
                            <div class="left_user_image">
                                <img src="{{ $blog->user_comp_image }}" alt="image" class="w-100">
                            </div>
                            <div class="right_all_texts">
                                <a href="/see-user-profile/{{ $blog->replier_id }}/{{ $blog->user_acc_name }}"
                                    class="linked_in_profile">{{ $blog->user_acc_name }}</a> <br>
                                <span class="capitalize"> {{ $blog->user_full_name }} </span> as <span
                                    class="capitalize">{{ $blog->replier_type }}</span> at
                                {{ $appname }},
                                <a href="{{ $blog->user_website }}"
                                    class="linked_in_profile">{{ $blog->user_business_name }}</a>


                                @if ($blog->replier_type == 'influencer')
                                    <div class="social_links">
                                        <a href="{{ $blog->user_linkedin_url }}" target="_blank" class="social_href"
                                            rel="noopener noreferrer">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $blog->user_insta_url }}" target="_blank" class="social_href"
                                            rel="noopener noreferrer">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $blog->user_fb_url }}" target="_blank" class="social_href"
                                            rel="noopener noreferrer">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $blog->user_affiliate_url }}" target="_blank" class="social_href"
                                            rel="noopener noreferrer">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @else
                                @endif

                            </div>
                        </div>
                        <button class="btn btn-info btn-sm px-5 my-3" onclick="updateChange(this)">
                            Update Reply
                        </button>
                    </div>

                @empty
                @endforelse



                <div class="answer_line mt-4">

                    <div class="answer_title">Submit Your Answer</div>
                    <div class="user_answer">
                        Would you like to submit an alternate answer to the question, “What’s the best client thank you gift
                        you’ve ever given?”
                    </div>
                    <a href="/sign-in" class="linked_in_profile">Submit your answer here.</a>
                </div>

                <div class="answer_line">
                    <div class="answer_title">
                        Related Questions
                    </div>
                    @forelse ($related_questions as $key => $questions)
                        @if ($key < 4)
                            <a href="/read-experts-articles/{{ $questions->question_id }}/{{ $questions->title }}"
                                class="linked_in_profile">{{ $questions->title }}</a> <br>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>

        </div>





    </div>
@endsection



@section('scripts')
    <script>
        $(".blogs_with_experts").addClass("active");
    </script>
@endsection
