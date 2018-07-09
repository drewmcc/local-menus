<?php
  require('restaurant.php');
  $restaurant = new Restaurant();
  $path = explode('/', $_SERVER['PATH_INFO']);

  switch($path[1]) {
    case "restaurant":
      $restaurant->human_readable($path[2]);
      break;
    case "dashobard":
      die("DASHBOARD ACCESSED");
      break;
    default:
      echo "INVALID ROUTE<br />";
      echo "Valid routes are:<br />";
      echo "* /restaurant/[restaurant handle]<br />";
      die();
      break;
  }
