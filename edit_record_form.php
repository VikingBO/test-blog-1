<?php
/**
 * Created by PhpStorm.
 * User: Pilipenko Andrey
 * Nickname: VikingBO
 * Github: https://github.com/VikingBO
 * Gitlab: https://gitlab.com/VikingBO
 * BitBucket: https://bitbucket.org/VikingBO/
 * Email: pilipenkoav@rambler.ru
 * Email: reaver-dron@yandex.ru
 * Email: pilipenkoavspb@gmail.com
 * Date: 12.01.2019
 */

?>
<form action="/record.php" method="GET" enctype="multipart/form-data" name="feedback" target="_blank">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    <?php if(!empty($_GET['record_id'])) {?>
        <input type="hidden" name="record_id" value="<?=$_GET['record_id']?>" />
    <?php } ?>

    <input type="text" name="title" placeholder="Заголовок" value="<?=$_GET['title']?>">
    <textarea placeholder="Описание" name="message"><?=$_GET['content']?></textarea>
    <input type="file" id="file" name="send_file" placeholder="Загрузить картинку">
    <div  class="alert alert-warning" role="alert">
        <span>Допустимый формат загружаемого изображения: png, gif, jpg</span><br />
        <span>Размер изображение не должен превышать 2 мегабайт</span>
    </div>
    <input type="submit" value="Сохранить">
</form>
