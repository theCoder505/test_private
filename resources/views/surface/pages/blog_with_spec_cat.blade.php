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

                <div class="experts_sayings">
                    <h1 class="text-center font-weight-bold my-3">
                        Category: {{ $category_name }}
                    </h1>
                    <div class="all_post_tablines_2">
                        <a class="post_tabline_2 text-dark" href="/read-blogs" onclick="showSpecAllPosts(this)"> All Industries </a>

                        @forelse ($industry_options as $item_key => $item)
                            <a class="post_tabline_2 text-dark @if ($category_name == $item->option_name) active_line @endif"
                                href="/read-blog-with-experts/category/{{ $item->option_name }}"
                                onclick="showSpecIndustryPosts(this)">
                                {{ $item->option_name }}
                            </a>
                        @empty
                        @endforelse
                    </div>


                    <div class="blog_container_added">
                        @forelse ($admin_queries as $key2 => $blog)
                            <div class="blog_item common_exprt_blog" data-id='{{ $blog->industries_data }}'>
                                <img src="{{ $blog->question_image }}" alt="Image" class="blog_img">
                                <div class="blog_detail_part">
                                    <a class="blog_title"
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
                            <h1 class="text-danger text-center">No Related Blogs In This Category</h1>
                        @endforelse
                    </div>
                </div>



            </div>


        </div>

    </div>
@endsection



@section('scripts')
@endsection
