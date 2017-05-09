<div class="container">
  <div class="jumbotron">
    <h2>Añadir un nuevo partido político</h2>
    <p>Rellene los datos y pulse añadir.</p>
        <?php echo validation_errors(); ?>
        <?php echo form_open("http://".base_url()."index.php/administrador/nuevo_partido")?>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campo obligatorio</strong></div>
                <div class="form-group">
                    <label for="InputName">Siglas</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="siglas" id="siglas" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div><div class="form-group">
                    <label for="InputName">Descripción</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Añadir nuevo partido" class="btn btn-info pull-right">

        </form>

  </div>
</div>
