<h1>Список новостей <?php if (!empty($catId)):?>по категории Id = <?=$catId?><?php endif; ?>:</h1>
<ul>
    <?php foreach ($news as $oneNews): ?>
        <li><a href="<?=route("onenews", $oneNews["id"])?>"><?=$oneNews["title"]?></a></li>
    <?php endforeach; ?>
</ul>
