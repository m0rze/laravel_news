<a href="<?=route("newslist")?>">Список новостей</a><br><br>
<h1>Новость Id: <?=$news["id"]?></h1>
<h2><?=$news["title"]?></h2>
<p><?=$news["body"]?></p>
<br>
<a href="<?=route("showcat", $news["catId"])?>">Категория id = <?=$news["catId"]?></a>
