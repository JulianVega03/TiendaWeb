<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= URL ?>views/css/style.css">
    <link rel="stylesheet" href="<?= URL ?>views/css/normalize.css">

    <!-- Iconos fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require_once 'views/includes/headerAdmin.php';
    ?>
    <article>
        <div class="divAgregarProducto">
            <h2>Marcas</h2>
            <a href="<?= URL ?>marcas/agregar">
                <button class="agregar"><i class="fas fa-plus-circle"></i></button>
            </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($marcas as $m) {
                ?>
                    <tr>
                        <td><?= $m->getId() ?></td>
                        <td><?= $m->getNombre() ?></td>
                        <td><?= $m->getDescripcion() ?></td>
                        <td>
                            <a href="<?= URL ?>marcas/editar/<?= $m->getId() ?>"><i class="far fa-edit"></i></a>
                            <a href="<?= URL ?>marcas/eliminar/<?= $m->getId() ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </article>
    </section>
    <?php
    require_once 'views/includes/footer.php';
    ?>

    <div class="copyright">Copyright y demas</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="<?= URL ?>views/js/main.js"></script>
    <script src="<?= URL ?>views/js/slider.js"></script>
</body>

</html>