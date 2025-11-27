<?php

    // Message Return Function
    function redirect($path, $message){

        $_SESSION['message'] = $message;
        header('Location: '.$path);
        exit();
    }

?>