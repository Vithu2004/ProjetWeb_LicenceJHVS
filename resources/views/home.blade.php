@extends('template')

@section('title')
    Home
@endsection

@section('content')
    <a href="{{route('gerant')}}">Gérant</a>
    <a href="{{route('billeterie')}}">Billeterie</a>
@endsection