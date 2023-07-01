<?php

include "../db.php";

class Writers extends Dbname implements Functions
{

    public function setup()
    {
        $this->initialize();
        $this->createTable();
    }

    public $tblname = "writers";

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int auto_increment primary key,
            first_name text,
            last_name text,
            age int,
            gender text,
            Social_media varchar (30) not null,
            Address varchar (25) not null
            )";

        $this->initialize();
        $this->sql($sql);
    }

    public function create($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
            ]);
        
            exit();
        }

        if(!isset($params['first_name']) || empty($params['first_name'])) {
            $response = [
                "code" => 422,
                "message" => "first_name is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['last_name']) || empty($params['last_name'])) {
            $response = [
                "code" => 422,
                "message" => "last_name is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['age']) || empty($params['age'])) {
            $response = [
                "code" => 422,
                "message" => "age is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['gender']) || empty($params['gender'])) {
            $response = [
                "code" => 422,
                "message" => "gender is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['social_media']) || empty($params['social_media'])) {
            $response = [
                "code" => 422,
                "message" => "social_media is required"
            ];

            return json_encode($response);
        }  

        if(!isset($params['address']) || empty($params['address'])) {
            $response = [
                "code" => 422,
                "message" => "address is required"
            ];

            return json_encode($response);
        }  

        $first_name = $params['first_name'];
        $last_name = $params['last_name'];
        $age = $params['age'];
        $gender = $params['gender'];
        $social_media = $params['social_media'];
        $address = $params['address'];

        $insert = "INSERT INTO $this->tblname(id, first_name, last_name, age, gender, social_media, address)
        VALUES(NULL, '$first_name', '$last_name', '$age', '$gender', '$social_media', '$address')";
        $isAdded = $this->sql($insert);

        if($isAdded)
        {
            $response = [
                'code' => 200,
                'message' => 'Writer Added Successfully'
            ];

        } else {
            $response = [
                'code' => 404,
                'message' => 'Writer Added Unsuccessfully'
            ];

            return json_encode($response);
        }
    }

    public function getRecord($params)
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
                "message" => "no Writer record found"
            ];

            return json_encode($response);
        }
        
        return json_encode($data->fetch_assoc());
       
    }

    public function fetchAll()
    {
        $list = [];

        $data = $this->sql("SELECT * FROM $this->tblname");

        if($data->num_rows > 0){
            while($item = $data->fetch_assoc()){
                array_push($list, [
                    'id' => $item['id'],
                    'first_name' => $item['first_name'],
                    'last_name' => $item['last_name'],
                    'age' => $item['age'],
                    'gender' => $item['gender'],
                    'social_media' => $item['social_media'],
                    'address' => $item['address'],
                ]);
            }
        }
        return json_encode($list);
    }

    public function delete($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only GET Method is allowed",
            ]);
        
            exit();
        }

        if(!isset($params['id']) || empty($params['id']))
        {
            $response = [
                "code" => 201,
                "message" => "ID is required"
            ];

            return json_encode($response);
        }

        $id = $params['id'];

        $delete = "DELETE FROM $this->tblname WHERE id = $id";
        $isDeleted = $this->sql($delete);

        if($isDeleted)
        {
            $response = [
                "code" => 200,
                "message" => "Writer Deleted Successfully"
            ];

        } else {
            $response = [
                "code" => 201,
                "message" => "Writer Deleted Successfully"
            ];
        }
            return json_encode($response);
    }

    public function update($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            echo json_encode([
                'code' => 201,
                'message' => $_SERVER['REQUEST_METHOD'] . ' Method is not allowed, only POST method is allowed'
            ]);

            exit();
        }

        if(!isset($params['first_name']) || empty($params['first_name'])) {
            $response = [
                "code" => 422,
                "message" => "first_name is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['last_name']) || empty($params['last_name'])) {
            $response = [
                "code" => 422,
                "message" => "last_name is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['age']) || empty($params['age'])) {
            $response = [
                "code" => 422,
                "message" => "age is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['gender']) || empty($params['gender'])) {
            $response = [
                "code" => 422,
                "message" => "gender is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['social_media']) || empty($params['social_media'])) {
            $response = [
                "code" => 422,
                "message" => "social_media is required"
            ];

            return json_encode($response);
        }  

        if(!isset($params['address']) || empty($params['address'])) {
            $response = [
                "code" => 422,
                "message" => "address is required"
            ];

            return json_encode($response);
        }  

        if(isset($params['id']) || empty($params['id'])) 
        {         
            $response = [
                    "code" => 422,
                    "message" => "id is required"
                ];

            return json_encode($response);
        }

        $id = $params['id'];
        $first_name = $params['first_name'];
        $last_name = $params['last_name'];
        $age = $params['age'];
        $gender = $params['gender'];
        $social_media = $params['social_media'];
        $address = $params['address'];

        $update = "UPDATE $this->tblname SET first_name = '$first_name', last_name = '$last_name', age = '$age'
        , gender = '$gender', social_media = '$social_media', address = '$address' WHERE id = $id";
        $isUpdated = $this->sql($update);

        if($isUpdated)
        {
            $response = [
                'code' => 200,
                'message' => 'Writer Updated Successfully'
            ];

        } else {
            $response = [
                'code' => 404,
                'message' => 'Writer Updated Unsuccessfully'
            ];

            return json_encode($response);
        }
    }
    
    public function search($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD'] . " is not allowed, only POST is allowed"
            ]);

            exit();
        }

        if(isset($params) || empty($params))
        {
            $response = [ 
                "code" => 422,
                "message" => "Please put information first"
            ];

            return json_encode($response);
        }
    }
}
?>