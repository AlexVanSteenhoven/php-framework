<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\core
 */


namespace app\core;

abstract class DatabaseModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $stmt = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }

        $stmt->execute();

        return true;
    }

    public static function prepare($sql)
    {
        return Application::$app->database->pdo->prepare($sql);
    }
}
