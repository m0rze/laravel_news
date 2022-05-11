@extends("layouts.pages")
@section("content")

    <div class="container">
        <div class="row">
            @forelse($news as $oneNews)
                <div class="col-md-4">
                    <h2>{{ $oneNews["title"] }}</h2>
                    <p>{{ $oneNews["description"] }}</p>
                    <p><a class="btn btn-secondary" href="{{ route("onenews", $oneNews["id"]) }}" role="button">View
                            details &raquo;</a></p>
                </div>
            @empty
                <h2>Нет новостей</h2>
            @endforelse

        </div>

        <hr>

    </div>

@endsection
