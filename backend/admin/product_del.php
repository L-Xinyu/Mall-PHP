<?php
require '../db.connect.php';
require '../tools.func.php';

$id = intval($_GET['id']);

$prefix = getDBPrefix();
$sql = "DELETE FROM {$prefix}product WHERE id = '$id'";
if(execute($sql)){
    setInfo('Success to delete this product!');
}else{
    setInfo('Failed to delete product!');
}

header('location: products.php');

?>
