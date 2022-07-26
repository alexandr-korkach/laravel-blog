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
                   @include('content.blog-post')
                </div>
        @endforeach
                {{ $articles->onEachSide(1)->links() }}


@endsection
