<html>
  <body>
<?php
if (isset($restaurant)):
?>
    <form action='POST' class="dashboard">
      <h2>Basic Information</h2>
      <div class="inputgroup">
        <label for='name'>Restaurant Name</label>
        <input type='text' name='name' value="<?php echo $restaurant['name'] ?>" />
      </div>
      <div>
        <label>Delivery </label>
        <input type="checkbox" name="delivery" <?php echo ($restaurant['delivery'] ? "checked" : "") ?>>
      </div>
      <div class="inputgroup">
        <label for='hours'>Hours of Operation</label>
        <textarea rows='5' type='text' name='hours'>
          <?php echo $restaurant['hours'] ?>
        </textarea>
      </div>
      <div class="inputgroup">
        <label for='phone'>Phone Number</label>
        <input type='text' name='phone' value="<?php echo $restaurant['phone'] ?>"/>
      </div>
      <div class="inputgroup">
        <label for='website'>Website</label>
        <input type='text' name='website' value="<?php echo $restaurant['website'] ?>"/>
      </div>
      <h2>Address</h2>
      <div>
        <label for='street'>Street Address</label>
        <input type='text' name='street' value="<?php echo $restaurant['address']['street'] ?>"/>
      </div>
      <div>
        <label for='city'>City</label>
        <input type='text' name='city' value="<?php echo $restaurant['address']['city'] ?>"/>
      </div>
      <div>
        <label for='state'>State</label>
        <input type='text' name='state' value="<?php echo $restaurant['address']['state'] ?>"/>
      </div>
      <div>
        <label for='zip'>Postal Code</label>
        <input type='number' name='zip' value="<?php echo $restaurant['address']['zip'] ?>"/>
      </div>
      <div>
        <h2>Menu Sections</h2>
      </div>
      <?php foreach($restaurant['menu'] as $section): ?>
        <div class="section">
          <div>
            <label>Section Title</label>
            <input type='text' name="section_title" value="<?php echo $section['section_name']; ?>"/>
          </div>
          <div>
            <h3>Menu Items</h3>
          </div>
          <?php foreach($section['item'] as $item): ?>
          <div class="item">
            <div>
              <div>
                <label>Item Name</label>
                <input type='text' name="item_name" <?php echo $item['name']; ?>/>
              </div>
              <div>
                <label>Description</label>
                <textarea type='text' name="item_description"><?php echo $item['description']; ?></textarea>
              </div>
              <div>
                <label>Price $</label>
                <input type="number" step="0.01" name="price" value="<?php echo $item['price']; ?>">
              </div>
              <div>
               <label>Vegan </label>
               <input type="checkbox" name="vegan" <?php echo ($item['vegan'] ? "checked" : "") ?>>
              </div>
              <div>
                <label>Vegetarian </label>
                <input type="checkbox" name="vegetarian" <?php echo ($item['vegetarian'] ? "checked" : "") ?>>
              </div>
              <hr />
            </div>
          </div>
          <?php endforeach; ?>
          <div>
            <button type="button" class="add_item" onclick="add_item(this)">Add Item</button>
          </div>
        </div>
      <?php endforeach; ?>
      <div>
        <button type="button" class="add_section">Add Section</button>
      </div>
      <div>
        <button type="button" class="save">Save Restaurant</button>
      </div>
    </form>
