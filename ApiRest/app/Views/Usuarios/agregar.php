<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h3 class="title is-3">Agregar Usuario</h3>
                    <form action="/usuarios/guardar" method="post">
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input" type="text" name="nombre" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Contraseña</label>
                            <div class="control">
                                <input class="input" type="password" name="contrasenia" required>
                            </div>
                        </div>
                        <div class="field"> 
                            <label class="label">Roles</label>
                            <div class="control"> 
                                <div class="select is-multiple"> 
                                    <select name="roles[]" multiple> 
                                        <?php foreach ($roles as $rol): ?> 
                                            <option value="<?= $rol->id ?>">
                                                <?= $rol->nombre ?>
                                            </option> 
                                        <?php endforeach; ?> 
                                    </select> 
                                </div> 
                            </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
