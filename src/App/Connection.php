<?php

namespace App;

use App\ShoppingCart\Cart;


class Connection
{
    public $conn;
    private $schema = "CREATE TABLE IF NOT EXISTS carts(id varchar(20),data text)";

    public function __construct()
    {
        $this->conn = $this->connect();

    }

    public function createSchema(){

        $this->conn->exec($this->schema);
    }   

    public function dropTable(){
        $this->conn->exec("DROP TABLE carts");
    }

    public function connect(){

        try
        {
            $conn = new \PDO("mysql:host=127.0.0.1;dbname=unit", "root" , "123456");
            $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert(Cart $cart): void
    {
        $data = \base64_encode(\serialize($cart));
        $sql = "INSERT INTO carts(id,data) VALUES ('{$cart->id}','{ $data}')";
        $this->conn->exec($sql);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM carts where carts.id = '{$id}'";
        $stmt = $this->conn->query($sql);

        return \unserialize(base64_decode($stmt->fetch()['data']));
    }
}