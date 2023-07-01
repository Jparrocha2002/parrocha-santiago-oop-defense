<?php
include "../db.php";

class Novels extends Dbname implements Functions
{

    public function setup()
    {
        $this->initialize();
        $this->createTable();
    }

    public $tblname = "novels";

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int auto_increment primary key,
            isbn varchar(20) not null,
            title text,
            genre varchar(200) not null,
            status text,
            release_date text,
            summary text
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

        if(!isset($params['isbn']) || empty($params['isbn'])) {
            $response = [
                "code" => 422,
                "message" => "isbn is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['title']) || empty($params['title'])) {
            $response = [
                "code" => 422,
                "message" => "title is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['genre']) || empty($params['genre'])) {
            $response = [
                "code" => 422,
                "message" => "genre is required"
            ];

            return json_encode($response);
        } 
        
        if(!isset($params['status']) || empty($params['status'])) {
            $response = [
                "code" => 422,
                "message" => "status is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['release_date']) || empty($params['release_date'])) {
            $response = [
                "code" => 422,
                "message" => "release_date is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['summary']) || empty($params['summary'])) {
            $response = [
                "code" => 422,
                "message" => "summary is required"
            ];

            return json_encode($response);
        }   

        $isbn = $params['isbn'];
        $title = $params['title'];
        $genre = $params['genre'];
        $status = $params['status'];
        $release_date = $params['release_date'];
        $summary = $params['summary'];

        $insert = "INSERT INTO $this->tblname(id, isbn, title, genre, status, release_date, summary)
        VALUES(NULL, '$isbn', '$title', '$genre', '$status', '$release_date', '$summary')";
        $isAdded = $this->sql($insert); 

        if($isAdded) {
            $response = [
                "code" => 201,
                "message" => "Novel added successfully"
            ];
        } else {
            $response = [
                "code" => 404,
                "message" => "Novel added unsuccessfully"
            ];
        }
        
        echo json_encode($response);
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
                "message" => "no Novel record found"
            ];

            return json_encode($response);
        }
        
        return json_encode($data->fetch_assoc());
       
    }

    public function fetchAll()
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
            ]);
        
            exit();
        }

        $list = [];
   
        $data = $this->sql("SELECT * FROM $this->tblname");

        if($data->num_rows > 0){
            while($item = $data->fetch_assoc()){
                array_push($list, [
                    'id' => $item['id'],
                    'isbn' => $item['isbn'],
                    'title' => $item['title'],
                    'genre' => $item['genre'],
                    'status' => $item['status'],
                    'release_date' => $item['release_date'],
                    'summary' => $item['summary'],
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

        if(!isset($params['id']) || empty($params['id'])) {
            $response = [
                "code" => 422,
                "message" => "id is required"
            ];

            return json_encode($response);
        }

        $id = $params['id'];

        $delete = "DELETE FROM $this->tblname WHERE id = $id";
        $isDeleted = $this->sql($delete);

        if($isDeleted) {
            $response = [
                "code" => 201,
                "message" => "Novel deleted successfully"
            ];
        } else {
            $response = [
                "code" => 404,
                "message" => "Novel deleted unsuccessfully"
            ];
        }
        
        echo json_encode($response);
    }

    public function update($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
            ]);
        
            exit();
        }

        if(!isset($params['id']) || empty($params['id'])) {
            $response = [
                "code" => 422,
                "message" => "id is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['isbn']) || empty($params['isbn'])) {
            $response = [
                "code" => 422,
                "message" => "isbn is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['title']) || empty($params['title'])) {
            $response = [
                "code" => 422,
                "message" => "title is required"
            ];

            return json_encode($response);
        }

        if(!isset($params['genre']) || empty($params['genre'])) {
            $response = [
                "code" => 422,
                "message" => "genre is required"
            ];

            return json_encode($response);
        } 
        
        if(!isset($params['status']) || empty($params['status'])) {
            $response = [
                "code" => 422,
                "message" => "status is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['release_date']) || empty($params['release_date'])) {
            $response = [
                "code" => 422,
                "message" => "release_date is required"
            ];

            return json_encode($response);
        }
        
        if(!isset($params['summary']) || empty($params['summary'])) {
            $response = [
                "code" => 422,
                "message" => "summary is required"
            ];

            return json_encode($response);
        }   

        $id = $params['id'];
        $isbn = $params['isbn'];
        $title = $params['title'];
        $genre = $params['genre'];
        $status = $params['status'];
        $release_date = $params['release_date'];
        $summary = $params['summary'];

        $update = "UPDATE $this->tblname SET isbn = '$isbn', title = '$title', genre = '$genre',
        status = '$status' , release_date = '$release_date', summary = '$summary' WHERE id = $id";

        $isUpdated = $this->sql($update);

        if($isUpdated) {
            $response = [
                "code" => 201,
                "message" => "Novel Updated successfully"
            ];
        } else {
            $response = [
                "code" => 404,
                "message" => "Novel Updated unsuccessfully"
            ];
        }

        echo json_encode($response);
    }

    public function search($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            echo json_encode([
                "code" => 201,
                "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
            ]);
        
            exit();
        }
        
        if(!isset($params) || empty($params))
        {
            echo json_encode([
                "code" => 500,
                "message" => "please put information first",
            ]);
        
            exit();
        }

        $search = [
            "isbn" => "isbn",
            "title" => "title",
            "genre" => "genre",
            "status" => "status",
            "release_date" => "release_date",
            "summary" => "summary"
        ];

        $sql = "SELECT * FROM $this->tblname WHERE ";
        
        $conditions = [];
        foreach($search as $columns => $paramNames)
        {
            if(isset($params[$paramNames]))
            {
                $searchValue = $params[$paramNames];
                $conditions[] = " $columns LIKE '%$searchValue%'";
            }
        }
        
        if(count($conditions) > 0)
        {
            $sql .= $conditions[0];

            for($i = 1; $i < count($conditions); $i++)
            {
                $sql .= " OR " . $conditions[$i];
            }
        }

        $all = $this->sql($sql);

        if(empty($this->error()))
        {
            return json_encode($all->fetch_all(MYSQLI_ASSOC));
        } else {
            return json_encode([
                'code' => 500,
                'message' => $this->error()     
            ]);
        }
    }
}

?>