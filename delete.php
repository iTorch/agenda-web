<?php
session_start();
include_once('conf/conexion.php');

if(isset($_GET['id'])){
    $db = new DB();
    $conn = $db->open();
    try {
        $sql = "DELETE FROM personas WHERE id_persona = '".$_GET['id']."'";

        $_SESSION['message'] = ($conn->exec($sql)) ? 'Contacto eliminado correctamente'
            : 'Algo salio mal, No se pudo eliminar el contacto';
    } catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
    $db->close();
} else{
    $_SESSION['message'] = 'Seleccione un contacto para eliminar';
}
header('location: index.php');
?>

