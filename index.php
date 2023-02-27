<?php
$fotos=array(
    array('id'=> 1,'archivo'=>'mecanicareloj.jpg'),
    array('id'=> 2,'archivo'=>'perro.jpg'),
    array('id'=> 3,'archivo'=>'img3.jpg'),
    array('id'=> 4,'archivo'=>'img4.jpg'),
    array('id'=> 5,'archivo'=>'img5.jpg'),
    array('id'=> 6,'arcgivo'=>'img6.jpg'),
    array('id'=> 7,'archivo'=>'img7.jpg'),
    array('id'=> 8,'archivo'=>'img8.jpg'),
    array('id'=> 9,'archivo'=>'img9.jpg'),
    array('id'=>10,'archivo'=>'img10.jpg'),

);
$contenido="";
for ($i=0; $i < count($fotos); $i++) { 
    $foto=$fotos[$i];
    $contenido.='<div class="img-thumbnail">
        
    <img class="img-fluid" src="imagens/'.$foto["archivo"].'">
    <p>Autor<i class="fa-regular fa-thumbs-up d-none"></i><label
            class="d-flex justify-content-center align-items-center rounded-circle border border-dark"
            style="width: 20px; height: 20px;" for="">5</label></p>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<main class="container col-md-6 col-sm-12">
    <a href="login.html">Login</a>
    <a href="registrarse.html">Registrarse</a>
    <?=$contenido?>
</main>

<body>

</body>

</html>