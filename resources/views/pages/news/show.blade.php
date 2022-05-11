@extends("layouts.pages")
@section("content")

    <div class="container">
        <article>
            <h2>{{ $news["title"] }}</h2>
            <p>{{ $news["body"] }}</p>
            <p>Категория: <a href="{{ route("showcat", $category["id"]) }}">{{ $category["name"] }}</a></p>
        </article>
    </div>

@endsection
