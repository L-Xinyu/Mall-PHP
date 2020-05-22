<?php
require '../db.connect.php';
require '../tools.func.php';
require 'auth.php';

$id = intval($_GET['id']);

$prefix = getDBPrefix();
$sql = "DELETE FROM {$prefix}user WHERE id = '$id'";
if(execute($sql)){
    setInfo('Success to delete this user!');
}else{
    setInfo('Failed to delete user!');
}

header('location: users.php');

?>