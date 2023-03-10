<?php
//Conexão co base de dados
require_once('conectar.php');
//Iniciar Sessão
session_start();
if(isset($_SESSION['idusuario'])){
    header('Location: index.php');
}
if(isset($_POST['usuario'])){
   $usuario=$_POST['usuario'];
   $pass=$_POST['password'];
   $datos=new Datos();
   $user=$datos->login($usuario,$pass);
    if($user!=null){
$_SESSION['idusuario']=$user['idusuario'];
$_SESSION['nombre']=$user['nombre'];
header('Location: index.php');
    }else{
        $msj='Usuario o contraseça incorrecta';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Foto-Api</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="login">
    <div class="container col-md-6 col-sm-12">
        <form  action="" method="post">
            <div class="form-group">
                <label for="usuario" class="label" >Usuario</label>
                <input class="form-control col-md-6 col-sm-12" type="text" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label for="password" class="label" >Password</label>
                <input class="form-control col-md-6 col-sm-12"  type="text" name="password" id="password">
            </div><br>
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="btn-primary" class="button">Entrar</button>
            </div><br>
            <div class="form-group col-md-6 col-sm-12">
                <p class="p">Si todavía no está registrado pulse <a href="registro.php">aqui:</a></p>
        </form>
        <?php if(isset($msj)) echo $msj; ?>
    </div>
</body>

</html>