<?php

class db
{

    protected $serverName;
    protected $userName ;
    protected $password;
    protected $dbName;

    function __construct($serverName, $userName, $password, $dbName=null)
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
        $sql_create = "CREATE DATABASE IF NOT EXISTS api_data;";
        if ($conn->query($sql_create) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn->close();
    }

    function createTable($tableName)
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
            echo("This table exists");
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
                echo "Table ".$tableName." created successfully";
            } else {
                echo "Error creating table: " . $conn->error;
            }
        }




        $conn->close();
    }
}


?>
