<?php
include 'post.php';
header ('Content-type: application/json');

$user = new Post();
$result = $user->search();

echo json_encode($result);

?>