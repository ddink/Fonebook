<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fonebook</title>
    <link rel="stylesheet" href="css/app.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>
    <script src="script.js"></script>
  </head>
  <body>

    <?php 
      $servername = "localhost";
      $username = "root";
      $password = "root";

      try 
      {
        $pdo = new PDO("mysql:host=$servername;dbname=phonebook", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e)
      {
        echo "Oops! Connection failed: " . $e->getMessage();
      }

      try {
        $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY last_name");
        $stmt->execute();        
      }
      catch (Exception $e) {

      } 

    ?>
    
    <div class="contain-to-grid">
      <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
          <li class="name">
            <h1><a href="#">Fonebook</a></h1>
          </li>
        </ul>
      </nav>
    </div>

    <br>
    
    <div class="row">
      <div class="large-12 columns">
        <h1 style="color:#B6B6B6;font-size:3.25em;">Welcome to Fonebook</h1>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="large-8 medium-8 columns">
        <h5>Here Are Your Contacts:</h5>

        <br>

        <table>
          <thead>
            <tr>
              <th width="150">First Name</th>
              <th width="200">Last Name</th>
              <th width="200">Phone Number</th>
              <th>Delete?</th>
            </tr>
          </thead>
          <tbody>
            <?php 


            for ($i=0; $i<$stmt->rowCount(); $i++) {
              $contact = $stmt->fetch();
              $id = $contact['id'];
              $first_name = $contact['first_name'];
              $last_name = $contact['last_name'];
              $phone_number = $contact['phone_number'];


              echo '<tr id="contact_' . $id . '">';
              echo '<td id="first_name_' . $id . '">' . $first_name . '</td>';
              echo '<td id="last_name_' . $id . '">' . $last_name . '</td>';
              echo '<td id="phone_number_' . $id . '">' . $phone_number . '</td>';
              echo '<td>';
              echo '<a href="#" class="contact-delete tiny alert button" name="remove" value="remove" onclick="deleteRow(' . $id .')" id="' . $id .'">Remove</a><br/>';
              echo '</td>';
              echo '</tr>';
              
            }

            ?>
            <tr class="add_box"></tr>
          </tbody>
        </table>
      </div>     

      <div class="large-4 medium-4 columns">
        <h5>Enter New Contacts Below:</h5>
        <form id="form" name="form">
          <div class="row">
            <div class="large-12 columns">
              <label>First Name</label>
              <input type="text" name="first_name" id="first_name"/>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Last Name</label>
              <input type="text" name="last_name" id="last_name" />
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Phone Number</label>
              <input type="text" name="phone_number" id="phone_number" />
            </div>
          </div>
          <a href="#" class="medium success button" id="submit" onclick="addContact()">Add Contact</a>
        </form>
      </div>
    </div>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
	  

    </script>
  </body>
</html>
