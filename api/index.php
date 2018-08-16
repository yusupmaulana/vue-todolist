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
    // escape!
    $text = $_POST['text'];
    $done = $_POST['done'];
    $date = $_POST['date'];

    if (!isset($text)) {
      http_response_code(400);
      die();
    } else {
      $sql  = "INSERT INTO todo (text, done, id_date) VALUES ('$text', $done, '$date')";
      $result = mysqli_query($conn, $sql);
      http_response_code(200);
      die();
    }

    break;

  case 'DELETE':
    $id_date = $_GET['id'];
    $sql  = "DELETE FROM todo WHERE id_date = '$id_date'";
    $result = mysqli_query($conn, $sql);
    http_response_code(200);
    die();
    break;

  case 'PATCH':
    // code...
    break;

  default:
    // code...
    break;
}
