<?php
session_start();
require_once("conectar.php");
if(isset($_GET["id"]) && isset($_SESSION["idusuario"])){
    $idfoto=$_GET["id"];
    $idusuario=$_SESSION["idusuario"];

    $datos=new Datos();
    $datos->votar($idusuario,$idfoto);
    header("Location: index.php");
}