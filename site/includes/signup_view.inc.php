<?php

declare(strict_types=1);

function check_signup_errors()
{
    if(isset($_SESSION['error_signup']))
    {
        $errors = $_SESSION['error_signup'];

        echo '<br><div class="text-center text-danger">';
        
        foreach($errors as $error)
        {
            echo '<p>' . $error . '</p>';
        }

        echo '</div>';
        
        unset($_SESSION['error_signup']);
    }
}