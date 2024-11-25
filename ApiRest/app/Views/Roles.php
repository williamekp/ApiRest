<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" rel="stylesheet">
</head>
<body>
<?= $this->include('layout/header') ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Lista de Roles</h1>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Módulos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $rol): ?>
                    <tr>
                        <td><?= $rol->id ?></td>
                        <td><?= $rol->nombre ?></td>
                        <td><?= $rol->modulos ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
