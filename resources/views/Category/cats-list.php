<h1>Список категорий:</h1>
<ul>
<?php foreach ($cats as $oneCat): ?>
<li><a href="<?=route("showcat", $oneCat["id"])?>"><?=$oneCat["name"]?></a></li>
<?php endforeach; ?>
</ul>
