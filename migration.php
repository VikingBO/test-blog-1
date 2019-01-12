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

require_once 'helper.php';

try {
    $queryString = "CREATE TABLE IF NOT EXISTS `users`  ("
                ."`id` INT(10) NOT NULL AUTO_INCREMENT,"
                ."`login` VARCHAR(255) NOT NULL,"
                ."`password` VARCHAR(255) NOT NULL,"
                ."`email` VARCHAR(255) NOT NULL,"
                ."PRIMARY KEY (`id`)"
            .") ENGINE=InnoDB COLLATE='utf8mb4_general_ci' DEFAULT CHARSET='utf8mb4';";

    $PDO->exec($queryString);
    echo "Таблица users успешно создана.<br/>";

    $queryString = "CREATE TABLE IF NOT EXISTS `records`  ("
                ."`id` INT(10) NOT NULL AUTO_INCREMENT,"
                ."`title` VARCHAR(255) NOT NULL,"
                ."`content` LONGTEXT NOT NULL,"
                ."`img_id` INT(10) NOT NULL,"
                ."`user_id` INT(10) NOT NULL,"
                ."PRIMARY KEY (`id`)"
            .") ENGINE=InnoDB COLLATE='utf8mb4_general_ci' DEFAULT CHARSET='utf8mb4';";

    $PDO->exec($queryString);
    echo "Таблица records успешно создана.<br/>";

    $queryString = " CREATE TABLE IF NOT EXISTS `images`  ("
                    ."`id` INT(10) NOT NULL AUTO_INCREMENT,"
                    ."`src` VARCHAR(255) NOT NULL,"
                    ."PRIMARY KEY (`id`)"
                .") ENGINE=InnoDB COLLATE='utf8mb4_general_ci' DEFAULT CHARSET='utf8mb4';";

    $PDO->exec($queryString);
    echo "Таблица images успешно создана.<br/>";
} catch (PDOException $e) {
    die("Создание таблицы не получилось: " . $e->getMessage());
}