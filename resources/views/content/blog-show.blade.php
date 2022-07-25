@extends('layouts.main')
@section('title',  $article->title )
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Стаття</h4>
                            <h2>{{ $article->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="blog-post">
            <div class="blog-thumb">
                <img src="{{ $article->img }}" alt="">
            </div>
            <div class="down-content">
                <span>{{ $article->category->title }}</span>
                <h4>{{ $article->title }}</h4>
                <ul class="post-info">
                    <li><a href="#">{{ $article->user->name }}</a></li>
                    <li><a href="#">{{ $article->getFormattedDateString() }}</a></li>
                    <li><a href="#comments">{{ $article->getFormattedCommentCount() }}</a></li>
                </ul>
                <p>{{ $article->body }}</p>
                <div class="post-options">
                    <div class="row">
                        <div class="col-6">
                            <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach($article->tags as $tag)
                                    @if(!$loop->last)
                                        <li><a href="{{ route('blog.by-tag', $tag->slug) }}">{{ $tag->title }}</a>,</li>
                                    @else
                                        <li><a href="{{ route('blog.by-tag', $tag->slug) }}">{{ $tag->title }}</a></li>
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
    <div class="col-lg-12" id="comments">
        @auth()
            <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                    <h2>Введіть ваш коментар</h2>
                </div>
                <div class="content">
                    <form id="comment" action="{{ route('blog.comments.create') }}" method="get">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="row">

                            <div class="col-lg-12">
                                <fieldset>

                                    <textarea name="message" class="@error('message') is-invalid @enderror"  rows="6" id="message" placeholder="Введіть ваш коментар" required="">
                                        {{ old('message') }}
                                    </textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Відправити</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endauth
        @guest()
            <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                    <h2><a href="{{ route('login.page') }}">Війти</a>, щоб мати можливість залишати коментарі</h2>
                </div>

            </div>
        @endguest
    </div>
    @if($article->comments->count())
    <div class="col-lg-12">
        <div class="sidebar-item comments" >
            @if(session('success'))
                <div class="alert alert-success " role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="sidebar-heading">
                <h2>{{ $article->getFormattedCommentCount() }}</h2>
            </div>
            <div class="content">
                <ul>
                    @foreach($article->comments as $comment)
                    <li>
                        <div class="author-thumb">
                            <img src="{{ $comment->user->avatar }}" alt="">
                        </div>
                        <div class="right-content">
                            <h4>{{ $comment->user->name }}<span>{{ $comment->getFormattedDateString() }}</span>
                              @if(auth()->check() && (auth()->user() == $comment->user))
                                <form action="{{ route('blog.comments.destroy', $comment->id) }}" class="comments-delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"   value="Видалити коментар">

                                </form>@endif</h4>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    @endif

@endsection
