<aside>
    <h2>Categorias</h2>
    <ul>
        <?php
        foreach ($categorias as $c) {
        ?>
            <li><a href="<?= URL ?>productos/porCategoria/<?= $c->getId() ?>"><?= $c->getDescripcion() ?></a></li>
        <?php
        }
        ?>
        <li><a href="<?= URL ?>productos">Todos</a></li>
    </ul>
</aside>