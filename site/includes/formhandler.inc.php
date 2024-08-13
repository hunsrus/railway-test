<?php

// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 10   // valor recomendado entre 10 y 12. mientras más grande sea es más seguro pero demora más tiempo
        ];
        
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->execute([$username, $hashedPwd, $email]);

        $pdo = null;
        $stmt = null;

        // echo "Inserted succsessfully";
        
        header("Location: ../index.php");

        die();

    } catch (PDOException $e) {
        // echo "ERROR: query failed";
        header("Location: ../pages/samples/error-500.html");
        die("Query failed: " . $e->getMessage());
    }
}else
{
    header("Location: ../index.php");
}