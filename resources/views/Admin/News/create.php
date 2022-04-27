<br><br><br>
<h1>Добавление новости</h1><br>
<form action="<?=route("news.store")?>" method="post">
    <input type="text" name="title" placeholder="Заголовок" size="80"><br><br>
    <textarea name="description" placeholder="Краткое описание" cols="100" rows="10"></textarea><br><br>
    <textarea name="description" placeholder="Подробное описание" cols="100" rows="10"></textarea><br><br>
    <button type="submit">Добавить</button>
</form>
