<!DOCTYPE html>
<html>

<head>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

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
   
    <section class="contenidoInicio">
        <article class="informacionInicio">
            <h1>Quienes somos</h1>
            <p class="infoTexto"><?= $quienes_somos ?></p>

            <div class="novedadesProductos">

                <?php
                for ($i = 0;$i < 8 ; $i++) {
                ?>


                    <a href="<?= URL ?>detalle/<?= $productos[$i]->getId() ?>">
                        <div class="producto">
                            <img src="<?=PRODUCTOS?><?=$productos[$i]->getImg()?>" alt="<?=$productos[$i]->getPalabras_clave()?>">
                            <p><?= $productos[$i]->getNombre() ?></p>
                        </div>
                    </a>
                <?php
                }
                ?>

            </div>

            <a class="boton" href="<?= URL ?>productos">Ver todos los productos</a>
        </article>
        <aside>

            <!-- Instagram -->
            <div class="elfsight-app-e6b75fdb-92e1-4338-92a4-1da1b2865c6e"></div>
            <!-- <a class="boton" href="">Siguenos</a> -->
        </aside>
    </section>

    <?php
    require_once 'views/includes/footer.php';
    ?>

    <div class="copyright">Copyright y demas</div>
    <script src="<?= URL ?>views/js/main.js"></script>
    <script src="<?= URL ?>views/js/slider.js"></script>
</body>

</html>