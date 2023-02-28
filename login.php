<?php
//Verificação com o botão Login
if(isset($_POST['btn-primary'])):
    require_once('conectar.php');
    $usuario=$_POST['usuario'];
    $servername=$_POST['localhost'];
    $pass=$_POST['password'];
    $datos=new Datos();
    if($datos->login($usuario,$pass)){
    //Iniciar session
        header('location:index.php');

        exit();
    }else{
        //Mostrar mensaje de error
        header('location:login.php');
     
    }

endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Foto-Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container col-md-6 col-sm-12">
        <form action="" method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input class="form-control col-md-6 col-sm-12" type="text" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control col-md-6 col-sm-12" type="text" name="password" id="password">
            </div>
            <div class="form-group">
                <button type="submit" name="btn-primary">Entrar</button>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <p>Si todavía no estás registrado pulse <a href="registrarse.html">aquí</a>: </p>
        </form>
        <?php if(isset($msj)) echo $msj; ?>
    </div>
</body>

</html>