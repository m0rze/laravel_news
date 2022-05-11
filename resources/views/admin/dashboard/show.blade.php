@extends("layouts.admin")
@section('title', 'Main page')
@section("content")
    <h1>Dashboard</h1>
    <div class="row">
        <strong>Всего категорий: </strong> {{ $catsCount }}
    </div>
    <div class="row">
        <strong>Всего новостей: </strong> {{ $newsCount }}
    </div>
@endsection
