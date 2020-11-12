<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('login.php');
}

include('connection.php');
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
      <li class="nav-item"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

    <div class='container'>
        <section>
            <h2 class="title mycolour">Menu</h2>
        </section>
        <div class='row'>


            <div class='col col-lg-6 adminmenu'>
                <a href='inserttradingmessage.php'>
                    <div class='card'>
                        <img src='https://static.thenounproject.com/png/981060-200.png' width='25%'>
                        <h3>Add a Trading message</h3>
                    </div>
                </a>
            </div>

            <div class='col col-lg-6 adminmenu '>
                <a href='viewtradingmessage.php'>
                    <div class='card'>
                        <img src='https://static.thenounproject.com/png/981060-200.png' width='25%'>
                        <h3>View Trading Messages</h3>
                    </div>
            </div>


        </div>
            


    </div>

</body>


</html>