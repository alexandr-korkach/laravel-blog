@extends('layouts.reg-log')
@section('title', 'Stand Blog: Вхід')
@section('form')

<form class="form-signin" action="{{ route('register') }}" method="POST" >
    @csrf
    <a class="navbar-brand" href="{{ route('home') }}"><h2>Stand Blog<em>.</em></h2></a>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                    {{$loop->iteration.' '. $error }}<br>
                @endforeach

        </div>
    @endif

      <h1 class="h3 mb-3 font-weight-normal">Реєстрація</h1>

    <div class="form-group">
        <label for="exampleInputName">Ваше ім'я</label>
        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Електронна пошта</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp" >
        <small id="emailHelp" class="form-text text-muted">Ми не передаємо Ваші дані третім особам</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Повторіть пароль</label>
        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="check" class="form-check-input @error('check') is-invalid @enderror" id="exampleCheck1">
        <label class="form-check-label"  for="exampleCheck1">Погоджуюсь з правилами</label>
    </div>
    <button type="submit" class="btn btn-primary">Відправити</button>
    <a href="{{ route('login.page') }}">У мене вже є акаунт</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
</form>
@endsection
