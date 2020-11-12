<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('login.php');
}
include("connection.php");

$author = $_SESSION['admin'];



$readCurrencyFrom = "SELECT * FROM CF_CurrencyFromTable ORDER BY currency ASC";

$result2 = $conn->query($readCurrencyFrom);

if (!$result2) {
    echo $conn->error;
}

$readCurrencyTo = "SELECT * FROM CF_CurrencyToTable ORDER BY currency ASC";

$result3 = $conn->query($readCurrencyTo);

if (!$result3) {
    echo $conn->error;
}
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
      <li class="nav-item"> <a href="ptprofile.php">Profile</a></li>
      <li class="nav-item"> <a href="menu.php">Menu</a></li>
      <li class="nav-item"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

    <div class='container mywidth'>
        <section>
            <h2 class="title mycolour">Insert Trading Message</h2>
        </section>

        <?php
        
        if (isset($_POST['submit'])) {

            include('connection.php');

            
            $author = $_SESSION['admin'];
            $currencyfrom = $_POST['currencyfrom'];
            $currencyto = $_POST['currencyto'];
            $amountSell = $_POST['asell'];
            $amountBuy = $_POST['abuy'];
            $rate = $_POST['rate'];
            $ocountry = $_POST['ocountry'];
            

            $insert = "INSERT INTO CurrencyFairMessages (userID, currencyFromID,currencyToID, amountSell, amountBuy, rate, timePlaced, countryName) VALUES ('$author', '$currencyfrom','$currencyto', '$amountSell', '$amountBuy', '$rate', NOW(), '$ocountry')";
            $result = mysqli_query($conn, $insert) or die(mysqli_error($conn));
            //echo $insert;
            //this is code to query the MYSQL DB 
            // $result = $conn->query($insert);

            //checking to make sure there is no sql errors
            if (!$result) {
                echo $conn->error;
            } else {
                //return feedback to web user if everything is ok
                echo "<h5 class='mycolour'> Trading message inserted</h5>";
            }
        }
        ?>

        <form action='inserttradingmessage.php' enctype="multipart/form-data" method='POST' class="frmImageUpload">

            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Currency from:</h5>
                        </label>
                    </div>
                </div>

                <select name='currencyfrom'>
                            <?php
                            //this makes it scalable, this is very uesful for maybe uploading new currencies
                            while ($row = $result2->fetch_assoc()) {

                                $currencyfromid = $row['id'];
                                $currencyfromdata = $row['currency'];

                                echo " <option value='$currencyfromid'>$currencyfromdata</option> ";
                            }
                            ?>

                        </select>
            </div>

            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Currency to:</h5>
                        </label>
                    </div>
                </div>

                <select name='currencyto'>
                            <?php
                            //this makes it scalable, this is very uesful for maybe uploading new currencies
                            while ($row = $result3->fetch_assoc()) {

                                $currencytoid = $row['id'];
                                $currencytodata = $row['currency'];

                                echo " <option value='$currencytoid'>$currencytodata</option> ";
                            }
                            ?>

                        </select>
            </div>

            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Amount sell:</h5>
                        </label>
                    </div>
                </div>

                <div class='col col-lg-9 '>
                    <div class="form-control">
                        <input name='asell' type="text" placeholder="100">
                    </div>
                </div>
            </div>

            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Amount buy:</h5>
                        </label>
                    </div>
                </div>

                <div class='col col-lg-9 '>
                    <div class="form-control">
                        <input name='abuy' type="text" placeholder="100">
                    </div>
                </div>
            </div>
            
            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Rate:</h5>
                        </label>
                    </div>
                </div>

                <div class='col col-lg-9 '>
                    <div class="form-control">
                        <input name='rate' type="text" placeholder="1.00">
                    </div>
                </div>
            </div>
            <div class='row card'>
                <div class='col col-lg-3 '>
                    <div class="form-control">
                        <label>
                            <h5>Orgin of Country:</h5>
                        </label>
                    </div>
                </div>
                <div class='col col-lg-9 '>
                    <div class="form-control">
                        <input name='ocountry' type="text" placeholder="Enter a country">
                    </div>
                </div>
                
            </div>

                <div class='row'>
                    <div class='col col-lg-10 '>
                    </div>
                    <div class='col col-lg-2 '>
                        <input type='submit' name='submit' class='button-primary-outlined' value='insert'>
                    </div>

                </div>
            </div>
        </form>

    </div>

</body>


</html>