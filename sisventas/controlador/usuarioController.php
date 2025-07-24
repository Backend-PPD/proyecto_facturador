<?php

include $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/usuario.php";

class UsuarioController {

    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function obtener_listado() {
        return $this->modelo->listado();
    }

    public function buscar_usuario($id) {
        return $this->modelo->buscar($id);
    }

    public function inserta_usuario($nomusuario, $password, $apellidos, $nombres, $email, $estado) {
        $this->modelo->setNomusuario($nomusuario);
        $this->modelo->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $this->modelo->setApellidos($apellidos);
        $this->modelo->setNombres($nombres);
        $this->modelo->setEmail($email);
        $this->modelo->setEstado($estado);
        return $this->modelo->create();
    }

    public function actualizar_usuario($id, $nomusuario, $password, $apellidos, $nombres, $email, $estado) {
        $this->modelo->setIdusuario($id);
        $this->modelo->setNomusuario($nomusuario);
        if (!empty($password)) {
            $this->modelo->setPassword(password_hash($password, PASSWORD_DEFAULT));
        } else {
            $usuario = $this->buscar_usuario($id);
            $this->modelo->setPassword($usuario['password']);
        }
        $this->modelo->setApellidos($apellidos);
        $this->modelo->setNombres($nombres);
        $this->modelo->setEmail($email);
        $this->modelo->setEstado($estado);
        return $this->modelo->update();
    }

    public function eliminar_usuario($id) {
        $this->modelo->setIdusuario($id);
        return $this->modelo->delete();
    }
}