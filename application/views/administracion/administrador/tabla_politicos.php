<?php echo validation_errors(); ?>

        <tr class="odd gradeX">
            <td><?=$Nombre?></td>
            <td><?=$Apellidos?></td>
            <?php echo form_open("http://".base_url()."index.php/administrador/mostrar_partido")?>
                <td>
                    <button type="submit" id="siglas" name="siglas" value="<?=$Siglas?>"><?=$Siglas?></button>
                </td>
            </form>
            <!-- Segundo form -> eliminación -->
            <?php echo form_open("http://".base_url()."index.php/administrador/eliminar_politico")?>
                <input type="hidden" name="id" id="id" value="<?=$Id?>">
                <td>
                <button type="submit" class="glyphicon glyphicon-floppy-remove fa-2x"></button>
                </td>
            </form>


    </tr>
