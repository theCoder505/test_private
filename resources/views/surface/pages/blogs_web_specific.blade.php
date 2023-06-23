@extends('surface.layouts.app')

@section('title')
    Read Our Blogs | {{ $appname }}
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

                <div class="web_blogs">

                    <h1 class="text-center font-weight-bold my-3">
                        {{ $appname }} Blogs | Category: {{ $category_name }}
                    </h1>

                    <div class="all_post_tablines">
                        <a class="post_tabline text-dark" href="/read-blogs#{{ $appname }}_blogs"> All Posts </a>
                        @forelse ($blog_cats as $key => $category)
                            <a class="post_tabline text-dark @if ($category_name == $category->category_name) active_line @endif"
                                href="/read-specific-blogs/category/{{ $category->category_name }}">
                                {{ $category->category_name }}
                            </a>
                        @empty
                        @endforelse
                    </div>

                </div>
            </div>



            <div class="col-md-12">
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
                        <h1 class="text-danger text-center">No Related Blogs In This Category</h1>
                    @endforelse


                </div>
            </div>


        </div>

    </div>
@endsection



@section('scripts')
@endsection
