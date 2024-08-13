<?php

// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE username = ? AND pwd = ?;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $pwd]);

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