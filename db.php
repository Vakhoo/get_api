<?php

class db
{

    protected $serverName;
    protected $userName ;
    protected $password;
    protected $dbName;

    function __construct($serverName, $userName, $password, $dbName)
    {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function createDb()
    {
        // Create connection
        $conn = new mysqli($this->serverName, $this->userName, $this->password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Create database
        $sql_create = "CREATE DATABASE IF NOT EXISTS ".$this->dbName.";";
        if ($conn->query($sql_create) === TRUE) {
            echo "Database created successfully \n";
        } else {
            echo "Error creating database: \n" . $conn->error;
        }

        $conn->close();
    }

    public function createTable($tableName)
    {
        // Create connection
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $exists = $conn->query("select 1 from ".$tableName);

        // Check if table exists
        if($exists !== FALSE)
        {
            echo("Table \"".$tableName."\" already exists \n");
        }else{
            // sql to create table
            $sql = "CREATE TABLE ".$tableName." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
avatar VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

            if ($conn->query($sql) === TRUE) {
                echo "Table \"".$tableName."\" created successfully \n";
            } else {
                echo "Error creating table: \n" . $conn->error;
            }
        }




        $conn->close();
    }

    public function saveData($data, $table)
    {
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    // prepare and bind
        $stmt = $conn->prepare("INSERT INTO ".$table." (firstname, lastname, email, avatar) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $avatar);

    // set parameters and execute

        foreach ($data as $d){
            $firstname = $d->first_name;
            $lastname = $d->last_name;
            $email = $d->email;
            $avatar = $d->avatar;
            $stmt->execute();
        }


        echo "<h3 class='col-xs-1 text-center m-4 text-muted'>New records created successfully</h3>";

        $stmt->close();
        $conn->close();
    }

}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_data";
$db = new db($servername, $username, $password, $dbname);





?>
