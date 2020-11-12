<?php

session_start();

?>
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
            <h2>Login</h2>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row myfont mypaddingforloginbox">
        <div class="col-3"> </div>
        <div class="col-6">
            <form method='POST' action='login.php'>
                <div class="form-group">
                    <label for="exampleInputEmail1" >Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='emailfield'>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" >Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name='passfield'>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php

            if (isset($_POST['emailfield'])) {

                include('connection.php');

                $email = $_POST['emailfield'];

                $passw = $_POST['passfield'];

                $auth = "SELECT * FROM CF_Clients WHERE email='$email' AND password1=MD5('$passw')";

                $result = $conn->query($auth);

                $numrows = $result->num_rows;

                if ($numrows > 0) {


                    while($row=$result->fetch_assoc()){

                        $user = $row['id'];
                    }

                    //success of login
                    $_SESSION['admin'] = $email;

                    echo "correct user";

                    echo $_SESSION['admin']=$user;

                    header('location:profile.php');
                }

                echo "<p  class='mybackloginfont'> Incorrect Email Address or Password</p>";
            }

            ?>
        </div>
        <div class="col-3"> </div>
    </div>
    <div class="row myfont">
        <div class="col-3"> </div>
        <div class="col-6">
            <p class="mybackloginfont">If you don't have an account, why not Sign Up?</p>
            <a href="signup.php"><button type="submit" class="btn btn-primary">Sign Up</button></a>
        </div>
        <div class="col-3"> </div>

    </div>
    <br>
    <br>
    <br>

    


</body>

</html>