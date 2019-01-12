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
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'studservice-test');
define('DB_LOGIN', 'root');
define('DB_PASS', '');

try {
    $PDO = new PDO('mysql:dbname=studservice-test;host=localhost;port=3306', DB_LOGIN, DB_PASS);
} catch (PDOException $e) {
    die('Не удалось соединиться: ' . $e->getMessage());
}

$data = [
    'body' => ''
];

function saveImg (string $tempImg): string
{
    $result = "";

    if (!empty($_POST)) {
        if (!empty($_FILES)) {
            $check = false;

            switch ($_FILES['send_file']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $result = "Размер отправляемого файла не может превышать 2 Mb<br>";

                    break;
                case UPLOAD_ERR_OK:
                    checkImg($_FILES['send_file']['type']);
                        case 'image/jpeg':
                        case 'image/png':
                        case 'image/gif':
                            $check = TRUE;

                            break;
                        default:
                            $result = 'Вы не можете загружать файлы данного формата.<br>';

                            break;
                    }

                    break;
                case UPLOAD_ERR_PARTIAL:
                case UPLOAD_ERR_NO_FILE:
                case UPLOAD_ERR_NO_TMP_DIR:
                case UPLOAD_ERR_CANT_WRITE:
                case UPLOAD_ERR_EXTENSION:
                default:
                    $result = "При загрузке файла возникла ошибка, для решения вопроса обратитесь к администратору.<br>";

                    break;
            }

            $uploadfile = __DIR__ . '/images/' . basename($_FILES['send_file']['name']);
            $linkfile = $_SERVER['HTTP_HOST'] . '/images/' . basename($_FILES['send_file']['name']);

            if ($check && move_uploaded_file($_FILES['send_file']['tmp_name'], $uploadfile)) {
                $result .= "Фaйл был загружен успешно.<br>";
            } else {
                $result .= 'Что то с файлом не так, он не прошел проверку и небыл загружен.<br>';
            }
        }
    } else {
        $result = 'Возникла ошибка. Вы можете вернуться на <a href="/">главную страницу</a>';
    }

    return $result;
}

function checkImg (string $src): bool
{
    switch ($src) {
        case 'image/jpeg':
        case 'image/png':
        case 'image/gif':
            $result = TRUE;

            break;
        default:
            $result = FALSE;

            break;
    }

    return $result;
}