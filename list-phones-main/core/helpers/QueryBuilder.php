<?php

namespace App\Core\Helpers;

class QueryBuilder
{
    protected $pdo;

    protected $table;


    /**
     * QueryBuilder constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $table
     * @return $this
     */
    public function from($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @param $attribute
     * @return array
     */
    public function findBy($attribute)
    {
        $statement = $this->pdo->prepare("SELECT {$attribute} FROM {$this->table}");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}