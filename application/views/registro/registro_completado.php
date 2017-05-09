<br><br><br>
    <div class="container">
        <div class="form-signin">
            <input class="btn btn-success btn-lg btn-block" type="submit" value="Su cuenta se creó correctamente">
            <?php echo validation_errors(); ?>
            <?php echo form_open("http://".base_url()."index.php/login/verificar")?>
                <h2 class="form-signin-heading">Inicio de sesión</h2>
                <label for="inputEmail" class="sr-only">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" id="password" name="password" size="20" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
            </div>


            <form class="form-signin" action="http://<?=base_url()?>index.php/registro">
            <input class="btn btn-success btn-lg btn-block" type="submit" value="Crear nueva cuenta">
            </form>

            </div> <!-- /container -->
