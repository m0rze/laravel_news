@extends("layouts.pages")
@section("content")

    <div class="container">
        <form action="{{ route("sendfeedback") }}" method="POST">
            @csrf
            <div class="form-group col-6">
                <div class="row">
                    <label for="name">Имя</label>
                </div>
                <div class="row">
                    <input id="name" type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group col-6">
                <div class="row">
                    <label for="message">Сообщение</label>
                </div>
                <div class="row">
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button class="form-control btn btn-rnd btn-success" type="submit">Отправить</button>
                </div>
            </div>
        </form>
    </div>

@endsection
