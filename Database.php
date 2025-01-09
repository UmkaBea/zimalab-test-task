<?php

class Database
{
    private $pdo;

    public function __construct() 
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=localhost;dbname=accounts;charset=utf8','root',  '123qweadzxcUmka!',     //креды для подключения к БД
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,                //вывод ошибки
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,           //вывод в виде поле=>значение
                ]
            );
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = []) //метод для SELECT  
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function execute($sql, $params = []) //метод для UPDATE, INSERT, CREATE
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
}
?>
