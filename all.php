<?php
include 'db.php';
header ('Content-type: application/json');

$user = new Database();
$result = $user->init();

echo json_encode($result);

?>