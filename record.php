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
 * Date: 03.01.2019
 */

require_once "helper.php";

if (empty($_GET)) {
    require_once "record_list.php";
} else {


    if (!empty($_GET["record_id"])) {
        getRecord($_GET["record_id"]);
    }

    require_once "save_record_form.php";
}