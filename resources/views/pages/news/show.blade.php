@extends("layouts.pages")
@section("content")

    @if($news)
    <div class="container">
        <article>
            <h2>{{ $news->title }}</h2>
            <p>{{ $news->body }}</p>
            <p>Категория: <a href="{{ route("showcat", $news->category_id) }}">{{ $news->category_name }}</a></p>
        </article>
    </div>
    @else
        <div class="container">
            <article>
                <h2>Такой новости не существует</h2>
            </article>
        </div>
    @endif
@endsection
