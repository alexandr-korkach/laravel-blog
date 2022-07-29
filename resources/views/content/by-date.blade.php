@extends('layouts.main')
@section('title', 'Блог')
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Пости за {{ $date }}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('content')
        @if($articles->count())
        @foreach($articles as $article)
                <div class="col-lg-6">
                    @include('content.blog-post')
                </div>
        @endforeach
                {{ $articles->onEachSide(1)->links() }}
        @else
        В цей день нічого не написано.
        @endif

@endsection
