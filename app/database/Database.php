<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    protected string $dsn;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=Book_Library';
        $this->username = 'root';
        $this->password = '@Tambeo91';
    }

    public function connect(): PDO
    {
        try{
            return new PDO($this->dsn,$this->username,$this->password);
        }catch(PDOException $PDOException){
            echo $PDOException->getMessage();
            die();
        }
    }
}