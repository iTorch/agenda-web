<div class="modal fade" id="addNew" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Agregar Contacto</h4></center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="agregar.php" id="myForm">
                        <div class="form-group">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefono: </label>
                            <input type="tel" class="form-control" name="tel">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Correo: </label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="direccion">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="clear_form()"><span class="fa fa-times"></span> Cerrar</button>
                            <button name="add" type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function clear_form(){
        document.getElementById('myForm').reset();
    }
</script>