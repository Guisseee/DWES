<?php

include_once "model.php";

class Tarea extends Model
{

    public function __construct()
    {
        $this->table = "tarea";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function getMaxId()
    {
        $result = $this->db->consultasSelect("SELECT MAX(id) AS ultimoIdTarea FROM tarea");
        return $result[0]->ultimoIdTarea;
    }

    public function insertarTarea($titulo, $descripcion)
    
    {
        return $this->db->consultasModificacion("INSERT INTO tarea (titulo,descripcion) VALUES ('$titulo','$descripcion')");
    }

    public function insertarRelacion($idTarea, $idUsuarios){
        $result= 0;
        
        foreach($idUsuarios as $idUsuario){
            $sql = "INSERT INTO usuarios_tarea(tarea, usuario) VALUES ('$idTarea', '$idUsuario')";
            $result += $this->db->consultasModificacion("$sql");
        }
        
        return $result;
    }
    public function borrarTarea($idTarea, $idUsuario){
        $correctos = 0;
        $borrarUsuarioTarea = "DELETE FROM usuarios_tarea WHERE tarea = $idTarea and usuario = $idUsuario";
        $borrarTarea = "DELETE FROM tarea WHERE id = $idTarea";
        $correctos = $this->db->consultasModificacion($borrarUsuarioTarea);
        $correctos += $this->db->consultasModificacion($borrarTarea);
        return $correctos;
    }

    public function modificacionTarea($idTarea, $titulo, $descripcion)
    {
        $ok = $this->db->consultasModificacion("UPDATE tarea SET
            titulo = '$titulo',
            descripcion = '$descripcion'
            WHERE id = '$idTarea'");
        return $ok;
    }

    public function getTareasPorUsuario($idUsuario) {
        $query = $this->db->consultasSelect ("SELECT tarea.* FROM tarea  INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea 
                                            WHERE usuarios_tarea.usuario = '$idUsuario' ORDER BY tarea.titulo");
        return $query;
    }
}