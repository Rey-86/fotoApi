<?php
require_once('conectar.php');
$datos = new Datos();
$fotos = $datos->listaFotos();

session_start();

$contenido = "";
$votar="";

for ($i = 0; $i < count($fotos); $i++) {
    $foto = $fotos[$i];
    if(isset($_SESSION["idusuario"])){
        $votar='<a href="votacion.php?id='.$foto["idfoto"].'">"<i class="fa-regular fa-2x fa-thumbs-up"></i></a>';
    }
    
    $contenido .= '<div class="col-md-4 col-sm-12 img-thumbnail">
        
    <img class="img-fluid" src="imagens/' . $foto["archivo"] . '">
    <p>Autor:'.$foto["nombre"].'<i class="fa-regular fa-thumbs-up d-none"></i><label
            class="d-flex justify-content-center align-items-center rounded-circle border border-dark"
            style="width: 20px; height: 20px;" for="">'.$foto["votos"].'</label>'.$votar.'</p>

</div>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto-Api</title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="container">


    <nav class="navbar">
        <?php
        $navbar = '';
        if (!isset($_SESSION['idusuario'])) {
            $navbar = '<a href="login.php">Login</a>';
        } else {
            $navbar = '<a href="logout.php">Salir</a><span>' . $_SESSION["nombre"] . '</span>';
        }
        echo $navbar;
        ?>
    </nav>
    <?php if(isset($_SESSION["idusuario"])){
        echo '<a href="subirfoto.php"><i class="fa-solid fa-camera-retro"></i></a>';
    }
    ?>
    

    <div class="row">
        <?= $contenido ?>
    </div>




</body>

</html>