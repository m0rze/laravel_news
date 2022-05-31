@extends("layouts.admin")
@section('title', 'Список категорий')
@section("content")

    <div class="section-header">
        <h2>Список Категорий</h2>
        <a href="{{ route("admin.categories.create") }}" class="add-new-button btn btn-rnd btn-success">Добавить новую</a>
    </div>
    <div class="table-responsive">
        @include("inc.messages")
        @csrf
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя категории</th>
                <th>Дата добавления</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cats as $oneCat)
                <tr>
                    <td>{{ $oneCat->id }}</td>
                    <td>{{ $oneCat->title }}</td>
                    <td>{{ $oneCat->created_at }}</td>
                    <td>
                        <a href="{{ route("admin.categories.edit", $oneCat->id) }}">Edit</a><br>
                        <a data-id="{{ $oneCat->id }}" data-type="categories" href="#" class="delete-link">Delete</a>
                    </td>
                </tr>
            @empty
                <h2>Нет новостей</h2>
            @endforelse

            </tbody>
        </table>
        {{ $cats->links() }}
    </div>
@endsection
