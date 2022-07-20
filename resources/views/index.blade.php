@extends('layouts.main')
@section('title', 'Головна сторінка')
@section('banner')
    @include('main-banner')
@endsection
@section('content')
    @foreach($articles as $article)
        <div class="col-lg-12">
            <div class="blog-post">
                <div class="blog-thumb">
                    <img src="{{ $article->img }}" alt="">
                </div>
                <div class="down-content">
                    <span>{{ $article->category->title }}</span>
                    <a href="#"><h4>{{ $article->title }}</h4></a>
                    <ul class="post-info">
                        <li><a href="#">{{ $article->user->name }}</a></li>
                        <li><a href="#">{{ $article->created_at }}</a></li>
                        <li><a href="#">{{ $article->comments->count() }} Коментарів</a></li>
                    </ul>
                    <p>{{ $article->description }}</p>
                    <div class="post-options">
                        <div class="row">
                            <div class="col-6">
                                <ul class="post-tags">
                                    <li><i class="fa fa-tags"></i></li>
                                    @foreach($article->tags as $tag)
                                        @if(!$loop->last)
                                             <li><a href="#">{{ $tag->title }}</a>,</li>
                                        @else
                                             <li><a href="#">{{ $tag->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="post-share">
                                    <li><i class="fa fa-share-alt"></i></li>
                                    <li><a href="#">Facebook</a>,</li>
                                    <li><a href="#"> Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12">
        <div class="main-button">
            <a href="#">View All Posts</a>
        </div>
    </div>
@endsection
