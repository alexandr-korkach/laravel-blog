@extends('layouts.main')
@section('title', 'Блог')
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('content')
        @foreach($articles as $article)
                <div class="col-lg-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{ $article->img }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>{{ $article->category->title }}</span>
                            <a href="post-details.html"><h4>{{ $article->title }}</h4></a>
                            <ul class="post-info">
                                <li><a href="#">{{ $article->user->name }}</a></li>
                                <li><a href="#">{{ $article->getFormattedDateString() }}</a></li>
                                <li><a href="#">{{ $article->getFormattedCommentCount() }}</a></li>
                            </ul>
                            <p>{{ $article->description }}</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
                {{ $articles->onEachSide(1)->links() }}


@endsection
