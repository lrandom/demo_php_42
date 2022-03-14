<?php
require_once 'DB.php';
require_once 'IDal.php';

class DalUser extends DB implements IDal
{

    public function __construct()
    {
        parent::__construct();
        $this->$this->setTableName("users");
    }

    function getList($page = 1, $pageSize = 10)
    {
        // TODO: Implement getList() method.
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT * FROM $this->getTableName limit $offset,$pageSize";
        $stm = $this->db->query($sql);
        $result = [];
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
    }

    function get($id)
    {
        // TODO: Implement get() method.
        $sql = "SELECT * FROM $this->getTableName WHERE id = $id";
        $stm = $this->db->query($sql);
        return $stm->fetch(PDO::FETCH_OBJ);//ko cần phải dùng vòng lặp
    }

    function add($data)
    {
        /*  [
              'email' => $email,
              'password' => $password,
              'phone' => $phone,
              'address' => $address,
              'role' => $role,
          ] */
        // TODO: Implement add() method.
        try {
            $prepareStm = $this->db->prepare("INSERT INTO $this->tableName
                      (name,email,password,phone,address,role) 
                      VALUES (:name,:email,:password,:phone,:address,:role)");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':email', $data['email']);
            $prepareStm->bindParam(':password', $data['password']);
            $prepareStm->bindParam(':phone', $data['phone']);
            $prepareStm->bindParam(':address', $data['address']);
            $prepareStm->bindParam(':role', $data['role']);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    function update($data, $id)
    {
        // TODO: Implement update() method.
        try {
            $prepareStm = $this->db->prepare("UPDATE TABLE $this->tableName SET name = :name,
                                                                                email = :email,
                                                                                password = :password,
                                                                                phone = :phone,
                                                                                address = :address,
                                                                                role = :role
                                                                                WHERE id = :id");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':email', $data['email']);
            $prepareStm->bindParam(':password', $data['password']);
            $prepareStm->bindParam(':phone', $data['phone']);
            $prepareStm->bindParam(':address', $data['address']);
            $prepareStm->bindParam(':role', $data['role']);
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            $prepareStm = $this->db->prepare("DELETE FROM $this->tableName WHERE id = :id");
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

}

?>