@extends('surface.layouts.app')

@section('title')
    Search Results For {{ $search_item }} at {{ $appname }}
@endsection



@section('content')
    <style>
        .blog_small_desc {
            text-transform: capitalize;
        }
    </style>




    <div class="container">



        <div class="row">

            <div class="col-md-12">
                <h2 class="text-center font-weight-bold mt-5 mb-3">
                    Search Results For: {{ $search_item }}
                </h2>
            </div>

            <div class="col-md-12">

                <div class="experts_sayings">
                    <div class="blog_container_added">


                        @forelse ($admin_queries as $key2 => $blog)
                            <div class="blog_item common_exprt_blog" data-id='{{ $blog->industries_data }}'>
                                <img src="{{ $blog->question_image }}" alt="Image" class="blog_img">
                                <div class="blog_detail_part">
                                    <a class="blog_title text-dark"
                                        href="/read-experts-articles/{{ $blog->question_id }}/{{ $blog->title }}">
                                        {{ $blog->title }}
                                    </a>
                                    <div class="blog_time">
                                        {{ str_replace(['[', ']', '"', ','], ['', '', '', ', '], $blog->industries_data) }}
                                    </div>
                                    <div class="blog_time">
                                        {{ date('F d, Y', strtotime($blog->added_time)) }}
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h1></h1>
                            <h4 class="text-center text-danger">No Related Question Found!</h4>
                        @endforelse


                    </div>
                </div>


            </div>


            <div class="col-md-12">

                <div class="web_blogs">
                    <h2 class="text-center font-weight-bold my-3">
                        {{ $appname }} Blogs | Search Results For: {{ request()->query('search') }}
                    </h2>
                </div>
            </div>



            <div class="col-md-12" id="{{ $appname }}_blogs">
                <div class="blog_container_added">


                    @forelse ($blog_data as $key2 => $blog)
                        <div class="blog_item" data-class="{{ $blog->blog_category }}">
                            <img src="{{ $blog->blog_image }}" alt="" class="blog_img">
                            <div class="blog_detail_part">
                                <a href="/see-blog/{{ $blog->sno }}/{{ $blog->blog_category }}/{{ $blog->blog_title }}"
                                    class="blog_title">
                                    {{ $blog->blog_title }}
                                </a>
                                <div class="blog_time">
                                    {{ date('F d, Y', strtotime($blog->time)) }}
                                </div>
                                <p class="blog_small_desc">
                                    {{ substr($blog->blog_description, 0, 100) }}...
                                </p>
                            </div>
                        </div>

                    @empty
                        <h1></h1>
                        <h4 class="text-center text-danger">No Related Blogs Found!</h4>
                    @endforelse


                </div>
            </div>


        </div>

    </div>
@endsection



@section('scripts')
@endsection
