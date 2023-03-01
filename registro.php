<?php

if(isset($_POST['btn-primary'])){
    require_once('conectar.php');
    $usuario=$_POST['usuario'];
    $email = $_POST['email'];
    $pass=$_POST['password'];
    $datos=new Datos();
    if($datos->login($usuario,$pass)){

 header('Location: login.php');

        exit();
}
    
    }

    
        
       
      







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse Foto-Api</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="sign">
    <div class="container col-md-6 col-sm-12">
        <br>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input class="form-control col-md-6 col-sm-12" type="text" name="usuario" id="usuario">
            </div>
            <br>
            <div class="form-group">
                <label for="usuario">Email</label>
                <input class="form-control col-md-6 col-sm-12" type="email" name="email" id="email">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control col-md-6 col-sm-12" type="text" name="password" id="password">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
</body>
</html>