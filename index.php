<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Agenda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/offcanvas-navbar/">
    <link href="Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Lib/bootstrap/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="Lib/DataTables/datatables.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Leyend</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                       aria-expanded="false">Settings</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
<!--            <form class="d-flex">-->
<!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--            </form>-->
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="page-header text-center">Agenda Web</h1>
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            <a href="#addNew" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew" style="margin-bottom:10px;">
                <span class="fa fa-plus"></span> Nuevo</a>
            <?php
                session_start();
                if (isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-dismissible alert-success" style="margin-top: 20px;">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        <?php echo $_SESSION['message']; ?>
                    </div>

            <?php
                    unset($_SESSION['message']);
                }
            ?>
            <table id="myTable" class="table table-bordered table striped" style="margin-top:20px;">
                <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Acciones</th>
                </thead>
                <tbody>
                <?php
                    include_once('conf/conexion.php');
                    $database = new DB();
                    $db = $database->open();

                try {
                    $sql = "SELECT * FROM personas";
                    foreach ($db->query($sql) as $row){
                    ?>
                        <tr>
                            <td><?php echo $row['id_persona']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><a href="#edit_<?php echo $row['id_persona'];?>" class="btn btn-success btn-sm" data-bs-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                <a href="#delete_<?php echo $row['id_persona'];?>" class="btn btn-sm btn-danger" data-bs-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                            </td>
                            <?php include ('options.php');?>
                        </tr>
                    <?php
                    }
                }catch (PDOException $e){
                    echo 'Hay problemas con la conexion: '. $e->getMessage();
                }
                $database->close();
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('modal.php');
?>
<script src="Lib/bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

<script src="Lib/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script src="Lib/DataTables/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script>
    var table = $('#myTable').DataTable({
        language:{
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
</script>
</body>
</html>
