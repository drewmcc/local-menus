<?php
  require('header.php');
  require('restaurant.php');

  $path = explode('/', $_SERVER['REQUEST_URI']);

  switch($path[1]) {
    case "restaurant":
      $restaurant = new Restaurant();
      $restaurant->human_readable($path[2]);
      break;
    case "edit":
      if (!is_null($path[2])) {
        $restaurant = json_decode(file_get_contents("./data/{$path[2]}.json"), true);
        require_once('dashboard.php');
      } else {
        die('No Restaurant Given');
      }
      break;
    case "dashboard":
      require_once('dashboard.php');
      break;
    default:
      echo "INVALID ROUTE<br />";
      echo "Valid routes are:<br />";
      echo "* /restaurant/[restaurant handle]<br />";
      die();
      break;
  }
