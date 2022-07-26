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
    <div class="card" style="width: 20rem;" id="profile">
        @if(session('avatar'))
            <div class="alert alert-success " role="alert">
                {{ session('avatar') }}
            </div>
        @endif
        <img src="{{asset('storage/'.$user->avatar.'?'. time() )}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <form action="{{ route('profile.avatar', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input @error('avatar') is-invalid @enderror" id="customFile">
                    <label class="custom-file-label" for="customFile">Виберіть зображення</label>
                    @error('avatar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Завантажити</button>
            </form>

        </div>
    </div>


@endsection




