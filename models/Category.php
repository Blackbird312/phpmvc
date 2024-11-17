<?php
require_once 'config/database.php';
require_once 'helpers/UploadHelper.php';

class Category
{
    private $conn;
    private $table = 'categories';
    private $uploadHelper;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->uploadHelper = new UploadHelper('/../uploads/category_image/');
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name)
    {
        try {
            $imageName = $this->uploadHelper->upload($_FILES['image']);
            $query = "INSERT INTO " . $this->table . " (name, image) VALUES (:name, :image)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $imageName);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function update($id, $name)
    {
        $query = "UPDATE " . $this->table . " SET name = :name";
        $params = [
            ':id' => $id,
            ':name' => $name,
        ];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            try {
                $newFileName = $this->uploadHelper->upload($_FILES['image']);
                $query .= ", image = :image";
                $params[':image'] = $newFileName;

                $this->deleteImageFile($id);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        $query .= " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute($params);
    }

    public function delete($id)
    {
        $this->deleteImageFile($id);

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    private function deleteImageFile($id)
    {
        $category = $this->getById($id);
        if ($category && !empty($category['image']) && file_exists(__DIR__ . '/../uploads/category_image/' . $category['image'])) {
            $this->uploadHelper->delete($category['image']);
        }
    }
}
