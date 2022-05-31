<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Агрегатор новостей @yield("title")</title>

    <link href="{{ asset("css/bootstrap.css")  }}" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
</head>

<body>

<x-pages.topmenu></x-pages.topmenu>

<main role="main">
    <x-pages.header></x-pages.header>
@yield("content");
</main>

<footer class="container">
<x-pages.footer></x-pages.footer>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset("js/bootstrap.js") }}"></script>
</body>
</html>

