<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Админ панель - @yield("title")</title>
    <!-- Bootstrap core CSS -->
{{--    <link href="{{ asset("css/bootstrap.css")  }}" rel="stylesheet">--}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dashboard.css")  }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/admin-dashboard.css") }}">
</head>

<body>
<x-admin.header></x-admin.header>

<div class="container-fluid">
    <div class="row content">

        <x-admin.sidebar></x-admin.sidebar>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @yield("content")
        </main>
    </div>
</div>
{{--<script src="{{ asset("js/bootstrap.js") }}"></script>--}}
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- Icons -->
<script src="{{ asset("js/feather.js") }}"></script>
<script type="module" src="{{ asset("js/app.js")  }}"></script>
</body>
</html>

