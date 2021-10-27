<!--Editar -->
<div class="modal fade" id="edit_<?php echo $row['id_persona']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Editar Contacto</h4></center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editar.php?id=<?php echo $row['id_persona']; ?>">
                        <div class="form-group">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['nombre']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefono: </label>
                            <input type="tel" class="form-control" name="tel" value="<?php echo $row['telefono']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Correo: </label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row['correo']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="direccion"
                                   value="<?php echo $row['direccion']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><span
                                        class="fa fa-times"></span> Cancelar
                            </button>
                            <button name="edit" type="submit" class="btn btn-success"><span class="fa fa-check"></span>
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Eliminar -->
<div class="modal fade" id="delete_<?php echo $row['id_persona']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Eliminar Contacto</h4></center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">¿Seguro que desea eliminar el contacto <h2
                            class="text-center"><?php echo $row['nombre'] . '?'; ?></h2></h3>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    Cancelar
                </button>
                <a href="delete.php?id=<?php echo $row['id_persona']; ?>" name="delete" class="btn btn-danger">
                    <span class="fa fa-ban"></span> Eliminar
                </a>
            </div>
        </div>
    </div>
</div>

