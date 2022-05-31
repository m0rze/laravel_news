@extends("layouts.admin")
@section("title", "Добавить категию")
@section("content")
    <div class="container">
        <h1>Добавить категорию</h1>
        <div class="row">
            @include("inc.messages")
            <form action="{{ route("admin.categories.store") }}" class="add-new-item" method="post">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <label for="cat-name" class="form-new-label">Имя категории</label>
                        <input type="text" class="form-control" id="cat-name" name="title">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="cat-desc" class="form-new-label">Описание категории</label>
                        <textarea name="description" id="cat-desc"
                                  class="add-new-area add-new-area__small-desc"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-rnd btn-success add-new-button">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
