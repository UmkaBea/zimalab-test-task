<?php
require_once 'Database.php';

class AccountController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAccountsList($page = 1, $perPage = 10)           //получение списка аккаунтов (записей в БД)
    {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM accounts LIMIT $perPage OFFSET $offset";
        return $this->db->query($sql);
    }

    public function getTotalPages($perPage = 10)                        //получение кол-ва страниц
    {
        $sql = "SELECT COUNT(*) as total FROM accounts";
        $result = $this->db->query($sql);
        return ceil($result[0]['total'] / $perPage);                    //округление выше 52/10 = 5.2 => 6
    }

    public function createAccount($data)                                //создание аккаунта
    {
        $sql = "INSERT INTO accounts (first_name, last_name, email, company_name, position, phone1, phone2, phone3)
                VALUES (:first_name, :last_name, :email, :company_name, :position, :phone1, :phone2, :phone3)";
        return $this->db->execute($sql, $data);
    }

    public function updateAccount($id, $data)                           //редактированеие аккаунта
    {
        $sql = "UPDATE accounts 
                SET first_name = :first_name, last_name = :last_name, email = :email, 
                    company_name = :company_name, position = :position, 
                    phone1 = :phone1, phone2 = :phone2, phone3 = :phone3 
                WHERE id = :id";
        $data['id'] = $id;
        return $this->db->execute($sql, $data);
    }

    public function deleteAccount($id)                                  //удаление
    {
        $sql = "DELETE FROM accounts WHERE id = :id";
        return $this->db->execute($sql, ['id' => $id]);
    }
}
?>
