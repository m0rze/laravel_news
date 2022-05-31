@extends("layouts.pages")
@section("content")

    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route("storeorder") }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="name">Имя</label>
                    </div>
                    <div class="row">
                        <input id="name" type="text" name="name" class="form-control" value="{{ old("name") }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="phone">Телефон</label>
                    </div>
                    <div class="row">
                        <input id="phone" type="text" name="phone" class="form-control" value="{{ old("phone") }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="email">Email</label>
                    </div>
                    <div class="row">
                        <input id="email" type="text" name="email" class="form-control" value="{{ old("email") }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="order_info">Информация о заказе</label>
                    </div>
                    <div class="row">
                    <textarea name="order_info" id="order_info" cols="30" rows="10" class="form-control">
                        {{ old("order_info") }}
                    </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="form-control btn btn-rnd btn-success" type="submit">Отправить</button>
                    </div>
                </div>
            </form>
        </div>



    </div>

@endsection
