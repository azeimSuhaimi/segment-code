

<?php

class Database {
    private $host = "localhost";
    private $dbname = "";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectFromTable($tableName) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectFromTableWhere($tableName, $condition) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName WHERE $condition");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectFromTableLike($tableName, $field, $value) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName WHERE $field LIKE :value");
            $stmt->bindValue(':value', "%$value%");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateTable($tableName, $data, $condition) {
        try {
            $updateFields = "";
            foreach ($data as $field => $value) {
                $updateFields .= "$field = :$field,";
            }
            $updateFields = rtrim($updateFields, ',');
            $stmt = $this->conn->prepare("UPDATE $tableName SET $updateFields WHERE $condition");
            foreach ($data as $field => $value) {
                $stmt->bindValue(":$field", $value);
            }
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function deleteFromTable($tableName, $condition) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $tableName WHERE $condition");
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function insertIntoTable($tableName, $data) {
        try {
            $fields = implode(",", array_keys($data));
            $values = implode(",", array_map(function ($value) { return ":$value"; }, array_keys($data)));
            $stmt = $this->conn->prepare("INSERT INTO $tableName ($fields) VALUES ($values)");
            foreach ($data as $field => $value) {
                $stmt->bindValue(":$field", $value);
            }
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function insertIntoTable2($tableName, $data) {
        try {
            $fields = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $stmt = $this->conn->prepare("INSERT INTO $tableName ($fields) VALUES ($placeholders)");
            foreach ($data as $field => $value) {
                $stmt->bindValue(":$field", $value);
            }
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // check if database exists
    public function checkDbExists() {
        $query = "SHOW DATABASES LIKE '$this->dbname'";
        $result = $this->conn->query($query);
        if ($result->num_rows == 0) {
            return false;
        }
        return true;
    }

    // create database
    public function createDb() {
        $query = "CREATE DATABASE $this->dbname";
        if ($this->conn->query($query) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

     // create tables
     public function createTables() 
     {
        $query1 = "CREATE TABLE $this->dbname.users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        $query2 = "CREATE TABLE $this->dbname.roles (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL
        )";

        if ($this->conn->query($query1) === TRUE && $this->conn->query($query2) === TRUE) 
        {
            echo "Tables created successfully";
        } else 
        {
            echo "Error creating tables:";
        }
    }




}

// $condition = "id = 3"; this how make for parameter 


/* 
$data = array(
    'name' => 'John',
    'email' => 'john@example.com'
);
for create data to paramater put in argument

*/

/*



The updateTable method takes three parameters, $tableName, $data, and $condition. $tableName is the name of the table to be updated, $data is an associative array of fields and their new values, and $condition is a string that represents the condition of the update statement.
The method first build the update statement using a loop, by concatenating the fields with their values, after that it binds the value of the fields and execute the statement.

The deleteFromTable method takes two parameters, $tableName and $condition, $tableName is the name of the table to be deleted from and $condition is a string that represents the condition of the delete statement. This method prepares the SQL DELETE statement with the given table name and condition, and then execute it.

It's important to note that using PDO or any other database library, the data should be properly sanitized before using it in the query to prevent SQL injection attacks.

You can create an instance of the Database class and call the updateTable and deleteFromTable methods to
*/


?>