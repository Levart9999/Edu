<?php

function logOut(){
    session_destroy();
    header("Location: secure/login.php");
    exit;
}