<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('login.php');
}

include('connection.php');

$author = $_SESSION['admin'];



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
            <h2 class="title mycolour">Trading Information</h2>
        </section>



        <section>
            <h1 class="h2"></h1>



            
            <?php

            $read = "SELECT currency AS 'CurrencyFromID', currency AS 'CurrencyToID', amountSell, amountBuy, timePlaced, countryName FROM `CurrencyFairMessages` 
                    INNER JOIN CF_CurrencyFromTable
                    ON CurrencyFairMessages.currencyFromID = CF_CurrencyFromTable.id
                    WHERE CurrencyFairMessages.userID= '$author' ";


            $result = $conn->query($read);

            if (!$result) {
                echo $conn->error;
            }

            //print_r($result);



            while ($row = $result->fetch_assoc()) {


                $currencyFrom = $row['CurrencyFromID'];
                $currencyTo = $row['CurrencyToID'];
                $amountSell = $row['amountSell'];
                $amountBuy = $row['amountBuy'];
                $timePlaced = $row['timePlaced'];
                $country = $row['countryName'];


                echo "<div class='col col-lg-4 adminmenu' >  <div class='card'>";
                echo "<p>Currency From: $currencyFrom</p>";
                echo "<p>Currency To: $currencyTo</p>";
                echo "<p>Amount Sell: $amountSell</p>";
                echo "<p>Amount Buy: $amountBuy</p>";
                echo "<p>Date & Time Placed: $timePlaced</p>";
                echo "<p>Origin of Country: $country</p>";
                echo "</div> 
                </div>";
            }



            ?>

    </div>




</body>

</html>