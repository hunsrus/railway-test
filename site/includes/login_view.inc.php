<?php

declare(strict_types=1);

function check_login_errors()
{
    if(isset($_SESSION['errors_login']))
    {
        $errors = $_SESSION['errors_login'];

        echo '<br><div class="text-center text-danger">';
        
        foreach($errors as $error)
        {
            echo '<p>' . $error . '</p>';
        }

        echo '</div>';
        
        unset($_SESSION['errors_login']);
    }
}