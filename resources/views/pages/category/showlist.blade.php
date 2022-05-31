@extends("layouts.pages")
@section("content")

    <div class="container">
        <ul>
        @forelse($cats as $oneCat)
                <li>
                    <a href="{{ route("showcat", $oneCat->id) }}">{{ $oneCat->name }}</a>
                </li>
        @empty
        <h2>Нет категорий</h2>
        @endforelse
        </ul>
    </div>

@endsection
