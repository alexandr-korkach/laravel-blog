@extends('layouts.main')
@section('title', 'Блог')
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>"{{ request()->q }}"</h4>
                            <h2>Результати пошуку - {{ $articles->count() }}</h2>
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
                {{ $articles->onEachSide(1)->appends(['q'=>request()->q])->links() }}
        @else
            Нажаль нічого не знайдено.
        @endif

@endsection
