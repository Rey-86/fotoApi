<?php
//Solicitação de arquivo
require_once('api');

// conexão com a base de dados
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = '';

$connect = new mysqli($servername,$username,$password,$db_name);

//Verficação com Conexão
if(mysqli_connect_error()):
    echo "Falha na conexão".mysqli_connect_error();
else:
    echo "Conexão bem sucedida";
endif;

?>
