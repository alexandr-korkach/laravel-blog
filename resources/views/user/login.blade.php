@extends('layouts.reg-log')
@section('title', 'Stand Blog: Вхід')
@section('form')

<form class="form-signin" action="{{ route('login') }}" method="POST" >
    @csrf
    <a class="navbar-brand" href="{{ route('home') }}"><h2>Stand Blog<em>.</em></h2></a>
      <h1 class="h3 mb-3 font-weight-normal">Введіть ваші дані</h1>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="inputEmail" class="sr-only">Електронна адреса</label>
    <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Електронна адреса" value="{{ old('email') }}" required autofocus>
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" required placeholder="Пароль" >
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="1"> Запам'ятати мене
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">Війти</button>
    <a href="">У мене немає акаунта</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
</form>
@endsection
