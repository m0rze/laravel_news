@extends("layouts.admin")
@section("title", "Добавить новость")
@section("content")
    <div class="container">
        <h1>Добавить новость</h1>
        <div class="row">
            @include("inc.messages")
            <form action="{{ route("admin.news.store") }}" class="add-new-item" method="post">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <label for="author" class="form-new-label">Автор</label>
                        <input type="text" class="form-control" id="new-title" name="author" value="{{ old("author") }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="category" class="form-new-label">Категория</label>
                        <select name="category_id" id="status" class="form-control">
                            @forelse($categories as $oneCategory)
                                <option value="{{ $oneCategory->id }}" @if(old("category_id") == $oneCategory->id) selected @endif>{{ $oneCategory->title }}</option>
                            @empty
                                <option value="">Нет категорий</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="new-title" class="form-new-label">Заголовок новости</label>
                        <input type="text" class="form-control" id="new-title" name="title" value="{{ old("title") }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="new-small-desc" class="form-new-label">Короткое описание</label>
                        <textarea name="description" id="new-small-desc"
                                  class="add-new-area add-new-area__small-desc">{{ old("description") }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="new-full-desc" class="form-new-label">Содержание</label>
                        <textarea name="body" id="new-full-desc"
                                  class="add-new-area add-new-area__full-desc">{{ old("body") }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="status" class="form-new-label">Статус</label>
                        <select name="status" id="status" class="form-control">
                            <option @if(old("status") === "DRAFT") selected @endif>DRAFT</option>
                            <option @if(old("status") === "ACTIVE") selected @endif>ACTIVE</option>
                            <option @if(old("status") === "BLOCKED") selected @endif>BLOCKED</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="image" class="form-new-label">Изображение</label>
                        <input type="file" id="image" name="image" class="form-control">
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
