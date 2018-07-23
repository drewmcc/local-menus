<?php
  class Restaurant {
    public function human_readable($restaurant) {
			$file = file_get_contents("./data/$restaurant.json");

			if ($file === FALSE) {
        die("INVALID RESTAURANT");
			}

      $data = json_decode($file, true);

      $html = "";
      $html .= "<html>";
      $html .= "<body>";
      $html .= "<h1>{$data['name']}</h1>";
      if (!empty($data['hours'])) {
      $html .= "<div>";
      $html .= "<h2>Hours</h2>";
      $html .= nl2br($data['hours']);
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
      foreach ($data['menu'] as $section) {
        $html .= "<h3>{$section['section_name']}</h3>";
        foreach ($section['item'] as $item) {
          $html .= "<div>{$item['name']} {$item['price']}</div>";
          $html .= "<div>" . nl2br($item['description']) . "</div>";
          $html .= "<hr />";
        }
      }
      $html .= "</div>";
      $html .= "</body>";
      $html .= "</html>";

      echo $html;
    }
  }
