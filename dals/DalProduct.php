<?php
require_once 'DB.php';
require_once 'IDal.php';

class DalProduct extends DB implements IDal
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("products");
    }

    function getList($page = 1, $pageSize = self::PAGE_SIZE)
    {
        // TODO: Implement getList() method.
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT *,products.id as product_id,categories.name as category_name FROM $this->tableName LEFT JOIN categories ON category_id = categories.id ORDER BY products.id  DESC LIMIT $offset,$pageSize";
        $stm = $this->db->query($sql);
        $result = [];
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
    }

    function getListOrderBySoldCounter($page = 1, $pageSize = self::PAGE_SIZE)
    {
        // TODO: Implement getList() method.
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT *,products.id as product_id,categories.name as category_name FROM $this->tableName LEFT JOIN categories ON category_id = categories.id ORDER BY products.sold_counter  DESC LIMIT $offset,$pageSize";
        $stm = $this->db->query($sql);
        $result = [];
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
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
                      (name,price,image,description,category_id) 
                      VALUES (:name,:price,:image,:description,:category_id)");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':price', $data['price']);
            $prepareStm->bindParam(':image', $data['image']);
            $prepareStm->bindParam(':description', $data['description']);
            $prepareStm->bindParam(':category_id', $data['category_id']);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function update($data, $id)
    {
        // TODO: Implement update() method.
        try {
            $prepareStm = $this->db->prepare("UPDATE $this->tableName SET name = :name,
                 price = :price,
                 description = :description,
                 category_id = :category_id
                                                                            WHERE id = :id");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':price', $data['price']);
            $prepareStm->bindParam(':description', $data['description']);
            $prepareStm->bindParam(':category_id', $data['category_id']);
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            //echo $exception->getMessage();
            return false;
        }
    }

    function updateImagePath($imagePath, $id)
    {
        try {
            $prepareStm = $this->db->prepare("UPDATE $this->tableName SET image = :image  WHERE id = :id");
            $prepareStm->bindParam(':image', $imagePath);
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            //echo $exception->getMessage();
            return false;
        }
    }


}

?>