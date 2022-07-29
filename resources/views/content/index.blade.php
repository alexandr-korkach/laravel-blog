@extends('layouts.main')
@section('title', 'Головна сторінка')
@section('banner')
    @include('content.main-banner')
@endsection
@section('content')
    @foreach($articles as $article)
        <div class="col-lg-12">
            @include('content.blog-post')
        </div>
    @endforeach
    <div class="col-lg-12">
        <div class="main-button">
            <a href="{{ route('blog.index') }}">View All Posts</a>
        </div>
    </div>
@endsection
