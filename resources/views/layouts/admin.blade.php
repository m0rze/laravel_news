<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Админ панель - @yield("title")</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset("css/bootstrap.css")  }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dashboard.css")  }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/admin-dashboard.css") }}">
</head>

<body>
<x-admin.header></x-admin.header>

<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @yield("content")
        </main>
    </div>
</div>
<script src="{{ asset("js/bootstrap.js") }}"></script>

<!-- Icons -->
<script src="{{ asset("js/feather.js") }}"></script>
</body>
</html>

