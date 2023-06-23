@extends('surface.layouts.app')

@section('title')
    {{ $type }} - {{ $appname }}
@endsection


@section('content')
    <style>
        p {
            padding-bottom: 0px;
            margin-bottom: 0px;
        }
    </style>
    <div class="container">
        <div class="terms_title">{{ $type }}</div>

        <pre class="blog_main_details mb-5 pb-5">{!! $data !!}</pre>
    </div>
@endsection


@section('scripts')
    <script>
        $(".home").addClass("active");
    </script>
@endsection
