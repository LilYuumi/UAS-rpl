<?php

include('../functions/reuseableFunction.php');

if (isset($_SESSION['auth'])) {
    
    if ($_SESSION['role'] != 1) {

        redirect("../index.php", "You are not an admin");

    }

} else {

    redirect("../login.php", "Login to access");

}
?>