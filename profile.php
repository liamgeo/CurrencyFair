<?php

session_start();

if (!isset($_SESSION['admin'])) {
  header('login.php');
}

include('connection.php');

$author = $_SESSION['admin'];

$profile = "SELECT * FROM CF_Clients WHERE id = '$author'";

$result = $conn->query($profile);


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>CurrencyFair</title>
  <link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">
  <link rel="stylesheet" href="admingui.css">
</head>

<body>

<nav class="mycolournav">
    <div class="nav-container">
      <div class="nav-logo">
        <a href="/"></a>
      </div>
      <ul class="nav-links">
      <li class="nav-item"> <a href="profile.php">Profile</a></li>
      <li class="nav-item"> <a href="menu.php">Menu</a></li>
      <li class="nav-item"><a href="logout.php">Logout</a></li>
      </ul>
      <a class="mobile-menu-toggle"></a>
      <ul class="mobile-menu menu" style="display:none;">
      <li class="nav-item"> <a href="profile.php">Profile</a></li>
      <li class="nav-item"> <a href="menu.php">Menu</a></li>
      <li class="nav-item"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>


  <div class='container mywidth'>
    <section>
      <h2 class="title mycolour ">Welcome</h2>
    </section>

    <?php
    //change this
    if (!$result) {
      echo $conn->error;
    } else {

      while ($row = $result->fetch_assoc()) {
        //this will print out an initial welcome message statin their first and last name.
        $first_name = $row['first_name'];
        $last_name = $row['lastname'];

        echo "<h2 class='mycolour'> Welcome $first_name $last_name  </h2>";
      }
    }

    ?>

<section>
            <h1 class="h2"></h1>
            <div class="row">
                <div class="col col-md-12 adminmenu">
                    <div class="card">
                        <h3 class="card-title">Personal Details</h3>
                        <?php
                        $read = "SELECT CF_Clients.id, CF_Clients.first_name, CF_Clients.lastname, CF_Clients.email, CF_Clients.address1, CF_Clients.address1, CF_Clients.address2, CF_Clients.city, CF_Clients.county, CF_Clients.postcode FROM `CF_Clients` WHERE id='$author'";

                        $result = $conn->query($read);

                        if (!$result) {
                            echo $conn->error;
                        }

                        



                        while ($row = $result->fetch_assoc()) {
                            //this will print all the details that the user used when signing up 
                            $get_id = $row['id'];
                            $firstname = $row['first_name'];
                            $lastname = $row['lastname'];
                            $email = $row['email'];
                            $address1 = $row['address1'];
                            $address2 = $row['address2'];
                            $city = $row['city'];
                            $county = $row['county'];
                            $postcode = $row['postcode'];

                            echo " <input type='hidden' value='$get_id'>";
                            echo "<p>$firstname</p>";
                            echo "<p>$lastname</p>";
                            echo "<p>$email</p>";
                            echo "<p>$address1</p>";
                            echo "<p>$address2</p>";

                            echo "<p>$city</p>";

                            echo "<p>$county</p>";

                            echo "<p>$postcode</p>";
                        }

                        

                        ?>

                    </div>
                </div>
            </div>

        </section>



</body>

</html>