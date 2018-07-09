<?php
  $path = explode('/', $_SERVER['PATH_INFO']);

  switch($path[1]) {
    case "restaurant":
      dump_restaurant_data($path[2]);
      break;
    default:
      echo "INVALID ROUTE<br />";
      echo "Valid routes are:<br />";
      echo "* /restaurant/[restaurant handle]<br />";
      die();
      break;
  }

function dump_restaurant_data($restaurant) {
  $file = file_get_contents("./data/$restaurant.json");

  if ($file == FALSE) {
    echo "INVALID RESTAURANT<br />";
    die();
  }

  $data = json_decode($file, true);

  $html = "";
  $html .= "<html>";
  $html .= "<body>";
  $html .= "<h1>{$data['name']}</h1>";
  if (!empty($data['hours'])) {
  $html .= "<div>";
  $html .= "<h2>Hours</h2>";
  $html .= $data['hours'];
  $html .= "</div>";
  }
  $html .= "<div>";
  $html .= "<h2>Phone</h2>";
  $html .= $data['phone'];
  $html .= "</div>";
  $html .= "<div>";
  $html .= "<h2>Website</h2>";
  $html .= "<a href='{$data['website']}'>{$data['website']}</a>";
  $html .= "</div>";
  $html .= "<div>";
  $html .= "<h2>Address</h2>";
  $html .= "<p>{$data['address']['street']}</p>";
  $html .= "<p>{$data['address']['city']},";
  $html .= $data['address']['state'] . " ";
  $html .= $data['address']['zip'] . "</p>";
  $html .= "</div>";
  $html .= "<div>";
  $html .= "<h2>Menu</h2>";
  foreach ($data['menu'] as $key => $section) {
    $html .= "<h3>$key</h3>";
    foreach ($section as $item) {
      $html .= "<div>{$item['name']} {$item['price']}</div>";
      $html .= "<div>{$item['description']}</div>";
      $html .= "<hr />";
    }
  }
  $html .= "</div>";
  $html .= "</body>";
  $html .= "</html>";

  echo $html;
}
