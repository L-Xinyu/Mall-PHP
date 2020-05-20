<?php
//delete user session
require '../tools.func.php';

deleteSession('admin');
header('location: login.php');
?>