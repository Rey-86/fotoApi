<?php
   define('DB_SERVER', "localhost");
   define('DB_USERNAME', "root");
   define('DB_PASSWORD', "");
   define('DB_DATABASE', "fotoapi");

   class Datos{
    private $conn;
    function __construct(){
        $this->conn=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    }
    function login($username,$pass){
        $consulta="select * from usuarios where nombre=? and password=?";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("ss",$username,$pass);
        $stm->execute();
        $resultado=$stm->get_result();
        if($resultado->num_rows>0){
            return true;
        }else{
            return false;
        }


    }
    function registrar($nombre,$pass,$email){
        $consulta="insert into usuarios (nombre,email,password) values (?,?,?)";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("sss",$nombre,$email,$pass);
        $stm->execute();
       
        if($stm->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    function subirFoto($titulo,$archivo,$idusuario){
        $consulta="insert into fotos (titulo,archivo,idusuario) values (?,?,?)";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("ssi",$titulo,$archivo,$idusuario);
        $stm->execute();
       
        if($stm->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }


   }

   $datos=new Datos();
 if($datos->subirFoto("Foto paisaje","paisaje.jpg","1")){
echo "foto registrado ok";
 }else{
echo "foto no registrado ok";
 }
   
  ?>