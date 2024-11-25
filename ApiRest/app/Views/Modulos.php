<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" rel="stylesheet">
</head>
<body>
<?= $this->include('layout/header') ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Lista de Módulos</h1>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modulos as $modulo): ?>
                    <tr>
                        <td><?= $modulo->id ?></td>
                        <td><?= $modulo->nombre ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
