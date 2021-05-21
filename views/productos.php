<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista productos</title>

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
            <h2>Listado de productos</h2>
            <div class="buscador">
                <form action="<?= URL ?>productos/filtrar" style="display: flex; width: 100%" method="POST">
                    <input type="text" placeholder="Busqueda de productos" name="busqueda">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <?php
            if(isset($busqueda)) {
            ?>
            <h3>Buscando por <?= $busqueda?></h3>
            <?php    
            }
            ?>
            <div class="listaGridProductos">
                <?php
                foreach ($productos as $p) {
                ?>
                    <a href="<?= URL ?>detalle/<?= $p->getId() ?>">
                        <div class="producto">
                            <img src="<?= PRODUCTOS ?><?= $p->getImg() ?>" alt="<?= $p->getPalabras_clave() ?>">
                            <p><?= $p->getNombre() ?></p>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
            <a class="boton" href="<?= URL ?>productos">Volver a inicio</a>
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