<?php else: ?>
<html>
    <form action='POST' class="dashboard">
      <div>
        <h2>Basic Information</h2>
      </div>
      <div>
        <label for='name'>Restaurant Name</label>
        <input type='text' name='name' />
      </div>
      <div>
        <label>Delivery </label>
        <input type="checkbox" name="delivery">
      </div>
      <div>
        <label for='hours'>Hours of Operation</label>
        <textarea rows='5' type='text' name='hours'></textarea>
      </div>
      <div>
        <label for='phone'>Phone Number</label>
        <input type='text' name='phone' />
      </div>
      <div>
        <label for='website'>Website</label>
        <input type='text' name='website' />
      </div>
      <div>
        <h2>Address</h2>
      </div>
      <div>
        <label for='street'>Street Address</label>
        <input type='text' name='street' />
      </div>
      <div>
        <label for='city'>City</label>
        <input type='text' name='city' />
      </div>
      <div>
        <label for='state'>State</label>
        <input type='text' name='state' />
      </div>
      <div>
        <label for='zip'>Postal Code</label>
        <input type='number' name='zip' />
      </div>
      <div>
        <h2>Menu Sections</h2>
      </div>
      <div class="section">
        <div>
          <label>Section Title</label>
          <input type='text' name="section_title"/>
        </div>
        <div>
          <h3>Menu Items</h3>
        </div>
        <div class="item">
          <div>
            <div>
              <label>Item Name</label>
              <input type='text' name="item_name"/>
            </div>
            <div>
              <label>Description</label>
              <textarea type='text' name="item_description"></textarea>
            </div>
            <div>
              <label>Price $</label>
              <input type="number" step="0.01" name="price">
            </div>
            <div>
             <label>Vegan </label>
              <input type="checkbox" name="vegan">
            </div>
            <div>
              <label>Vegetarian </label>
              <input type="checkbox" name="vegetarian">
            </div>
            <hr />
          </div>
        </div>
        <div>
          <button type="button" class="add_item" onclick="add_item(this)">Add Item</button>
        </div>
      </div>
      <div>
        <button type="button" class="add_section">Add Section</button>
      </div>
      <div>
        <button type="button" class="save">Save Restaurant</button>
      </div>
    </form>
<?php endif; ?>
    <script>
      let section_html = document.querySelector('.section').cloneNode(true),
          item_html = document.querySelector('.item').cloneNode(true);

      document.querySelector('.add_section').onclick = function () {
        document.querySelector('form').insertBefore(section_html.cloneNode(true), this.parentNode);
      };

      function add_item(el) {
        el.parentNode.parentNode.insertBefore(item_html.cloneNode(true), el.parentNode);
      };

      document.querySelector('.save').onclick = function () {
        let today = new Date();
        let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

        let minutes = today.getMinutes();
        if (minutes.length == 1) {
          minutes = "0" + minutes;
        }

        let seconds = today.getSeconds();
        if (seconds.length == 1) {
          seconds = "0" + seconds;
        }

        let time = today.getHours() + ":" + minutes + ":" + seconds;
        let dateTime = date+' '+time;

        let menu = [];

        document.querySelectorAll('.section').forEach(function (section_el) {
          let section  = {};

          section.section_name = section_el.querySelector('[name="section_title"]').value;
          section.item = [];
          section_el.querySelectorAll('.item').forEach(function (item_el) {
            let item = {
              "name": item_el.querySelector('[name="item_name"]').value,
              "description": item_el.querySelector('[name="item_description"]').value,
              "price": item_el.querySelector('[name="price"]').value,
              "vegan": item_el.querySelector('[name="vegan"]').checked,
              "vegetarian": item_el.querySelector('[name="vegetarian"]').checked
            };
            section.item.push(item);
          });

          menu.push(section);
        });

        let data = {
          "name": document.querySelector('[name="name"]').value,
          "delivery": document.querySelector('[name="delivery"]').checked,
          "hours": document.querySelector('[name="hours"]').value,
          "phone": document.querySelector('[name="phone"]').value,
          "website": document.querySelector('[name="website"]').value,
          "last_updated": dateTime,
          "address": {
            "street": document.querySelector('[name="street"]').value,
            "city": document.querySelector('[name="city"]').value,
            "state": document.querySelector('[name="state"]').value,
            "zip": document.querySelector('[name="zip"]').value
          },
          "menu": menu
        };


        var request = new XMLHttpRequest();
        request.open('POST', '/save_restaurant.php', true);
        request.send(JSON.stringify(data));

        request.onreadystatechange = function () {
          if(request.readyState === 4 && request.status === 200) {
            alert('Restaurant Saved!');
            // window.location.reload();
          }
        };
      };
    </script>
  </body>
</html>

