<?php
  $path = explode('/', $_SERVER['PATH_INFO']);

  switch($path[1]) {
    case "restaurant":
      dump_restaurant_data($path[2]);
      break;
    default:
      die("INVALID ROUTE");
      break;
  }

function dump_restaurant_data($restaurant) {
  $data = json_decode(file_get_contents("./data/$restaurant.json"), true);
  var_dump($data);
}
