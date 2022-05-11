@extends("layouts.admin")
@section('title', 'Список новостей')
@section("content")

    <div class="section-header">
        <h2>Список новостей</h2>
        <a href="{{ route("admin.news.create") }}" class="add-new-button btn btn-rnd btn-success">Добавить новую</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>id</th>
                <th>Заголовок</th>
                <th>Категория</th>
                <th>Дата добавления</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $oneNews)
                <tr>
                    <td>{{ $oneNews["id"] }}</td>
                    <td><a href="{{ route("admin.news.edit", $oneNews["id"]) }}">{{ $oneNews["title"] }}</a></td>
                    <td>{{ $oneNews["catId"] }}</td>
                    <td>{{ $oneNews["createData"]->format("d.m.Y") }}</td>
                </tr>
            @empty
                <h2>Нет новостей</h2>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection
