<?php
session_start();
include_once('conf/conexion.php');

if(isset($_POST['add'])){
    $db = new DB();
    $conn = $db->open();
    try {
        $sql = "INSERT INTO personas (nombre, telefono, correo, direccion)
        VALUES (:name, :tel, :email, :direccion)";
        $stmt = $conn->prepare($sql);
        $_SESSION['message'] = ($stmt->execute(array(':name' => $_POST['name'],
            ':tel' => $_POST['tel'],
            ':email' => $_POST['email'],
            ':direccion' => $_POST['direccion']
            ))) ? 'Contacto agregado correctamente' : 'Algo salio mal, No se pudo agregar el contacto';
    } catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
    $db->close();
} else{
    $_SESSION['message'] = 'Rellene el formulario';
}
header('location: index.php');
?>
