@extends("layouts.admin")
@section("title", "Редактировать категорию")
@section("content")
    <div class="container">
        <h1>Редактировать новость</h1>
        <div class="row">
            @include("inc.messages")
            <form action="{{ route("admin.categories.update", $currentCat->id) }}" class="add-new-item" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <label for="cat-name" class="form-new-label">Имя категории</label>
                        <input type="text" class="form-control" id="cat-name" name="cat-name" value="{{ $currentCat->name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="cat-desc" class="form-new-label">Описание категории</label>
                        <textarea name="cat-desc" id="cat-desc"
                                  class="add-new-area add-new-area__small-desc">{{ $currentCat->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-rnd btn-success add-new-button">Редактировать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
