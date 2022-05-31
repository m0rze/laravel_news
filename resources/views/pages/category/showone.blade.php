@extends("layouts.pages")
@section("content")

    <div class="container">
        <article>
            <h2>{{ $cat->name }}</h2>
            <p>{{ $cat->description }}</p>
            <h5>Id категории: {{ $cat->id }}</h5>
            <p><a href="{{ route("newslistbycat", $cat->id) }}">Список новостей категории</a></p>
        </article>
    </div>

@endsection
