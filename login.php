<?php
//Conexão co base de dados
require_once('conectar.php');

//Iniciar Sessão
session_start();

//Verificação dos dados
if (isset($_POST['btn-entrar'])) :
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if (empty($login) or empty($senha)) :
        $erros[] = "<li> Os campos Login e Senha precisam ser preenchidos</li>";
    else :
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if (mysqli_num_rows($resultado) > 0) :
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if (mysqli_num_rows($resultado) == 1) :
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('location: home.php');
            else :
                $erros[] = "<li> Usuario e senha não conferem </li>";
            endif;
        else :
            $erros[] = "<li> Usuario inexistente</li>";


        endif;

endif;
endif;



//Verificação com o botão Login
if(isset($_POST['btn-primary'])):
    require_once('conectar.php');
    $usuario=$_POST['usuario'];
    $pass=$_POST['password'];
    $datos=new Datos();
    if($datos->login($usuario,$pass))
    
        

        header('Location: subirfoto.php');

        exit();
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Foto-Api</title>
    <style>
        .form-group{
            position: relative;
            top: 150px;
            left: 150px;
            
        }
        body{
            background-image: linear-gradient(to right,dodgerblue,white);
        }
        .label{
            color:black;
            font-family: Arial, Helvetica, sans-serif;
            
        }
        p,a{
            color:black;
        }
        .button{
            position: relative;
            left:20%;
            width:10%;
            border-radius: 10px;
            background-image: linear-gradient(to right,blue,dodgerblue);
            color:white;
        }
               
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container col-md-6 col-sm-12">
        <form action="subirfoto.php" method="post">
            <div class="form-group">
                <label for="usuario" class="label" >Usuario</label>
                <input class="form-control col-md-6 col-sm-12" style="width:50%;"type="text" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label for="password" class="label" >Password</label>
                <input class="form-control col-md-6 col-sm-12" style="width:50%;" type="text" name="password" id="password">
            </div><br>
            <div class="form-group">
                <button type="submit" name="btn-primary" class="button">Entrar</button>
            </div><br>
            <div class="form-group col-md-6 col-sm-12">
                <p>Si todavía no estás registrado pulse <a href="registrarse.html">aqui:</a></p>
        </form>
        <?php if(isset($msj)) echo $msj; ?>
    </div>
</body>
