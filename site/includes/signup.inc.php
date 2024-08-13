<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try
    {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // ERROR HANDLERS

        $errors = [];

        if(is_input_empty($username, $pwd, $email))
        {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_email_invalid($email))
        {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if(is_username_taken($pdo, $username))
        {
            $errors["username_taken"] = "Username already taken!";
        }
        if(is_email_registered($pdo, $email))
        {
            $errors["email_used"] = "Email already registered!";
        }

        require_once 'config_session.inc.php';  // porque ya tiene iniciada una sesión

        if($errors)
        {
            $_SESSION['error_signup'] = $errors;
            header("Location: ../auth-register.php");
            die();
        }

        create_user($pdo, $username, $pwd, $email);
        
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        
        die();

    } catch (PDOException $e) {
        // echo "ERROR: query failed";
        header("Location: ../error-500.html");
        die("Query failed: " . $e->getMessage());
    }
}else
{
    header("Location: ../index.php");
    die();
}