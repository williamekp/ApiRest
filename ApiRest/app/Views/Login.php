<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h3 class="title is-3">Login</h3>
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="notification is-danger">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif;?>
                    <form action="/auth" method="post">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Contraseña</label>
                            <div class="control">
                                <input class="input" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">Ingresar</button>
                            </div>
                            
                        </div>
                        <div class="field">
                            <div class="control">
                                <a href="usuarios/agregar"><button type="button" class="button">Registrar</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

