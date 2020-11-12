<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>CurrencyFair</title>
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="myui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-md myfootercolour mylinks   mynavcolour sticky-top">
        <div class="container-fluid" <a class="navbar-brand" href="#"><img width="10%" src="https://media-exp1.licdn.com/dms/image/C4D0BAQHGF4t4W6wLgw/company-logo_200_200/0?e=1613001600&v=beta&t=db45NzN8mbnj2C1sajreuQcA2RQR8R5KzgUUT8_9qP0"></a>




            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>



                </ul>
            </div>
    </nav>

    <br>
    <br>
    <br>

    <div class="row ">
        <div class="col-3"></div>
        <div class="col-6 myfont">
            <h2>Sign Up</h2>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row ">
        <div class="col-3"></div>
        <div class="col-6 myfont">
            <h4>Personal Details</h4>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row myfont mypaddingforloginbox">
        <div class="col-3"> </div>
        <div class="col-6">
            <form action='signup.php' method='POST'>
                <div class="form-row">
                    <div class="col">
                        <label class="myfont">First Name</label>
                        <input type="text" name='listdatafirstname' class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <label class="myfont">Last Name</label>
                        <input type="text" name='listdatalastname' class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name='listdataemail' class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name='listdatapassword' class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" name='listdataaddress' class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" name='listdataaddress2' class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name='listdatacity' class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">County</label>
                        <input type="text" name='listdatacounty' id="inputState" class="form-control">

                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Postcode</label>
                        <input type="text" name='listdatapostcode' class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    
                </div>
                <button type="submit" value='insert' class="btn btn-primary">Submit</button>
            </form>
            <?php

            if (isset($_POST['listdatafirstname'], $_POST['listdatalastname'], $_POST['listdataemail'], $_POST['listdatapassword'], $_POST['listdataaddress'],$_POST['listdataaddress2'], $_POST['listdatacity'],  $_POST['listdatacounty'], $_POST['listdatapostcode'])) {

                include('connection.php');

                $myfirstname = $conn->real_escape_string($_POST['listdatafirstname']);
                $mylastname = $conn->real_escape_string($_POST['listdatalastname']);
                $myemail = $conn->real_escape_string($_POST['listdataemail']);
                $mypassword = $conn->real_escape_string($_POST['listdatapassword']);
                $myaddress = $conn->real_escape_string($_POST['listdataaddress']);
                $myaddress2 = $conn->real_escape_string($_POST['listdataaddress2']);
                $mycity = $conn->real_escape_string($_POST['listdatacity']);
                $mycounty = $conn->real_escape_string($_POST['listdatacounty']);
                $mypostcode = $conn->real_escape_string($_POST['listdatapostcode']);

                $insertsql = "INSERT INTO CF_Clients (first_name, lastname, email, password1, address1, address2, city, county, postcode, signupdatetime) VALUES ('$myfirstname', '$mylastname', '$myemail', MD5('$mypassword'), '$myaddress', '$myaddress2', '$mycity', '$mycounty', '$mypostcode', NOW())";

                $result = $conn->query($insertsql);

                if (!$result) {
                    echo $conn->error;
                } else {
                    echo "<p>You have successfully Signed Up to CurrencyFair";
                    echo "<p>An email has been sent to $myemail.</p>";
                    $time = date("l jS M Y");
                    $msg = "You have Signed Up to CurrencyFair on $time.";
                    // send email
                    //this will only work within my university email system
                    mail("$myemail", "Test 123", $msg);
                }
            }

            ?>
        </div>
        <div class="col-3"> </div>
    </div>
    <div class="row myfont">
        <div class="col-3"> </div>
        <div class="col-6">
            <p>If you have an account, why not Login?</p>
            <a href="login.php"><button type="submit" class="btn btn-primary">Login</button></a>
        </div>
        <div class="col-3"> </div>

    </div>
    <br>
    <br>
    <br>

    


</body>

</html>