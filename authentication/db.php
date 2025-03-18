<?php
    $servername = "localhost";
    $username = "root";  
    $password = "";      
    $dbname = "blog_db";  

    try {
        // Create a connection to the MySQL server
        $pdo = new PDO("mysql:host=$servername", $username, $password);
        
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create database if it doesn't exist
        $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
        //echo "Database created successfully (or already exists).<br>";

        // Now connect to the specific database
        $pdo->exec("use $dbname");

        // SQL to create a table
        $sql = "CREATE TABLE IF NOT EXISTS blog_tb(
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(50) NOT NULL
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        // Execute the query to create the table
        $pdo->exec($sql);
        //echo "Table 'blog_tb' created successfully.<br>";
        $sql = "CREATE TABLE IF NOT EXISTS  blog (
            id INT PRIMARY KEY AUTO_INCREMENT,
            author VARCHAR(2550),
            title VARCHAR(255),
            file VARCHAR(255),     
            content VARCHAR(60000)   NOT NULL,
            upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($sql);
        //echo "Table 'images' created successfully.<br>";
        $sql = "CREATE TABLE IF NOT EXISTS  comments(            
    article_id INT NOT NULL,                 -- Foreign key linking to blog.id
    comment VARCHAR(10550),                  -- Comment text
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (article_id) REFERENCES blog(id) ON DELETE CASCADE
        )";
        $pdo->exec($sql);
        
            //echo "Table 'comment' created successfully.<br>";
            
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    
    ?>


    