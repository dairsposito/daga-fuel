<?php

namespace App\Models;

use App\Core\Database\QueryBuilder;

abstract class Model
{

    protected static string $tableName;

    protected static string $primaryKey = 'id';

    protected static array $fillable = [];

    protected static bool $timestamps = true;

    protected static QueryBuilder $db;

    protected string $created_at;

    protected string $updated_at;

    public static function setDb(QueryBuilder $db)
    {
        static::$db = $db;
    }

    public function __set(string $name, mixed $value): void
    {
        if (in_array('set' . ucfirst($name), get_class_methods($this))) {
            $this->{'set' . ucfirst($name)}($value);
        }

        if (in_array($name, static::$fillable)) {
            $this->$name = $value;
        }
    }

    public function __get(string $name): mixed
    {
        if (in_array('get' . ucfirst($name), get_class_methods($this))) {
            return $this->{'get' . ucfirst($name)}();
        }

        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    public function save(): self
    {
        extract(get_object_vars($this));

        foreach (static::$fillable as $field) {
            if (isset($$field))
                $toInsert[] = $field;
        }

        if (isset($this->id) && $this->find($this->id)) {
            static::$db->updateById(static::$tableName, static::$primaryKey, $this->id, compact($toInsert));
            return $this;
        }

        $this->{static::$primaryKey} = static::$db->insert(static::$tableName, compact($toInsert));

        return $this;
    }

    public function refresh(): self
    {
        $fresh = static::find($this->id);
        foreach (static::$fillable as $field) {
            $this->$field = $fresh->$field;
        }
        return $this;
    }

    public function destroy(): bool
    {
        return static::delete($this->id);
    }

    public static function all(): array
    {
        return static::$db->selectAll(static::$tableName, static::class);
    }

    public static function find(int $id)
    {
        return static::$db->selectById(static::$tableName, static::$primaryKey, $id, static::class);
    }

    public static function create(array $params): int
    {
        extract($params);

        foreach (static::$fillable as $field) {
            if (isset($$field))
                $toInsert[] = $field;
        }

        return static::$db->insert(static::$tableName, compact($toInsert));
    }

    public static function delete(int $id): bool
    {
        return static::$db->deleteById(static::$tableName, static::$primaryKey, $id);
    }
}