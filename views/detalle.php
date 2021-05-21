<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle productos</title>

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
    require_once 'views/includes/header.php';
    ?>
    <section class="categoriaListaProducots">
        <?php
        require_once 'views/includes/categorias.php';
        ?>
        <article>
            <h2>Detalles del producto</h2>
            <div class="infoDetalle">
                <img src="<?= PRODUCTOS ?><?= $producto->getImg() ?>" alt="<?= $producto->getPalabras_clave() ?>">
                <div class="pDetalles">
                    <p class="categoriaDetalle"><b><?= $producto->getId_categoria() ?></b></p>
                    <p class="nombreProductoDetalle"><?= $producto->getNombre() ?></p>
                    <p class="precioDetalle">$ <?= $producto->getValor() ?></p>
                    <p class="descripcionDetalle"><?= $producto->getDescripcion_corta() ?></p>
                </div>
            </div>
            <p style="text-align: left;">
                <?= $producto->getDetalle() ?>
                <br>
            </p>
            <p style="text-align: left; color:cornflowerblue"><?= $producto->getPalabras_clave() ?></p>
        </article>
    </section>

    <?php
    require_once 'views/includes/footer.php';
    ?>

    <div class="copyright">Copyright y demas</div>
    <script src="<?= URL ?>views/js/main.js"></script>
    <script src="<?= URL ?>views/js/slider.js"></script>
</body>

</html>