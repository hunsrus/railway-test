<?php

// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = ?;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        
        $hashedPwd = $results["pwd"];

        if(empty($results))
        {
            $_SESSION['username'] = "No existe el usuario";
        }else
        {
            if(password_verify($pwd, $hashedPwd))
            {
                $_SESSION['username'] = $username;
            }else{
                $_SESSION['username'] = "Contraseña incorrecta";
            }
        }

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