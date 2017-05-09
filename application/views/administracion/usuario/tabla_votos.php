
        <tr class="odd gradeX">
        <?php echo form_open("http://".base_url()."index.php/administrador/mostrar_usuario")?>
            <td><?=$Id_Usuario?>
            </td>
        </form>
        <?php echo form_open("http://".base_url()."index.php/administrador/mostrar_politico")?>
            <td><?=$Id_Politico?>
            </td>
        </form>
            <td><?=$Puntuacion?></td>
            <td><?=$Fecha?></td>
            <!-- Segundo form -> eliminación -->
            <?php echo form_open("http://".base_url()."index.php/administrador/eliminar_voto")?>
                <input type="hidden" name="id" id="id" value="<?=$Id?>">
                <td>
                <button type="submit" class="glyphicon glyphicon-floppy-remove fa-2x"></button>
                </td>
            </form>
        </tr>
