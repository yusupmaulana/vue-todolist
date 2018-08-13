<?php

header('Content-Type: application/json');

$conn    = mysqli_connect('localhost','root','root','todolist');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
  case 'GET':
    $sql  = "SELECT * FROM todo";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 ) {
      echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
      http_response_code(200);
      die();
    }

    break;

  case 'POST':
    // code...
    break;

  case 'DELETE':
    // code...
    break;

  case 'PATCH':
    // code...
    break;

  default:
    // code...
    break;
}
