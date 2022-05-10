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
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
