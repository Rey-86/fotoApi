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
        return $resultado->fetch_assoc();


    }

    function registrar($nombre,$pass,$email){
        $consulta="select * from usuarios where nombre=?";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("s",$nombre);
        $stm->execute();
        $resultado=$stm->get_result();
        if($resultado->num_rows>0){
            echo "El usuario ya existe";
            return false;
       }else{
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
    }

    function subirFoto($titulo,$archivo,$idusuario){
        $consulta="select * from fotos where titulo=? and archivo=?";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("ss",$titulo,$archivo);
        $stm->execute();
        $resultado=$stm->get_result();
        if($resultado->num_rows>0){
            echo "Esa foto está repetida";
            return false;
       }else{
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

    function listaFotos(){
        $fotos=array();
        $consulta="SELECT F.*,U.nombre,COUNT(V.idfoto) as votos FROM `fotos` as F INNER JOIN usuarios as U on F.idusuario=U.idusuario LEFT JOIN votos as V on V.idfoto=F.idfoto GROUP by V.idfoto;";
        $stm=$this->conn->prepare($consulta);
        $stm->execute();
        $resultado=$stm->get_result();
       if($resultado->num_rows>0){
            while($registro=$resultado->fetch_assoc()){
                array_push($fotos,$registro);
            }  
       }
       return $fotos;
    }

    function votar($idusuario,$idfoto){
        $consulta="select * from fotos where idusuario=? and idfoto=?";
        $stm=$this->conn->prepare($consulta);
        $stm->bind_param("ii",$idusuario,$idfoto);
        $stm->execute();
        $resultado=$stm->get_result();
        if($resultado->num_rows>0){
            echo "El usuario no puede volver a votar esa foto";
            return false;
       }else{
            $fotos=array();
            $consulta="insert into votos (idusuario,idfoto) values (?,?)";
            $stm=$this->conn->prepare($consulta);
            $stm->bind_param("ii",$idusuario,$idfoto);
            $stm->execute();
            if($stm->affected_rows>0){
                return true;
            }else{
                return false;
            }
       }
    }
   }
  ?>