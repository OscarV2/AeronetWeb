<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Iniciar sesión</div>
        <div class="card-body">
            <?php echo form_open('Welcome/login');?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input class="form-control" id="exampleInputEmail1" name="usuario" type="text" aria-describedby="emailHelp" placeholder="Ingrese su usuario">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Ingrese su contraseña">
                </div>

                <h5>Rol</h5>
                <div class="col">
                <div class="radio">
                    <label class="radio">
                        <input type="radio" class="option-input radio" name="rol" checked value="laboratorista"/>
                        Laboratorista
                    </label>
                </div>
                <div class="radio">
                    <label class="radio">
                        <input type="radio" class="option-input radio" name="rol" value="coordinador"/>
                        Coordinador
                    </label></div>
                <div class="radio">
                    <label class="radio">
                        <input type="radio" class="option-input radio" name="rol" value="analista"/>
                        Analista de datos
                    </label></div>
            </div>
                <button type="submit" class="btn btn-primary btn-block" href="index.html">Entrar</button>
            </form>
            <div class="text-center">
            </div>
        </div>
    </div>
</div>

