<?php

namespace uFrame;

use PDO;

class Database
{

    private $connection;
    private $log;

    public function __construct($log)
    {
        $this->log = $log;
        try {
            $this->connection = new PDO("mysql:host=" . CONFIG['db_hostname'] . ";dbname=" . CONFIG['db_name'] . ";charset=utf8", CONFIG['db_username'], CONFIG['db_password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        } catch (PDOException $e) {
            $log->error($e->getMessage());
        }
    }

    // Select
    public function select(string $sql, array $param = []): array
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insert
    public function insert(string $sql, array $param = []): int
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $this->connection->lastInsertId();
    }

    // Update
    public function update(string $sql, array $param = []): int
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->rowCount();
    }

    // Remove
    public function remove(string $sql, array $param = []): bool
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->rowCount();
    }

    function __destruct()
    {
        $this->connection = null;
    }
}
