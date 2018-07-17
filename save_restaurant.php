<?php
  function handleize(String $title) {
    $handle = strtolower($title);
    $handle = preg_replace('/[^a-zA-Z\d\s:]/', '', $handle);
    $handle = preg_replace('/(\s\s+)|(\s)/', '-', $handle);

    return $handle;
  }

  $data = file_get_contents('php://input');

  $json = json_decode($data, true);

  $handle = handleize($json['name']);

  file_put_contents("data/$handle.json", $data);

  header("HTTP/1.1 200 Ok");
