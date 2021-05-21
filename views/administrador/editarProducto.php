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
            <h2>Registro de nuevo producto</h2>
            <button onclick="" class="agregar"><i class="fas fa-plus-circle"></i></button>
        </div>
        <form style="text-align: left;" action="<?= URL ?>productos/editarGuardar/<?= $id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Referencia</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referencia" value="<?= $producto->getReferencia() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" value="<?= $producto->getNombre() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descripcion_corta" value="<?= $producto->getDescripcion_corta() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Detalle</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="detalle" cols="30" rows="10"><?= $producto->getDetalle() ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="valor" value="<?= $producto->getValor() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Palabras Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="palabras_clave" value="<?= $producto->getPalabras_clave() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="estado" value="<?= $producto->getEstado() ?>">
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Categoría</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="categoria" value="<?= $producto->getId_categoria() ?>">
                        <?php
                        foreach ($categorias as $c) {
                        ?>
                            <option value="<?= $c->getId() ?>"><?= $c->getDescripcion() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Marca</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="marca" value="<?= $producto->getId_marca() ?>">
                        <?php
                        foreach ($marcas as $m) {
                        ?>
                            <option value="<?= $m->getId() ?>"><?= $m->getNombre() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>
            <input type="hidden" name="size" value="1000000">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input class="btn btn-primary" type="submit" name="upload" value="Guardar">
                </div>
            </div>

        </form>
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