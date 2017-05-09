<?php echo validation_errors(); ?>

        <tr class="odd gradeX">
            <td><?=$Nombre?></td>
            <td><?=$Siglas?></td>
            <?php echo form_open("http://".base_url()."index.php/administrador/mostrar_politico")?>
                <td>
                    <button type="submit" id="idPolitico" name="idPolitico" value="<?=$Id_Lider?>"><?=$Id_Lider?></button>
                </td>
            </form>
            <!-- Segundo form -> eliminación -->
            <?php echo form_open("http://".base_url()."index.php/administrador/eliminar_partido")?>
                <input type="hidden" name="id" id="id" value="<?=$Id?>">
                <td>
                <button type="submit" class="glyphicon glyphicon-floppy-remove fa-2x"></button>
                </td>
            </form>


    </tr>
