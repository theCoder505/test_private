@extends('surface.layouts.app')

@section('title')
    Read Particular Blog From - {{ $appname }}
@endsection



@section('content')
    <style>
        .blog_item:nth-child(5n+1),
        .blog_item:nth-child(1) {
            grid-column: unset;
        }

        .blog-container {
            padding: 50px 0px;
            max-width: unset;
            margin: 0px auto;
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(3, 1fr);
        }
    </style>

    <div class="container my-5">

        @forelse ($blog_data as $blog)
           

            <div class="super_blog_title">{{ $blog->blog_title }} </div>

            <div class="row w-75 mx-auto my-5">
                <div class="col-md-6">
                    <div class="author">
                        <img src="{{ $siteicon }}" alt="" class="author_img">
                        <div class="">
                            <div class="author_name">Author: {{ $appname }} </div>
                            <div class="blog_time text-left mb-1"> {{ date('F d, Y', strtotime($blog->time)) }} </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-right">
                    <a href="{{ $linkedIn }}" target="_blank" class="circularLink">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>


            <img src="{{ $blog->blog_image }}" alt="" class="blog_thumbnail_img">
            <pre class="blog_main_details">{!! $blog->blog_description !!}</pre>

        @empty
        @endforelse












        <div class="more_related_blogs mt-5 pt-5">
            <h2 class="font-weight-bold">
                More Related Blogs
            </h2>


            <div class="blog-container">


                @forelse ($related_blogs as $key2 => $blog)
                    <div class="blog_item" data-class="{{ $blog->blog_category }}">
                        <img src="{{ $blog->blog_image }}" alt="" class="blog_img">
                        <div class="blog_detail_part">
                            <h2 class="blog_title">
                                {{ $blog->blog_title }}
                            </h2>
                            <div class="blog_time">
                                {{ date('F d, Y', strtotime($blog->time)) }}
                            </div>
                            <p class="blog_small_desc">
                                {{ substr($blog->blog_description, 0, 100) }}...
                            </p>
                            <a class="read_more_blog"
                                href="/see-blog/{{ $blog->sno }}/{{ $blog->blog_category }}/{{ $blog->blog_title }}">
                                Read More
                            </a>
                        </div>
                    </div>

                @empty
                @endforelse


            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        $(".blogs_with_experts").addClass("active");
    </script>
@endsection
