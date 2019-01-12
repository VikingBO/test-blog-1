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
 * Date: 29.12.2018
 */
require_once 'helper.php';

$query = $PDO->query('SELECT * FROM `records` ORDER BY `add_time` DESC LIMIT 20');

$records = !empty($query) ? $query->fetchAll() : [];

$data['body'] = "<div class='container'>";

foreach ($records as $record) {
    $record['anons'] .= "<a href='/record?id={$record['id']}'>Читать дальше...</a>";

    $data['body'] .= "<div class='row'>
                        <div class='col-lg-12'>
                            <div class='text-body'>
                                <img src='{$record['img']}' alt='{$record['title']}' class='rounded float-left'>
                                {$record['anons']}
                                </div>
                            </div>
                        </div>
                    </div>";
}

require_once 'template.php';