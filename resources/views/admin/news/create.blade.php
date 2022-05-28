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
                        <label for="new-title" class="form-new-label">Заголовок новости</label>
                        <input type="text" class="form-control" id="new-title" name="new-title">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="new-small-desc" class="form-new-label">Короткое описание</label>
                        <textarea name="new-small-desc" id="new-small-desc"
                                  class="add-new-area add-new-area__small-desc"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="new-full-desc" class="form-new-label">Полное описание</label>
                        <textarea name="new-full-desc" id="new-full-desc"
                                  class="add-new-area add-new-area__full-desc"></textarea>
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
