<?php

// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        $query = "UPDATE users SET username = ?, pwd = ?, email = ? WHERE id = 1;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $pwd, $email]);

        $pdo = null;
        $stmt = null;

        // echo "Inserted succsessfully";
        
        header("Location: ../index.html");

        die();

    } catch (PDOException $e) {
        // echo "ERROR: query failed";
        header("Location: ../pages/samples/error-500.html");
        die("Query failed: " . $e->getMessage());
    }
}else
{
    header("Location: ../index.html");
}