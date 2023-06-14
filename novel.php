<?php
include "db.php";

class Novel extends Dbname implements Table
{

    public function setup()
    {
        $this->initialize();
        $this->createTbl();
    }

    public $tblname = "novel";

    public function createTbl()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int auto_increment primary key,
            title text,
            status text,
            release_date text
            )";
        $this->initialize();
        $this->sql($sql);

    }

    public function insert($title, $status, $release_date)
    {
        $insert = "INSERT INTO $this->tblname(id, title, status, release_date)
        VALUES(NULL, '$title', '$status','$release_date')";
        $this->sql($insert);
    }

    public function fetchWriter($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only GET Method is allowed",
            ]);
        
            exit();
        }

        if(!isset($params['id']) || empty($params['id'])) {
            $response = [
                "code" => 422,
                "message" => "ID Field is required"
            ];

            return json_encode($response);
        }

        $id = $params['id'];

        $data = $this->sql("SELECT * FROM $this->tblname WHERE id = $id");

        if($data->num_rows == 0){
            $response = [
                "code" => 404,
                "message" => "no Writer List found"
            ];

            return json_encode($response);
        }
        
        return json_encode($data->fetch_assoc());
       
    }

    public function getAll()
    {
        $list = [];

        $data = $this->sql("SELECT * FROM $this->tblname");

        if($data->num_rows > 0){
            while($item = $data->fetch_assoc()){
                array_push($list, [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'status' => $item['status'],
                    'release_date' => $item['release_date'],
                ]);
            }
        }
        return json_encode($list);
    }
}
?>