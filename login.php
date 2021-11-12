<?php
    $server = "http://localhost:81";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $url = $server.'/Epiverso/logearse.php/';
        $data = [
            "user" => trim($_POST["user"]),
            "password" => trim($_POST["password"])
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $response = json_decode($response, true);

        if($response[0] == 1){
            session_start();

            unset($_POST['user'],$_POST['password']);
            $_POST['id_user'] = $response[1];
            $_SESSION['POST'] = $_POST;
            header("location: http://localhost:81/Epiverso/menu.php");
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Sans+Libre&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
</head>

<body>
    <section class="login-dark">
        <form action="login.php" method="post">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><img src="assets/img/logo.png" style="width: 209px;"></div>
            <div class="mb-3"><input class="form-control" type="text" name="user" placeholder="Usuario" value=""></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Contraseña" value=""></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/agency.js"></script>
</body>

</html>