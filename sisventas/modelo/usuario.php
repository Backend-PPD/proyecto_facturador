<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Usuario {

    private $idusuario;
    private $nomusuario;
    private $password;
    private $apellidos;
    private $nombres;
    private $email;
    private $estado;
    private $con;

    public function __construct(){
        $cnx = new DBConection();
        $this->con = $cnx->conectar();
    }

    public function listado(){
        $sql = "select * from usuarios";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscar($id){
        $sql = "select * from usuarios where idusuario = :idusuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idusuario', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "insert into usuarios (idusuario, nomusuario, password, apellidos, nombres, email, estado)
                values (:idusuario, :nomusuario, :password, :apellidos, :nombres, :email, :estado)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idusuario', $this->idusuario);
        $stmt->bindParam(':nomusuario', $this->nomusuario);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':nombres', $this->nombres);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':estado', $this->estado);
        if ($stmt->execute()){
            return true;
        } else
            return false;
    }

    public function update(){
        $sql = "update usuarios set nomusuario=:nomusuario, password=:password, apellidos=:apellidos, nombres=:nombres, email=:email, estado=:estado where idusuario=:idusuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idusuario', $this->idusuario);
        $stmt->bindParam(':nomusuario', $this->nomusuario);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':nombres', $this->nombres);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':estado', $this->estado);
        return $stmt->execute();
    }

    public function delete(){
        $sql = "delete from usuarios where idusuario=:idusuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idusuario', $this->idusuario);
        return $stmt->execute();
    }

    public function setIdusuario($id){ $this->idusuario = $id; }
    public function setNomusuario($nom){ $this->nomusuario = $nom; }
    public function setPassword($pass){ $this->password = $pass; }
    public function setApellidos($ape){ $this->apellidos = $ape; }
    public function setNombres($nom){ $this->nombres = $nom; }
    public function setEmail($email){ $this->email = $email; }
    public function setEstado($est){ $this->estado = $est; }
    public function getIdusuario(){ return $this->idusuario; }
    public function getNomusuario(){ return $this->nomusuario; }
    public function getPassword(){ return $this->password; }
    public function getApellidos(){ return $this->apellidos; }
    public function getNombres(){ return $this->nombres; }
    public function getEmail(){ return $this->email; }
    public function getEstado(){ return $this->estado; }
}