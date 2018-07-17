<?php
  require('restaurant.php');
  $restaurant = new Restaurant();

  $path = explode('/', $_SERVER['REQUEST_URI']);

  switch($path[1]) {
    case "restaurant":
      $restaurant->human_readable($path[2]);
      break;
    case "dashboard":
      switch($_SERVER['REQUEST_METHOD']) {
        case "POST":
          die("POST");
          break;
        default:
          require_once('dashboard.php');
          break;
      }
      break;
    default:
      echo "INVALID ROUTE<br />";
      echo "Valid routes are:<br />";
      echo "* /restaurant/[restaurant handle]<br />";
      die();
      break;
  }
