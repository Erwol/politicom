
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <?php echo validation_errors(); ?>
        <?php echo form_open("http://".base_url()."index.php/registro/completar")?>
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-remove"></span><strong> Error en el registro.</strong>
            <p><?=$resultado['msg']?>
        </div>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campo obligatorio</strong></div>
                <div class="form-group">
                    <label for="InputName">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduzca aquí su nombre" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Apellidos</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Introduzca aquí sus apellidos" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca aquí su Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Password">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Introduzca aquí su contraseña" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="hidden" name="rango" value="User">
                <input type="submit" name="submit" id="submit" value="Crear nueva cuenta" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <h1>Registro de nuevo usuario</h1>
                <p>Para crear una cuenta, tan sólo introduzca la información requerida en los campos de la izquierda. Podrá usar su nueva cuenta al finalizar su registro.
            </div>
        </div>
    </div>
</div>
<br>
<br>
