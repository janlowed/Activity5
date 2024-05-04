<?php
include 'db.php';
header('Content-type: application/json');

class Post extends Database{

    public function getAll(){

        $this->init();
        $users = $this->conn->query("SELECT * FROM user");
        $result = $users->fetch_All(MYSQLI_ASSOC);

        echo json_encode($result);
    }

    public function search(){

        $this->init();
        if (empty($_GET['id'])){
            return json_encode([
                'message' => 'Id First'
            ]);
        }
        $id = $_GET['id'] ?? '';
        $users = $this->conn->prepare("SELECT * FROM user where id LIKE ?");
        $idData = "%$id%";
        $users->bind_param('s', $idData);
        $users->execute();

        $isSearch = $users->get_result();

        if ($isSearch->num_rows > 0){
            $data = $isSearch->fetch_All(MYSQLI_ASSOC);

            echo json_encode($data);
        }
    }
}


?>