<?php echo validation_errors(); ?>

<!-- Primer form -> modificación -->
    <?php echo form_open("http://".base_url()."index.php/administrador/modificar_usuario")?>
        <tr class="odd gradeX">
            <td><input type="text" class="form-control" name="nombre" id="nombre" value="<?=$Nombre?>" placeholder="<?=$Nombre?>"></td>
            <td><input type="text" class="form-control" name="apellidos" id="apellidos" value="<?=$Apellidos?>" placeholder="<?=$Apellidos?>"></td>
            <td><input type="text" class="form-control" name="email" id="email" value="<?=$Email?>" placeholder="<?=$Email?>"></td>
            <td>
                <select name="rango">
                    <option value="<?=$Rango?>"><?=$Rango?></option>
                </select>
            </td>
            <input type="hidden" name="id" id="id" value="<?=$Id?>">
            <td>
                <button type="submit" class="glyphicon glyphicon-floppy-saved fa-2x"></button>
            </td>
    </form>
<!-- Segundo form -> eliminación -->
    <?php echo form_open("http://".base_url()."index.php/administrador/eliminar_usuario")?>
            <input type="hidden" name="id" id="id" value="<?=$Id?>">
            <td>
                <button type="submit" class="glyphicon glyphicon-floppy-remove fa-2x"></button>
            </td>


    </tr>
    </form>
