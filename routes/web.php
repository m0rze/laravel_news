<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello/{userName}", function ($userName) {
    return "<h1>Привет, " . ucfirst($userName) . "</h1>";
});

Route::get("/about", function () {
    $about = "<h1>Информация о проекте</h1>";
    $about .= "<p>Это будет мега агрегатор новостей, которого еще никогда не было в интернете</p>";
    return $about;
});

Route::get("/news/{id}", function ($id) {
    $dummyNews = [
        [
            "title" => "Lorem ipsum dolor sit amet, consectetur.",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur delectus in nam
            numquam quaerat quam quos rerum sit voluptatibus."
        ],
        [
            "title" => "Cum nisi perferendis placeat quos sunt!",
            "body" => "Accusantium aliquid culpa doloremque doloribus illum placeat porro veniam voluptatum?
            Doloribus et libero quia tempora. Atque cum doloribus enim maiores!"
        ],
        [
            "title" => "Asperiores cum deleniti ipsa nemo ullam.",
            "body" => "Beatae eos eum magnam numquam optio quod voluptate? Amet beatae esse et id ipsa non
            officia placeat, quos sequi veritatis."
        ],
        [
            "title" => "Eos neque obcaecati quasi rerum voluptas.",
            "body" => "Dignissimos et nam perspiciatis. Eius eum minus quos sunt. Eligendi excepturi labore,
            laudantium maiores provident rerum! Incidunt ipsa minus similique."
        ],
        [
            "title" => "Labore neque omnis rerum. Fugit, voluptates.",
            "body" => "A cumque, debitis dignissimos eum ipsa mollitia quibusdam reiciendis repellendus
            reprehenderit suscipit! Aspernatur delectus eum impedit itaque nesciunt reprehenderit unde."
        ],
        [
            "title" => "Alias commodi fuga illum odio ratione?",
            "body" => "A consequatur culpa cum cumque delectus, dignissimos esse facere fuga illo ipsa minima nemo,
            nisi non, qui sequi sint soluta!"
        ]
    ];
    $newsFeed = "";
    if ($id === "all") {
        foreach ($dummyNews as $oneNews) {
            $newsFeed .= "<h2>" . $oneNews["title"] . "</h2><p>" . $oneNews["body"] . "</p><br>";
        }
    } elseif (is_numeric($id) && !empty($dummyNews[$id - 1])) {
        $newsFeed = "<h2>" . $dummyNews[$id - 1]["title"] . "</h2><p>" . $dummyNews[$id - 1]["body"] . "</p><br>";
    } else {
        $newsFeed = "<h2>Неверный запрос новости</h2>";
    }

    return $newsFeed;
});
