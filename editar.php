<?php
session_start();
include_once('conf/conexion.php');

if(isset($_POST['edit'])){
    $db = new DB();
    $conn = $db->open();
    try {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];

        $sql = "UPDATE personas
         SET nombre = '$name', telefono = '$tel', correo = '$email', direccion = '$direccion'
         WHERE id_persona = '$id'";

        $_SESSION['message'] = ($conn->exec($sql)) ? 'Contacto actualizado correctamente'
            : 'Algo salio mal, No se pudo actualizar el contacto';
    } catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
    $db->close();
} else{
    $_SESSION['message'] = 'Rellene el formulario';
}
header('location: index.php');
?>

