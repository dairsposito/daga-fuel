<?php

namespace App\Core\Database;

use PDO;
use PDOException;
use stdClass;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     * @return array
     */
    public function selectAll(string $table, string $class = 'stdClass'): array
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table}");

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS, $class);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert(string $table, array $parameters): int
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $this->pdo->beginTransaction();

            $statement->execute($parameters);

            $id = $this->pdo->lastInsertId();

            $this->pdo->commit();

            return $id;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }

    /**
     * Select one record from database table by its id
     *
     * @param string $table
     * @param string $primaryKey
     * @param integer $value
     * @param string $class
     * @return object
     */
    public function selectById(string $table, string $primaryKey, int $value, string $class = 'stdClass'): object
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$primaryKey} = :pk;");

            $statement->execute(['pk' => $value]);

            $statement->setFetchMode(PDO::FETCH_CLASS, $class);

            $out = $statement->fetch();

            if (!$out) {
                return new $class();
            }

            return $out;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Delete a register from database table
     *
     * @param string $table
     * @param string $primaryKey
     * @param integer $value
     * @return boolean
     */
    public function deleteById(string $table, string $primaryKey, int $value): bool
    {
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE {$primaryKey} = :pk;");

            return $statement->execute(['pk' => $value]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateById(string $table, string $primaryKey, int $value, array $parameters): bool
    {
        $fields = array_map(fn ($field) => $field . ' = :' . $field, array_keys($parameters));
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = :pk;',
            $table,
            implode(', ', $fields),
            $primaryKey
        );

        try {
            $statement = $this->pdo->prepare($sql);

            return $statement->execute(['pk' => $value] + $parameters);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query(string $sql, array $params, string $class = 'stdClass'): array
    {
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($params);

            return $statement->fetchAll(PDO::FETCH_CLASS, $class);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
