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

$records = !empty($query) ? $query->fetchAll() : [
    [
        'title' => "Записей нет"
    ]
];

$data['body'] = '<div class="container text-center">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Записи блога</th>
                        </tr>
                    </thead>
                    <tbody>';

foreach ($records as $record) {
    $recordLink = empty($record['id']) ? "<p>{$record['title']}</p>" : "<a href='/record.php?id={$record['id']}'>{$record['title']}</a>" ;

    $data['body'] .= "<tr>
                        <td>
                            $recordLink
                        </td>
                    </tr>";
}

$data['body'] .= '</tbody>
                </table>
            </div>
        </div>
    </div>';

require_once 'template.php';