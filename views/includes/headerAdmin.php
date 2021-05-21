<?php
require_once 'views/includes/header.php';
?>
<?php if ($estado == "success") : ?>
    <div class="alert alert-success" role="alert">
        Registrado correctamente
    </div>
<?php elseif ($estado == "error") : ?>
    <div class="alert alert-danger" role="alert">
        Ha ocurrido un error
    </div>
<?php elseif ($estado == "eliminado") : ?>
    <div class="alert alert-warning" role="alert">
        Eliminado correctamente
    </div>
<?php elseif ($estado == "editado") : ?>
    <div class="alert alert-success" role="alert">
        Editado correctamente
    </div>
<?php elseif ($estado == "otro") : ?>
    <div class="alert alert-warning" role="alert">
        <?= $msg?>
    </div>
<?php endif ?>


<a href="<?= URL ?>login/logout">Cerrar Sesión</a>
<br>
<section class="categoriaListaProducots">
    <aside>
        <h2>Menu</h2>
        <ul>
            <li><a href="<?= URL ?>marcas">Marcas</a></li>
            <li><a href="<?= URL ?>categorias">Categorias</a></li>
            <li><a href="<?= URL ?>productos/listar">Productos</a></li>
            <li><a href="<?= URL ?>welcome/actualizarEmpresa">Datos de la Empresa</a></li>
        </ul>
    </aside>