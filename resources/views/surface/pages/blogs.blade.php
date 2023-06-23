@extends('surface.layouts.app')

@section('title')
    Read Our Blogs And Know What Experts Say | {{ $appname }}
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
                <h2 class="text-center font-weight-bold mt-5 mb-3">What Our Experts Say?</h2>
                <div class="all_post_tablines_2">
                    <a class="post_tabline_2 active_line" href="/read-blogs" onclick="showSpecAllPosts(this)"> All Industries
                    </a>

                    @forelse ($industry_options as $item_key => $item)
                        <a class="post_tabline_2 text-dark" href="/read-blog-with-experts/category/{{ $item->option_name }}"
                            onclick="showSpecIndustryPosts(this)">
                            {{ $item->option_name }}
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="col-md-8">

                <div class="experts_sayings">
                    <div class="blog-container">


                        @forelse ($admin_queries as $key2 => $blog)
                            <div class="blog_item_2 common_exprt_blog" data-id='{{ $blog->industries_data }}'>
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
                        @endforelse


                    </div>
                </div>


            </div>

            <div class="col-md-4">


                <form action="/search-results" method="get">
                    <div id="search_box">
                        <input type="text" class="search_input" placeholder="Enter search terms" name="search" required>
                        <button class="btn btn_search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>

                <div class="bg-info text-center font-weight-bold btn-circle btn btn-block text-light mt-4">
                    Questions & Answers
                </div>


                @forelse ($admin_queries as $question_key => $blog)
                    @if ($question_key < 15)
                        <a href="/read-experts-articles/{{ $blog->question_id }}/{{ $blog->title }}"
                            class="side_blog_title">
                            <div>
                                {{ $blog->title }}
                            </div>
                            <div class="blog_side_text">
                                {{ date('F d, Y', strtotime($blog->added_time)) }}
                            </div>
                        </a>
                    @endif
                @empty
                @endforelse

            </div>


            <div class="col-md-12">

                <div class="web_blogs">
                    <h2 class="text-center font-weight-bold my-3">{{ $appname }} Blogs</h2>
                    <div class="all_post_tablines">
                        <a class="post_tabline active_line" href="/read-blogs#{{ $appname }}_blogs"> All Posts </a>
                        @forelse ($blog_cats as $key => $category)
                            <a class="post_tabline text-dark"
                                href="/read-specific-blogs/category/{{ $category->category_name }}">
                                {{ $category->category_name }}
                            </a>
                        @empty
                        @endforelse
                    </div>

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
                    @endforelse


                </div>
            </div>


        </div>

    </div>
@endsection



@section('scripts')
    <script>
        $(".blogs").addClass("active");
    </script>
@endsection
