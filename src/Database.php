<?php

/**
 * Class Database
 * @mixin mysqli
 */
class Database
{
    protected mysqli $connection;

    function __construct(DatabaseConfiguration $configuration)
    {
        $this->connection = new mysqli(
            $configuration->host,
            $configuration->databaseUser,
            $configuration->databasePassword,
            $configuration->databaseName,
        );
    }

    function __call($name, $arguments)
    {
        if (!method_exists($this->connection, $name)) throw new Exception("Database::$name() does not exist.");

        return call_user_func_array([$this->connection, $name], $arguments);
    }


    function __get($name)
    {
        if (!property_exists($this->connection, $name)) throw new Exception("Database::$name does not exist.");

        return $this->connection->{$name};
    }
}
