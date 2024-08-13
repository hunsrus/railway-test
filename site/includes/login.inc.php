<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try
    {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // ERROR HANDLERS

        $errors = [];

        if(is_input_empty($username, $pwd))
        {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if(is_username_wrong($result))
        {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"]))
        {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session.inc.php';

        if($errors)
        {
            $_SESSION['errors_login'] = $errors;
            header("Location: ../pages/login.php");
            die();
        }

        // regenero el id de la sesión por seguridad
        session_regenerate_id(true); // regenera una versión más segura del id
        $_SESSION['last_regeneration'] = time();
        // también puedo incluir el id del usuario en este nuevo id de sesión
        // FALTA HACER OTRAS MODIFICACIONES PARA QUE ESTO FUNCIONE, EVALUAR SI ES NECESARIO
        // $newSessionId = session_create_id();
        // $sessionId = $newSessionId . " " . $result["id"];
        // session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        
        header("Location: ../index.php?login=success");

        $pdo = null;
        $stmt = null;
        
        die();
    } catch (PDOException $e) {
        header("Location: ../pages/samples/error-500.html");
        die("Query failed: " . $e->getMessage());
    }
}else
{
    header("Location: ../index.php");
    die();
}