<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

use app\core\Application;

class m001_create_user_table
{
    public function up()
    {
        $database = Application::$app->database;

        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(70) UNIQUE NOT NULL,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `status` INT(3) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=INNODB;";
        $database->pdo->exec($sql);
    }

    public function down()
    {
        $database = Application::$app->database;

        $sql = "DROP TABLE users;";
        $database->pdo->exec($sql);
    }
}
