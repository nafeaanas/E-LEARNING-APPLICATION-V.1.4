<?php
include 'Students/Connection.php';
session_start();
if (isset($_POST['name']) && isset($_POST['email']) 
    && isset($_POST['password']) && isset($_POST['re_password']) )

?>