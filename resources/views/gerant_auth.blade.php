@extends('template')

@section('title')
    Se connecter
@endsection

@section('content')
    <form action="{{route('auth.login')}}" method="post">
        @csrf
        Login
        <input type="email" name="email" value="{{old('email')}}" placeholder="Email">
        @error("email")
        {{ $message}}
        @enderror
        <br>
        Password
        <input type="password" name="password">
        @error("password")
        {{ $message }}
        @enderror
        <br>
        <input type="submit" value="Se connecter">
    </form>
@endsection