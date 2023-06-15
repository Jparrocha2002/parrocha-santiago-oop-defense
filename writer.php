<?php
include "db.php";

class Writer extends Dbname implements Table
{

    public function setup()
    {
        $this->initialize();
        $this->createTbl();  
    }

    public $tblname = "writer";

    public function createTbl()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int primary key auto_increment,
            first_name text,
            last_name text,
            gender varchar(20)
            )";

        $this->initialize();
        $this->sql($sql);
    }

    public function insert($first_name, $last_name, $gender)
    {
        $insert = "INSERT INTO $this->tblname(id, first_name, last_name, gender)
        VALUES(NULL, '$first_name', '$last_name', '$gender')";
        $this->sql($insert);
    }



    public function getWriterRecord($params)
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

    public function fetchAll()
    {
        $list = [];

        $data = $this->sql("SELECT * FROM $this->tblname");

        if($data->num_rows > 0) {
            while($item = $data->fetch_assoc()){
                array_push($list, [
                    'id' => $item['id'],
                    'first_name' => $item['first_name'],
                    'last_name' => $item['last_name'],
                    'gender' => $item['gender'],
                ]);
            }
        }
        return json_encode($list);
    }
}
?>