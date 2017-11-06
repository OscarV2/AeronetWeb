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
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" checked value="laboratorista"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Laboratorista</span>
                    </label>

                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" value="coordinador"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Coordinador</span>
                    </label>

                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" value="analista"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Analista de datos</span>
                    </label>
            </div>
                <button type="submit" class="btn btn-primary btn-block" href="index.html">Entrar</button>
            </form>
        </div>
    </div>
</div>

