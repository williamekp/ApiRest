<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" rel="stylesheet">
</head>
<body>
<?= $this->include('layout/header') ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Lista de Usuarios</h1>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Roles</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->id ?></td>
                    <td><?= $usuario->nombre ?></td>
                    <td><?= $usuario->email ?></td>
                    <td><?= $usuario->contrasenia ?></td>
                    <td><?= $usuario->roles ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </section>
</body>
</html>
